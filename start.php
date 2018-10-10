<?php

function activitypoints_init() {        

   elgg_extend_view('css', 'activitypoints/css');
   
   elgg_register_page_handler('activitypoints','activitypoints_page_handler');
   
   elgg_register_entity_type('object', 'activitypoints');
        
   add_group_tool_option('activitypoints',elgg_echo('activitypoints:group:enable'),false);

   elgg_extend_view('groups/tool_latest', 'activitypoints/group_module');

   elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'activitypoints_owner_block_menu');

}

function activitypoints_owner_block_menu($hook, $type, $return, $params) {
   if ($params['entity'] instanceof ElggGroup) {
      if ($params['entity']->activitypoints_enable != "no") {
         $url = "activitypoints/group/{$params['entity']->guid}/all";
         $item = new ElggMenuItem('activitypoints', elgg_echo('activitypoints:group'), $url);
         $return[] = $item;
      }
   }
   return $return;
}

function activitypoints_page_handler($page) {
   if (!isset($page[0])) {
      return false;
   }
   
   $base_dir = elgg_get_plugins_path() . 'activitypoints/pages/activitypoints';

   switch ($page[0]) {
      case "group":
         include "$base_dir/owner.php";
         break;
      case 'setup_group':
         set_input('group_guid',$page[1]);
         include "$base_dir/setup_group.php";
         break;
      case "detail":
         set_input('username', $page[1]);
         set_input('user_guid', $page[2]);
         include "$base_dir/detail.php";
         break;
      case "add":
         include "$base_dir/add.php";
         break;
      case "export":
         set_input('group_guid', $page[1]);
         include "$base_dir/export.php";
         break;
      default:
         return false;
   }
}

/////////////////////////////////////////////////////////////////////
//Functions

function activitypoints_is_admin_or_teacher($container_guid, $user_guid = null) {
   if ($user_guid)
      $user = get_entity($user_guid);
   else
      $user = elgg_get_logged_in_user_entity();
   $container = get_entity($container_guid);
   if ($container instanceof ElggGroup) {
      if ($user->guid == $container->owner_guid || (elgg_is_active_plugin('group_tools') && (check_entity_relationship($user->guid,'group_admin', $container->guid))))
          return true;
       else
          return false;
    } else {
       return $user->isAdmin();
    }
}

function activitypoints_search($object_owner_guid,$action,$entity_guid,$for_entity_guid=null,$group_guid) {
   if ($object_owner_guid) {
      if ($for_entity_guid) {
         $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $object_owner_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'rated_for_entity', 'value' => $for_entity_guid),array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 1);
      } else {
         $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid'=>$object_owner_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 1);
      }
   } else {
      if ($for_entity_guid) {
         $options = array('type' => 'object', 'subtype' => 'activitypoint', 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'rated_for_entity', 'value' => $for_entity_guid),array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 0);
      } else {
         $options = array('type' => 'object', 'subtype' => 'activitypoint', 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 0);
      }
   }
   $activitypoints = elgg_get_entities_from_metadata($options);
   if ($object_owner_guid) {
      if ($activitypoints) {
         return $activitypoints[0]->getGUID();
      } else {
         return false;
      }
   } else {
      return $activitypoints;
   }
}

function activitypoints_get_sum_points_per_action($object_owner_guid,$action,$group_guid) {
   $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid'=>$object_owner_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 0);
   $sum_points = 0;
   $activitypoints = elgg_get_entities_from_metadata($options);
   if ($activitypoints) {
      foreach ($activitypoints as $activitypoint) {
         $points = (int) $activitypoint->points;
	 $sum_points = $sum_points + $points; 
      }
   }
   return $sum_points;
}

function activitypoints_get_count_annotations_per_action_per_object($object_owner_guid,$action,$entity_guid,$group_guid) {
   $options = array('type' => 'object', 'subtype' => 'activitypoint', 'owner_guid'=>$object_owner_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'action','value' =>$action),array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 0);
   $activitypoints = elgg_get_entities_from_metadata($options);  
   if ($activitypoints)
      return count($activitypoints);
   else
      return 0;     
}

function activitypoints_add($user_guid, $points, $action = null, $entity_guid = null, $for_entity_guid, $group_guid = null, $subgroup = false, $description = null) {

   if ($points > 0) {

      $context = elgg_get_context();
      elgg_set_context('activitypoints');

      if ($entity_guid) {
         if ($for_entity_guid) {
            $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $user_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'rated_for_entity', 'value' => $for_entity_guid),array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 1);
         } else {
            $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid'=>$user_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'rated_entity', 'value' => $entity_guid),array('name' => 'action','value' =>$action),array('name' => 'group_guid', 'value' => $group_guid)), 'limit' => 1);
         }
         $activitypoints = elgg_get_entities_from_metadata($options);
      }
        
      if ($activitypoints){
         activitypoints_update($activitypoints[0]->getGUID(), (int) $points);
      } else {
         $activitypoint = new ElggObject();
         $activitypoint->subtype = "activitypoint";
         $activitypoint->owner_guid = elgg_get_logged_in_user_guid();
         $activitypoint->points = (int) $points;
         $activitypoint->container_guid = $user_guid;
         $activitypoint->action = $action;
         $activitypoint->rated_entity = $entity_guid;
         $activitypoint->rated_for_entity = $for_entity_guid;
         $activitypoint->group_guid = $group_guid;
         $activitypoint->description = $description;
         $activitypoint->ranking_guid = (int) 0;

         $activitypoint->access_id = 0;
         if ($group_guid) {
            $group = get_entity($group_guid);
            $activitypoint->access_id = $group->group_acl;
            $activitypoint->subgroup = $subgroup;
         } else {
            $activitypoint->access_id = 2;
         }
      
         if ($activitypoint->save()) {
         
            if ($subgroup) {
               $subgroup_members = get_group_members($user_guid,null);
               foreach ($subgroup_members as $member){
	          $member_guid = $member->getGUID();
                  $metadata_name = 'activitypoints_'.$group_guid;
                  if (($member->$metadata_name)&&(is_numeric($member->$metadata_name))) {
                     $member->$metadata_name = $member->$metadata_name + $points;
                  } else {
		     if ($group_guid)
		        $new_points = activitypoints_get_total_points($member_guid,$group_guid);
		     else
		        $new_points = activitypoints_get_total_points($member_guid,null);
                     $member->$metadata_name = $new_points;
		  }
               }
            } else {
               $user = get_entity($user_guid);
               if ($group_guid)
                  $metadata_name = 'activitypoints_'.$group_guid;
               else
                  $metadata_name = 'activitypoints';

	       if (($user->$metadata_name)&&(is_numeric($user->$metadata_name))) {
                  $user->$metadata_name = $user->$metadata_name + $points;
               } else {
		  if ($group_guid)
		     $new_points = activitypoints_get_total_points($user_guid,$group_guid);
		  else
		     $new_points = activitypoints_get_total_points($user_guid,null);
                  $user->$metadata_name = $new_points;
	       }
            }
         }
      }
      elgg_set_context($context);
   }
}

function activitypoints_remove($guid) {
   $context = elgg_get_context();
   elgg_set_context('activitypoints');
   $entity = get_entity($guid);
   $entity->delete();
   elgg_set_context($context);
}

function activitypoints_get($user_guid, $group_guid = null) {
   $user = get_user($user_guid);
   if ($group_guid){
      $metadata_name = 'activitypoints_'.$group_guid;
      if (($user->$metadata_name)&&(is_numeric($user->$metadata_name))) {
         return ($user->$metadata_name);
      } else {
      	 $points = activitypoints_get_total_points($user_guid,$group_guid);
	 $user->$metadata_name = $points;
         return $points;
      }
   } else {
      if (($user->activitypoints)&&(is_numeric($user->activitypoints))) {
         return ($user->activitypoints);
      } else {
         $points = activitypoints_get_total_points($user_guid,null);
	 $user->activitypoints = $points;
         return $points;
      }
   }
}

function activitypoints_get_total_points($user_guid,$group_guid=null){
   $sum_points = 0;
   //De usuario
   $options = array('limit' => 0, 'type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $user_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'group_guid', 'value' => $group_guid),array('name' => 'ranking_guid', 'value' => 0)));

   $entities = new ElggBatch(elgg_get_entities_from_metadata, $options);

   if ($entities){
      foreach ($entities as $one_entity) {
         $sum_points += (int) $one_entity->points;
      }
   }

   //De subgrupo
   $subgroups = elgg_get_entities_from_relationship(array('type_subtype_pairs' => array('group' => 'lbr_subgroup'),'container_guids' => $group_guid,'relationship' => 'member','inverse_relationship' => false,'relationship_guid' => $user_guid));
   if ($subgroups) {
      $options_subgroup = array('limit' => 0, 'type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $subgroups[0]->guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'group_guid', 'value' => $group_guid),array('name' => 'ranking_guid', 'value' => 0)));

      $entities_subgroup = new ElggBatch(elgg_get_entities_from_metadata, $options_subgroup);
              
      if ($entities_subgroup){
         foreach ($entities_subgroup as $one_entity) {
	    $sum_points += (int) $one_entity->points;
	 }
      }
   }
   return $sum_points;
}

function activitypoints_reset_user($user_guid, $group_guid = null) {
   $context = elgg_get_context();
   elgg_set_context('activitypoints');
   if ($group_guid) {
      $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $user_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array('name' => 'group_guid', 'value' => $group_guid), 'limit' => null);
      $activitypoints = elgg_get_entities_from_metadata($options);
      foreach ($activitypoints as $activitypoint) {
         $activitypoint->delete();
      }
      
      //Borramos los objetos de los subgrupos a los que pertenece el usuario
      $subgroups = elgg_get_entities_from_relationship(array('type_subtype_pairs' => array('group' => 'lbr_subgroup'),'container_guids' => $group_guid,'relationship' => 'member','inverse_relationship' => false,'relationship_guid' => $user_guid));
      if ($subgroups) {
         $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $subgroups[0]->guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array('name' => 'group_guid', 'value' => $group_guid), 'limit' => null);
         $activitypoints = elgg_get_entities_from_metadata($options);
         foreach ($activitypoints as $activitypoint) {
            $activitypoint->delete();
         }
      }

      $user = get_entity($user_guid);
      $metadata_name = 'activitypoints_'.$group_guid;
      $user->$metadata_name = "";
   } else {
      $options = array('type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $user_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array('name' => 'group_guid', 'value' => null), 'limit' => null);
      $activitypoints = elgg_get_entities_from_metadata($options);
      foreach ($activitypoints as $activitypoint) {
         $activitypoint->delete();
      }
      $user = get_entity($user_guid);
      $user->activitypoints = "";
   }
   elgg_set_context($context);
}

function activitypoints_update($activitypoints_guid, $new_points) {
   $context = elgg_get_context();
   elgg_set_context('activitypoints');
   $activitypoints = get_entity($activitypoints_guid);
   $old_points = (int) $activitypoints->points;

   if (empty($new_points) || !(is_numeric($new_points)))
      $activitypoints->delete();
   else {
      $activitypoints->points = (int) $new_points;
      $user = get_entity($activitypoints->container_guid);
      $user_guid = $user->getGUID();
      $group_guid = $activitypoints->group_guid;
      if ($group_guid){
         $metadata_name = 'activitypoints_'.$activitypoints->group_guid;
         if ($activitypoints->subgroup){
            $subgroup_members = get_group_members($activitypoints->container_guid,null);
            foreach ($subgroup_members as $member){
	       $member_guid = $member->getGUID();
	       if (($member->$metadata_name)&&(is_numeric($member->$metadata_name))) {
                  $member->$metadata_name = $member->$metadata_name - $old_points + $new_points;
	       } else {
	          $prev_points = activitypoints_get_total_points($member_guid,$group_guid);
	          $member->$metadata_name = $prev_points - $old_points + $new_points;
	       }
            }
         } else {
	    if (($user->$metadata_name)&&(is_numeric($user->$metadata_name))) {
               $user->$metadata_name = $user->$metadata_name - $old_points + $new_points;
	    } else {
	       $prev_points = activitypoints_get_total_points($user_guid,$group_guid);
	       $user->$metadata_name = $prev_points - $old_points + $new_points;
	    }
	 }
      } else {
          if (($user->activitypoints)&&(is_numeric($user->activitypoints))) {
             $user->activitypoints = $user->activitypoints - $old_points + $new_points;
	  } else {
	     $prev_points = activitypoints_get_total_points($user_guid,null);
	     $user->activitypoints = $prev_points - $old_points + $new_points;
	  }
      }
   }
   elgg_set_context($context);
}

function activitypoints_get_entity_points($entity_guid) {
   $options = array('type' => 'object', 'subtype' => 'activitypoint', 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array('name' => 'rated_entity', 'value' => $entity_guid), 'limit' => 0);
   $activitypoints = elgg_get_entities_from_metadata($options);
   $sum_points = 0;
   if ($activitypoints){
      foreach ($activitypoints as $activitypoint) {
         $sum_points += $activitypoint->points;
      }
      return $sum_points;
   }
   else
      return false;
}
    
function activitypoints_get_entity($entity_guid) {
   $options = array('type' => 'object', 'subtype' => 'activitypoint', 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array('name' => 'rated_entity', 'value' => $entity_guid), 'limit' => 0);
   $activitypoints = elgg_get_entities_from_metadata($options);
   if ($activitypoints)
      return $activitypoints;
   else
      return false;
}

function activitypoints_remove_by_entity($entity_guid) {
   $context = elgg_get_context();
   elgg_set_context('activitypoints');
        
   $options = array('type' => 'object', 'subtype' => 'activitypoint', 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array('name' => 'rated_entity', 'value' => $entity_guid), 'limit' => 0);
   $activitypoints = elgg_get_entities_from_metadata($options);
   if ($activitypoints) {
      foreach ($activitypoints as $activitypoint) 
         activitypoints_remove ($activitypoint->guid);
   }
   elgg_set_context($context);
}

//////////////////////////////////////////////////////////////////////////

//Permisos para editar objetos
function activitypoints_users_can_edit($hook_name, $entity_type, $return_value, $params) {
   if ($params['entity']->type ==  "user" && elgg_get_context() == 'activitypoints')
      return true;
}
    
function activitypoints_can_edit($hook_name, $entity_type, $return_value, $params) {
   if ($params['entity']->getSubtype() ==  "activitypoint" && elgg_get_context() == 'activitypoints' && activitypoints_is_admin_or_teacher($params['entity']->group_guid)){
      return true;
   }
}

elgg_register_plugin_hook_handler('permissions_check','user','activitypoints_users_can_edit');
elgg_register_plugin_hook_handler('permissions_check','object','activitypoints_can_edit');

function remove_activitypoints($event, $object_type, $object) {
   if ($object->getSubtype() == 'activitypoint') {
      $context = elgg_get_context();
      elgg_set_context('activitypoints');
      $user = get_entity($object->container_guid);
      $group_guid = $object->group_guid;
      $points = (int) $object->points;

      if ($group_guid)
         $metadata_name = 'activitypoints_'.$group_guid;
      else
         $metadata_name = 'activitypoints';

      if ($object->subgroup) {
         $subgroup_members = get_group_members($object->container_guid,null);
         foreach ($subgroup_members as $member){
	    $member_guid = $member->getGUID();
	    if (($member->$metadata_name)&&(is_numeric($member->$metadata_name))) {
               $member->$metadata_name = $member->$metadata_name - $points;
	    } else {
	       if ($group_guid)
	          $prev_points = activitypoints_get_total_points($member_guid,$group_guid);
	       else 
	          $prev_points = activitypoints_get_total_points($member_guid,null);
	       $member->$metadata_name = $prev_points - $points;
	    }
         }
      } else {
         if (($user->$metadata_name)&&(is_numeric($user->$metadata_name))) {
            $user->$metadata_name = $user->$metadata_name - $points;
	 } else {
	    $user_guid = $user->getGUID();
	    if ($group_guid)
	       $prev_points = activitypoints_get_total_points($user_guid,$group_guid);
	    else
	       $prev_points = activitypoints_get_total_points($user_guid,null);
	    $user->$metadata_name = $prev_points - $points;
	 }
      }
      elgg_set_context($context);
   }
}

elgg_register_event_handler('init','system','activitypoints_init');
//elgg_register_event_handler('pagesetup','system','activitypoints_menu');
elgg_register_event_handler('delete', 'object', 'remove_activitypoints');

function activitypoints_create_object($event, $object_type, $object) {

   $user_guid = elgg_get_logged_in_user_guid();
   $object_guid = $object->getGUID();
   $object_subtype = $object->getSubtype();

   if ((strcmp($object_subtype,'task_answer')!=0)&&(strcmp($object_subtype,'answer')!=0)&&(strcmp($object_subtype,'test_answer')!=0)&&(strcmp($object_subtype,'form_answer')!=0)&&(strcmp($object_subtype,'comment')!=0)&&(strcmp($object_subtype,'discussion_reply')!=0)){
      $object_owner_guid = $object->getOwnerGUID();
      $container_guid = $object->container_guid;
      $container = get_entity($container_guid);
   } else {
     if ((strcmp($object_subtype,'task_answer')==0)||(strcmp($object_subtype,'test_answer')==0)||(strcmp($object_subtype,'form_answer')==0)) {
	if (strcmp($object->who_answers,'member')==0) { 
	   $object_owner_guid = $object->getOwnerGUID();
	   $container_guid = $object->container_guid;
	} else {
	   $subgroup_guid = $object->container_guid;
	   $subgroup = get_entity($subgroup_guid);
	   $container_guid = $subgroup->container_guid;
	}
	$container = get_entity($container_guid);
     }
     if ((strcmp($object_subtype,'comment')==0)||(strcmp($object_subtype,'discussion_reply')==0)) {
        $object_entity = get_entity($object->container_guid);
	$object_entity_guid = $object_entity->getGUID();
	$object_entity_subtype = $object_entity->getSubtype();
	$object_owner_guid = $object->getOwnerGUID();
	$entity_owner_guid = $object_entity->getOwnerGUID();
	$container_guid = $object_entity->container_guid;
	$container = get_entity($container_guid);
      }

     
     if (strcmp($object_subtype,'answer')==0) {
        $question_guid = $object->question_guid;
	$question = get_entity($question_guid);
	$container_guid=$question->container_guid;
	$container = get_entity($container_guid);
	if (strcmp($object->who_answers,'member')==0) { 
	   $object_owner_guid = $object->getOwnerGUID();
	} else {
	   $subgroup_guid = $object->owner_guid;
	   $subgroup = get_entity($subgroup_guid);
	}
     }
   }

   if ($container instanceof ElggObject)
      $container_subtype = get_subtype_id('object',$container->getSubtype());
   if ($container_subtype==6) {
      $container_guid = $container->container_guid;
      $container = get_entity($container_guid);
   }

   $options = array('type_subtype_pairs' => array('object' => 'activitypoints_group_setup'), 'limit' => false, 'container_guid' => $container_guid);
   $activitypoints_group_setups = elgg_get_entities_from_metadata($options);
   if ($activitypoints_group_setups) {
      $activitypoints_group_setup = $activitypoints_group_setups[0];
      if (($container instanceof ElggGroup) && ($container->activitypoints_enable != "no")) {

         if (strcmp($object_subtype,'task')==0) {
            $points=$activitypoints_group_setup->add_task_points;
	    $unlimited_add_task_max_points_user=$activitypoints_group_setup->unlimited_add_task_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_task_max_points_user){
	       $add_task_max_points_user=$activitypoints_group_setup->add_task_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_task",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_task_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_task",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee task");
         }
         if (strcmp($object_subtype,'test')==0) {
            $points=$activitypoints_group_setup->add_test_points;
       	    $unlimited_add_test_max_points_user=$activitypoints_group_setup->unlimited_add_test_max_points_user;
       	    $create_activitypoints = true;
       	    if (!$unlimited_add_test_max_points_user){
               $add_test_max_points_user=$activitypoints_group_setup->add_test_max_points_user;
               $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_test",$container_guid);
               $sum_points = $sum_points+$points;
               if ($sum_points > $add_test_max_points_user)
               	  $create_activitypoints = false;
            }  
            if ($create_activitypoints) {
               $description="";
               activitypoints_add($object_owner_guid,$points,"add_test",$object_guid,null,$container_guid,false,$description);
            }
            // system_message("createeeeeeeeeeeee test");
         }  
         if (strcmp($object_subtype,'form')==0) {
            $points=$activitypoints_group_setup->add_form_points;
            $unlimited_add_form_max_points_user=$activitypoints_group_setup->unlimited_add_form_max_points_user;
            $create_activitypoints = true;
            if (!$unlimited_add_form_max_points_user){
               $add_form_max_points_user=$activitypoints_group_setup->add_form_max_points_user;
               $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_form",$container_guid);
               $sum_points = $sum_points+$points;
               if ($sum_points > $add_form_max_points_user)
                  $create_activitypoints = false;
            }
            if ($create_activitypoints) {
               $description="";
               activitypoints_add($object_owner_guid,$points,"add_form",$object_guid,null,$container_guid,false,$description);
            }
            // system_message("createeeeeeeeeeeee form");
         }
	 if (strcmp($object_subtype,'task_answer')==0) {
            $points=$activitypoints_group_setup->add_task_answer_points;
	    $unlimited_add_task_answer_max_points_user=$activitypoints_group_setup->unlimited_add_task_answer_max_points_user;
	    if (strcmp($object->who_answers,'member')==0) {
	       $create_activitypoints = true; 
	       if (!$unlimited_add_task_answer_max_points_user){
	          $add_task_answer_max_points_user=$activitypoints_group_setup->add_task_answer_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_task_answer",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $add_task_answer_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($object_owner_guid,$points,"add_task_answer",$object_guid,null,$container_guid,false,$description);
	       }
	    } else {
	       $create_activitypoints = true;
	       if (!$unlimited_add_task_answer_max_points_user){
	          $add_task_answer_max_points_user=$activitypoints_group_setup->add_task_answer_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($subgroup_guid,"add_task_answer",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $add_task_answer_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($subgroup_guid,$points,"add_task_answer",$object_guid,null,$container_guid,true,$description);
	       }
	    }
            // system_message("createeeeeeeeeeeee task answer");
         }
         if (strcmp($object_subtype,'test_answer')==0) {
            $points=$activitypoints_group_setup->add_test_answer_points;
            $unlimited_add_test_answer_max_points_user=$activitypoints_group_setup->unlimited_add_test_answer_max_points_user;
            if (strcmp($object->who_answers,'member')==0) {
               $create_activitypoints = true; 
               if (!$unlimited_add_test_answer_max_points_user){
                  $add_test_answer_max_points_user=$activitypoints_group_setup->add_test_answer_max_points_user;
                  $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_test_answer",$container_guid);
                  $sum_points = $sum_points+$points;
                  if ($sum_points > $add_test_answer_max_points_user)
                     $create_activitypoints = false;
               }
               if ($create_activitypoints) {
                  $description="";
                  activitypoints_add($object_owner_guid,$points,"add_test_answer",$object_guid,null,$container_guid,false,$description);
               }
            } else {
               $create_activitypoints = true;
               if (!$unlimited_add_test_answer_max_points_user){
                  $add_test_answer_max_points_user=$activitypoints_group_setup->add_test_answer_max_points_user;
                  $sum_points = activitypoints_get_sum_points_per_action($subgroup_guid,"add_test_answer",$container_guid);
                  $sum_points = $sum_points+$points;
                  if ($sum_points > $add_test_answer_max_points_user)
                     $create_activitypoints = false;
               }
               if ($create_activitypoints) {
                  $description="";
                  activitypoints_add($subgroup_guid,$points,"add_test_answer",$object_guid,null,$container_guid,true,$description);
               }
            }
            // system_message("createeeeeeeeeeeee test answer");
         }
         if (strcmp($object_subtype,'form_answer')==0) {
            $points=$activitypoints_group_setup->add_form_answer_points;
            $unlimited_add_form_answer_max_points_user=$activitypoints_group_setup->unlimited_add_form_answer_max_points_user;
            if (strcmp($object->who_answers,'member')==0) {
               $create_activitypoints = true; 
               if (!$unlimited_add_form_answer_max_points_user){
                  $add_form_answer_max_points_user=$activitypoints_group_setup->add_form_answer_max_points_user;
                  $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_form_answer",$container_guid);
                  $sum_points = $sum_points+$points;
                  if ($sum_points > $add_form_answer_max_points_user)
                     $create_activitypoints = false;
               }
               if ($create_activitypoints) {
                  $description="";
                  activitypoints_add($object_owner_guid,$points,"add_form_answer",$object_guid,null,$container_guid,false,$description);
               }
            } else {
               $create_activitypoints = true;
               if (!$unlimited_add_form_answer_max_points_user){
                  $add_form_answer_max_points_user=$activitypoints_group_setup->add_form_answer_max_points_user;
                  $sum_points = activitypoints_get_sum_points_per_action($subgroup_guid,"add_form_answer",$container_guid);
                  $sum_points = $sum_points+$points;
                  if ($sum_points > $add_form_answer_max_points_user)
                     $create_activitypoints = false;
               }
               if ($create_activitypoints) {
                  $description="";
                  activitypoints_add($subgroup_guid,$points,"add_form_answer",$object_guid,null,$container_guid,true,$description);
               }
            }
            // system_message("createeeeeeeeeeeee form answer");
         }
	 if (strcmp($object_subtype,'question')==0) {
            $points=$activitypoints_group_setup->add_question_points;
	    $unlimited_add_question_max_points_user=$activitypoints_group_setup->unlimited_add_question_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_question_max_points_user){
	       $add_question_max_points_user=$activitypoints_group_setup->add_question_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_question",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_question_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_question",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee question");
         }
	 if (strcmp($object_subtype,'answer')==0) {
            $points=$activitypoints_group_setup->add_answer_points;
	    $unlimited_add_answer_max_points_user=$activitypoints_group_setup->unlimited_add_answer_max_points_user;
	    if (strcmp($object->who_answers,'member')==0) {
	       $create_activitypoints = true; 
	       if (!$unlimited_add_answer_max_points_user){
	          $add_answer_max_points_user=$activitypoints_group_setup->add_answer_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_answer",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $add_answer_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($object_owner_guid,$points,"add_answer",$object_guid,null,$container_guid,false,$description);
	       }
	    } else {
	       $create_activitypoints = true;
	       if (!$unlimited_add_answer_max_points_user){
	          $add_answer_max_points_user=$activitypoints_group_setup->add_answer_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($subgroup_guid,"add_answer",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $add_answer_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($subgroup_guid,$points,"add_answer",$object_guid,null,$container_guid,true,$description);
	       }
	    }
            // system_message("createeeeeeeeeeeee answer");
         }
         if (strcmp($object_subtype,'blog')==0) {
            $points=$activitypoints_group_setup->add_blog_post_points;
	    $unlimited_add_blog_post_max_points_user=$activitypoints_group_setup->unlimited_add_blog_post_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_blog_post_max_points_user){
	       $add_blog_post_max_points_user=$activitypoints_group_setup->add_blog_post_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_blog_post",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_blog_post_max_points_user){
	          $create_activitypoints = false;
	       }
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_blog_post",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee blog");
         }
         if (strcmp($object_subtype,'page_top')==0) {
            $points=$activitypoints_group_setup->add_page_top_points;
	    $unlimited_add_page_top_max_points_user=$activitypoints_group_setup->unlimited_add_page_top_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_page_top_max_points_user){
	       $add_page_top_max_points_user=$activitypoints_group_setup->add_page_top_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_page_top",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_page_top_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_page_top",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee page top");
         }
         if (strcmp($object_subtype,'page')==0) {
            $points=$activitypoints_group_setup->add_page_points;
	    $unlimited_add_page_max_points_user=$activitypoints_group_setup->unlimited_add_page_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_page_max_points_user){
	       $add_page_max_points_user=$activitypoints_group_setup->add_page_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_page",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_page_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_page",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee page");
         }
         if (strcmp($object_subtype,'bookmarks')==0) {
            $points=$activitypoints_group_setup->add_bookmark_points;
	    $unlimited_add_bookmark_max_points_user=$activitypoints_group_setup->unlimited_add_bookmark_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_bookmark_max_points_user){
	       $add_bookmark_max_points_user=$activitypoints_group_setup->add_bookmark_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_bookmark",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_bookmark_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_bookmark",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee bookmark");
         }
         if (strcmp($object_subtype,'file')==0) {
            $points=$activitypoints_group_setup->add_file_points;
	    $unlimited_add_file_max_points_user=$activitypoints_group_setup->unlimited_add_file_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_file_max_points_user){
	       $add_file_max_points_user=$activitypoints_group_setup->add_file_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_file",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_file_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_file",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee file");
         }
         if (strcmp($object_subtype,'groupforumtopic')==0) {
            $points=$activitypoints_group_setup->add_forum_points;
	    $unlimited_add_forum_max_points_user=$activitypoints_group_setup->unlimited_add_forum_max_points_user;
	    $create_activitypoints = true;
	    if (!$unlimited_add_forum_max_points_user){
	       $add_forum_max_points_user=$activitypoints_group_setup->add_forum_max_points_user;
	       $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_forum",$container_guid);
	       $sum_points = $sum_points+$points;
	       if ($sum_points > $add_forum_max_points_user)
	          $create_activitypoints = false;
	    }
	    if ($create_activitypoints) {
	       $description="";
               activitypoints_add($object_owner_guid,$points,"add_forum",$object_guid,null,$container_guid,false,$description);
	    }
            // system_message("createeeeeeeeeeeee groupforumtopic");
         }

	 
	 if (strcmp($object_subtype,'discussion_reply')==0) {
	    $create_activitypoints = true;
	    $unlimited_max_forum_posts_user_object = $activitypoints_group_setup->unlimited_max_forum_posts_user_object;
            if (!$unlimited_max_forum_posts_user_object) {
               $max_forum_posts_user_object = $activitypoints_group_setup->max_forum_posts_user_object;
	       if ($object_owner_guid != $entity_owner_guid) {
	          $count_forum_posts_user_object = activitypoints_get_count_annotations_per_action_per_object($object_owner_guid,"receive_forum_post",$object_entity_guid,$container_guid);
	       } else {
	          $options = array('type' => 'object', 'subtype' => 'activitypoint', 'owner_guid'=>$object_owner_guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'action','value' =>"add_forum_post"),array('name' => 'group_guid', 'value' => $container_guid)), 'limit' => 0);
                  $all_activitypoints = elgg_get_entities_from_metadata($options);
		  $count_forum_posts_user_object = 0;
		  foreach ($all_activitypoints as $one_activitypoint){
		     $one_activitypoint_object_guid = $one_activitypoint->rated_entity;
		     $one_activitypoint_object = get_entity($one_activitypoint_object_guid);
		     if ($one_activitypoint_object->container_guid == $object_entity_guid) {
		        $count_forum_posts_user_object += 1;
                     }
		  }  
	       }
	       if ($count_forum_posts_user_object >= $max_forum_posts_user_object)
	          $create_activitypoints = false;
            } 
	    if ($create_activitypoints) {
	       $points_act = $activitypoints_group_setup->add_forum_post_points;
	       $unlimited_add_forum_post_max_points_user = $activitypoints_group_setup->unlimited_add_forum_post_max_points_user;
	       $create_act_activitypoints = true;
               if (!$unlimited_add_forum_post_max_points_user){
	          $add_forum_post_max_points_user=$activitypoints_group_setup->add_forum_post_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_forum_post",$container_guid);
	          $sum_points = $sum_points+$points_act;
	          if ($sum_points > $add_forum_post_max_points_user)
	             $create_act_activitypoints = false;
	       }
	       if ($create_act_activitypoints) {
	          $description_act="";
	          activitypoints_add($object_owner_guid,$points_act,"add_forum_post",$object_guid,null,$container_guid,false,$description_act);
	       }
	       if ($object_owner_guid != $entity_owner_guid) {
	          $create_pas_activitypoints = true;
	          if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
		     $points_pas = $activitypoints_group_setup->receive_forum_post_teacher_points;
		     $unlimited_receive_forum_post_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_forum_post_teacher_max_points_user;
	             if (!$unlimited_receive_forum_post_teacher_max_points_user){
	                $receive_forum_post_teacher_max_points_user=$activitypoints_group_setup->receive_forum_post_teacher_max_points_user;
	                $sum_points = activitypoints_get_sum_points_per_action($entity_owner_guid,"receive_forum_post_teacher",$container_guid);
	                $sum_points = $sum_points+$points_pas;
	                if ($sum_points > $receive_forum_post_teacher_max_points_user)
	                   $create_pas_activitypoints = false;
	             }
		     if ($create_pas_activitypoints) {
	                $description_pas="";
	                activitypoints_add($entity_owner_guid,$points_pas,"receive_forum_post_teacher",$object_entity_guid,$object_guid,$container_guid,false,$description_pas);
	             }
		  } else {
	             $points_pas = $activitypoints_group_setup->receive_forum_post_points;
		     $unlimited_receive_forum_post_max_points_user = $activitypoints_group_setup->unlimited_receive_forum_post_max_points_user;
	             if (!$unlimited_receive_forum_post_max_points_user){
	                $receive_forum_post_max_points_user=$activitypoints_group_setup->receive_forum_post_max_points_user;
	                $sum_points = activitypoints_get_sum_points_per_action($entity_owner_guid,"receive_forum_post",$container_guid);
	                $sum_points = $sum_points+$points_pas;
	                if ($sum_points > $receive_forum_post_max_points_user)
	                   $create_pas_activitypoints = false;
	             }
		     if ($create_pas_activitypoints) {
	                $description_pas="";
	                activitypoints_add($entity_owner_guid,$points_pas,"receive_forum_post",$object_entity_guid,$object_guid,$container_guid,false,$description_pas);
	             }
		  }
	       }
	    }
            //system_message("createeeeeeeeeeeee group topic post");
         }

	  if (strcmp($object_subtype,'comment')==0) {
	    $create_activitypoints = true;
	    $unlimited_max_comments_user_object = $activitypoints_group_setup->unlimited_max_comments_user_object;
            if (!$unlimited_max_comments_user_object) {
               $max_comments_user_object = $activitypoints_group_setup->max_comments_user_object;
	       $count_comments_user_object = activitypoints_get_count_annotations_per_action_per_object($object_owner_guid,"receive_comment",$object_entity_guid,$container_guid);
	       if ($count_comments_user_object >= $max_comments_user_object){
	          $create_activitypoints = false;
	       }
            } 
	    if ($create_activitypoints) {
	       if ($object_owner_guid != $entity_owner_guid) {
                  $points_act = $activitypoints_group_setup->add_comment_points;
	          $unlimited_add_comment_max_points_user = $activitypoints_group_setup->unlimited_add_comment_max_points_user;
	          
	          $create_act_activitypoints = true;
                  if (!$unlimited_add_comment_max_points_user){
	             $add_comment_max_points_user=$activitypoints_group_setup->add_comment_max_points_user;
	             $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_comment",$container_guid);
	             $sum_points = $sum_points+$points_act;
	             if ($sum_points > $add_comment_max_points_user)
	                $create_act_activitypoints = false;
	          }
	          if ($create_act_activitypoints) {
	             $description_act="";
	             activitypoints_add($object_owner_guid,$points_act,"add_comment",$object_guid,null,$container_guid,false,$description_act);
	          }

		  $create_pas_activitypoints = true;
	          if (((strcmp($object_entity_subtype,'task_answer')!=0)&&(strcmp($object_entity_subtype,'answer')!=0))||((strcmp($object_entity_subtype,'task_answer')==0)&&(strcmp($object_entity->who_answers,'member')==0))||((strcmp($object_entity_subtype,'answer')==0)&&(strcmp($object_entity->who_answers,'member')==0))){
	             if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
			$points_pas = $activitypoints_group_setup->receive_comment_teacher_points;
			$unlimited_receive_comment_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_comment_teacher_max_points_user;
	                if (!$unlimited_receive_comment_teacher_max_points_user){
		           $receive_comment_teacher_max_points_user=$activitypoints_group_setup->receive_comment_teacher_max_points_user;
	                   $sum_points = activitypoints_get_sum_points_per_action($entity_owner_guid,"receive_comment_teacher",$container_guid);
	                   $sum_points = $sum_points+$points_pas;
	                   if ($sum_points > $receive_comment_teacher_max_points_user)
	                      $create_pas_activitypoints = false;
	                }
	                if ($create_pas_activitypoints) {
	                   $description_pas="";
	                   activitypoints_add($entity_owner_guid,$points_pas,"receive_comment_teacher",$object_entity_guid,$object_guid,$container_guid,false,$description_pas);
	                }
		     } else {
			$points_pas = $activitypoints_group_setup->receive_comment_points;
			$unlimited_receive_comment_max_points_user = $activitypoints_group_setup->unlimited_receive_comment_max_points_user;
	                if (!$unlimited_receive_comment_max_points_user){
		           $receive_comment_max_points_user=$activitypoints_group_setup->receive_comment_max_points_user;
	                   $sum_points = activitypoints_get_sum_points_per_action($entity_owner_guid,"receive_comment",$container_guid);
	                   $sum_points = $sum_points+$points_pas;
	                   if ($sum_points > $receive_comment_max_points_user)
	                      $create_pas_activitypoints = false;
	                }
	                if ($create_pas_activitypoints) {
	                   $description_pas="";
	                   activitypoints_add($entity_owner_guid,$points_pas,"receive_comment",$object_entity_guid,$object_guid,$container_guid,false,$description_pas);
	                }
		     }
	          } else {
		     if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
		        $points_pas = $activitypoints_group_setup->receive_comment_teacher_points;
		        $unlimited_receive_comment_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_comment_teacher_max_points_user;
	                if (!$unlimited_receive_comment_teacher_max_points_user){
		           $receive_comment_teacher_max_points_user=$activitypoints_group_setup->receive_comment_teacher_max_points_user;
	                   $sum_points = activitypoints_get_sum_points_per_action($subgroup_guid,"receive_comment_teacher",$container_guid);
	                   $sum_points = $sum_points+$points_pas;
	                   if ($sum_points > $receive_comment_teacher_max_points_user)
	                      $create_pas_activitypoints = false;
	                }
	                if ($create_pas_activitypoints) {
	                   $description_pas="";
	                   activitypoints_add($subgroup_guid,$points_pas,"receive_comment_teacher",$object_entity_guid,$object_guid,$container_guid,true,$description_pas);
	                }
		     } else {
		        $points_pas = $activitypoints_group_setup->receive_comment_points;
		        $unlimited_receive_comment_max_points_user = $activitypoints_group_setup->unlimited_receive_comment_max_points_user;
	                if (!$unlimited_receive_comment_max_points_user){
		           $receive_comment_max_points_user=$activitypoints_group_setup->receive_comment_max_points_user;
	                   $sum_points = activitypoints_get_sum_points_per_action($subgroup_guid,"receive_comment",$container_guid);
	                   $sum_points = $sum_points+$points_pas;
	                   if ($sum_points > $receive_comment_max_points_user)
	                      $create_pas_activitypoints = false;
	                }
	                if ($create_pas_activitypoints) {
	                   $description_pas="";
	                   activitypoints_add($subgroup_guid,$points_pas,"receive_comment",$object_entity_guid,$object_guid,$container_guid,true,$description_pas);
	                }
		     }
	          }
	       }
	    }
            // system_message("createeeeeeeeeeeee comment");
         }


      }
   }
}

function activitypoints_delete_object($event, $object_type, $object) {
	
   $user_guid = elgg_get_logged_in_user_guid();
   $object_guid = $object->getGUID();
   $object_subtype = $object->getSubtype();
   if ((strcmp($object_subtype,'task_answer')!=0)&&(strcmp($object_subtype,'answer')!=0)&&(strcmp($object_subtype,'test_answer')!=0)&&(strcmp($object_subtype,'form_answer')!=0)&&(strcmp($object_subtype,'comment')!=0)&&(strcmp($object_subtype,'discussion_reply')!=0)){
      $object_owner_guid = $object->getOwnerGUID();
      $container_guid = $object->container_guid;
      $container = get_entity($container_guid);
   } else {
      if ((strcmp($object_subtype,'task_answer')==0)||(strcmp($object_subtype,'test_answer')==0)||(strcmp($object_subtype,'form_answer')==0)) {
         if (strcmp($object->who_answers,'member')==0) { 
	    $object_owner_guid = $object->getOwnerGUID();
	    $container_guid = $object->container_guid;
	 } else {
	    $subgroup_guid = $object->container_guid;
	    $subgroup = get_entity($subgroup_guid);
	    $container_guid = $subgroup->container_guid;
	 }
         $container = get_entity($container_guid);
      }
      if ((strcmp($object_subtype,'comment')==0)||(strcmp($object_subtype,'discussion_reply')==0)) {
         $object_entity = get_entity($object->container_guid);
	 $object_entity_guid = $object_entity->getGUID();
	 $object_entity_subtype = $object_entity->getSubtype();
	 $object_owner_guid = $object->getOwnerGUID();
	 $entity_owner_guid = $object_entity->getOwnerGUID();
	 $container_guid = $object_entity->container_guid;
	 $container = get_entity($container_guid);
      }
      if (strcmp($object_subtype,'answer')==0) {
      	 $question_guid = $object->question_guid;
	 $question = get_entity($question_guid);         
	 $container_guid=$question->container_guid;
	 $container = get_entity($container_guid);
	 if (strcmp($object->who_answers,'member')==0) { 
	    $object_owner_guid = $object->getOwnerGUID();
	 } else {
	    $subgroup_guid = $object->owner_guid;
	    $subgroup = get_entity($subgroup_guid);
	 }
      }
   }

   if ($container instanceof ElggObject)
      $container_subtype = get_subtype_id('object',$container->getSubtype());
   if ($container_subtype==6) {
      $container_guid = $container->container_guid;
      $container = get_entity($container_guid);
   }

   if (($container instanceof ElggGroup) && ( $container->activitypoints_enable != "no")) {
      if (strcmp($object_subtype,'task')==0) {
         $activitypoints =  activitypoints_search(null,"view_task",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_task",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeeeeeee task");
      }
      if (strcmp($object_subtype,'test')==0) {
         $activitypoints =  activitypoints_search(null,"view_test",$object_guid,null,$container_guid);
    foreach($activitypoints as $activitypoint) {
       activitypoints_remove($activitypoint->getGUID());
    }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_test",$object_guid,null,$container_guid);
    if ($activitypoint_guid)
       activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeeeeeee test");
      }
      if (strcmp($object_subtype,'form')==0) {
         $activitypoints =  activitypoints_search(null,"view_form",$object_guid,null,$container_guid);
    foreach($activitypoints as $activitypoint) {
       activitypoints_remove($activitypoint->getGUID());
    }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_form",$object_guid,null,$container_guid);
    if ($activitypoint_guid)
       activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeeeeeee form");
      }
      if (strcmp($object_subtype,'task_answer')==0) {
         if (strcmp($object->who_answers,'member')==0) { 
            $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_task_answer",$object_guid,null,$container_guid);
	    if ($activitypoint_guid)
	       activitypoints_remove($activitypoint_guid);
	 } else {
	    $activitypoint_guid =  activitypoints_search($subgroup_guid,"add_task_answer",$object_guid,null,$container_guid);
	    if ($activitypoint_guid)
	       activitypoints_remove($activitypoint_guid);
	 }
         // system_message("deleteeeeeeeeeeeeeeeee task answer");
      }
      if (strcmp($object_subtype,'test_answer')==0) {
         if (strcmp($object->who_answers,'member')==0) { 
            $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_test_answer",$object_guid,null,$container_guid);
            if ($activitypoint_guid)
               activitypoints_remove($activitypoint_guid);
         } else {
            $activitypoint_guid =  activitypoints_search($subgroup_guid,"add_test_answer",$object_guid,null,$container_guid);
            if ($activitypoint_guid)
               activitypoints_remove($activitypoint_guid);
         }
         // system_message("deleteeeeeeeeeeeeeeeee test answer");
      }
      if (strcmp($object_subtype,'form_answer')==0) {
         if (strcmp($object->who_answers,'member')==0) { 
            $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_form_answer",$object_guid,null,$container_guid);
         if ($activitypoint_guid)
            activitypoints_remove($activitypoint_guid);
         } else {
            $activitypoint_guid =  activitypoints_search($subgroup_guid,"add_form_answer",$object_guid,null,$container_guid);
            if ($activitypoint_guid)
               activitypoints_remove($activitypoint_guid);
         }
         // system_message("deleteeeeeeeeeeeeeeeee form answer");
      }
      if (strcmp($object_subtype,'question')==0) {
         $activitypoints =  activitypoints_search(null,"view_question",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_question",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeeeeeee question");
      }
      if (strcmp($object_subtype,'answer')==0) {
         if (strcmp($object->who_answers,'member')==0) { 
            $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_answer",$object_guid,null,$container_guid);
	    if ($activitypoint_guid)
	       activitypoints_remove($activitypoint_guid);
	 } else {
	    $activitypoint_guid =  activitypoints_search($subgroup_guid,"add_answer",$object_guid,null,$container_guid);
	    if ($activitypoint_guid)
	       activitypoints_remove($activitypoint_guid);
	 }
         // system_message("deleteeeeeeeeeeeeeeeee answer");
      }
      if (strcmp($object_subtype,'blog')==0) {
         $activitypoints =  activitypoints_search(null,"view_blog_post",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_blog_post",$object_guid,null,$container_guid);
	 if ($activitypoint_guid) 
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeeeeeee blog");
      }
      if (strcmp($object_subtype,'page_top')==0) {
         $activitypoints =  activitypoints_search(null,"view_page_top",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_page_top",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeee page top");
      }
      if (strcmp($object_subtype,'page')==0) {
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_page",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeee page");
      }
      if (strcmp($object_subtype,'bookmarks')==0) {
         $activitypoints =  activitypoints_search(null,"view_bookmark",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_bookmark",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeee bookmark");
      }
      if (strcmp($object_subtype,'file')==0) {
         $activitypoints =  activitypoints_search(null,"view_file",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
      	 $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_file",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeee file");
      }
      if (strcmp($object_subtype,'groupforumtopic')==0) {
         $activitypoints =  activitypoints_search(null,"view_forum",$object_guid,null,$container_guid);
	 foreach($activitypoints as $activitypoint) {
	    activitypoints_remove($activitypoint->getGUID());
	 }
         $activitypoint_guid =  activitypoints_search($object_owner_guid,"add_forum",$object_guid,null,$container_guid);
	 if ($activitypoint_guid)
	    activitypoints_remove($activitypoint_guid);
         // system_message("deleteeeeeeeeeeeee groupforumtopic");
      }

      if (strcmp($object_subtype,'discussion_reply')==0) {
         $activitypoint_act_guid =  activitypoints_search($object_owner_guid,"add_forum_post",$object_guid,null,$container_guid);
	 if ($activitypoint_act_guid) 
	    activitypoints_remove($activitypoint_act_guid);
	 if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
	    $activitypoint_pass_guid =  activitypoints_search($entity_owner_guid,"receive_forum_post_teacher",$object_entity_guid,$object_guid,$container_guid);
	 } else {
            $activitypoint_pass_guid =  activitypoints_search($entity_owner_guid,"receive_forum_post",$object_entity_guid,$object_guid,$container_guid);
	 }
	 if ($activitypoint_pass_guid)
	    activitypoints_remove($activitypoint_pass_guid);
         // system_message("deleteteeeeeeeeeeeee group topic post");
      }
      if (strcmp($object_subtype,'comment')==0) {
         $activitypoint_act_guid =  activitypoints_search($object_owner_guid,"add_comment",$object_guid,null,$container_guid);
	 if ($activitypoint_act_guid) 
	    activitypoints_remove($activitypoint_act_guid);
         if (((strcmp($object_entity_subtype,'task_answer')!=0)&&(strcmp($object_entity_subtype,'answer')!=0))||((strcmp($object_entity_subtype,'task_answer')==0)&&(strcmp($object_entity->who_answers,'member')==0))||((strcmp($object_entity_subtype,'answer')==0)&&(strcmp($object_entity->who_answers,'member')==0))){
	    if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
	       $activitypoint_pass_guid =  activitypoints_search($entity_owner_guid,"receive_comment_teacher",$object_entity_guid,$object_guid,$container_guid);
	    } else {
               $activitypoint_pass_guid =  activitypoints_search($entity_owner_guid,"receive_comment",$object_entity_guid,$object_guid,$container_guid);
	    }
	    if ($activitypoint_pass_guid)
	       activitypoints_remove($activitypoint_pass_guid);
	 } else {
	    if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
               $activitypoint_pass_guid =  activitypoints_search($subgroup_guid,"receive_comment_teacher",$object_entity_guid,$object_guid,$container_guid);
	    } else {
	       $activitypoint_pass_guid =  activitypoints_search($subgroup_guid,"receive_comment",$object_entity_guid,$object_guid,$container_guid);
	    }
	    if ($activitypoint_pass_guid)
	       activitypoints_remove($activitypoint_pass_guid);
	 }
         // system_message("deleteteeeeeeeeeeeee comment");
      }


   }
}

function activitypoints_create_annotation($event, $object_type, $object) {

   $user_guid = elgg_get_logged_in_user_guid();
   $object_name = $object->name;
   $object_guid = $object->id;
   $object_entity = get_entity($object->entity_guid);
   $object_entity_guid = $object_entity->getGUID();
   $object_entity_subtype = $object_entity->getSubtype();
   $object_owner_guid = $object->getOwnerGUID();

   $entity_owner_guid = $object_entity->getOwnerGUID();
   $container_guid = $object_entity->container_guid;
   if ((strcmp($object_entity_subtype,'comment')==0)||(strcmp($object_entity_subtype,'discussion_reply')==0)) {
      $container = get_entity($container_guid);
      $container_guid = $container->container_guid;
   }
   $container = get_entity($container_guid);
  
   if ($container instanceof ElggObject) {
      $container_subtype = get_subtype_id('object',$container->getSubtype());
   }
   if ($container_subtype==6) {
      $container_guid = $container->container_guid;
      $container = get_entity($container_guid);
   }

   $options = array('type_subtype_pairs' => array('object' => 'activitypoints_group_setup'), 'limit' => false, 'container_guid' => $container_guid);
   $activitypoints_group_setups = elgg_get_entities_from_metadata($options);
   if ($activitypoints_group_setups) {
      $activitypoints_group_setup = $activitypoints_group_setups[0];
      if (($container instanceof ElggGroup) && ($container->activitypoints_enable != "no")) {

         if (strcmp($object_name,'likes')==0) {
	    if ($object_owner_guid != $entity_owner_guid) {
               $points_act = $activitypoints_group_setup->add_like_points;
	       
	       $unlimited_add_like_max_points_user = $activitypoints_group_setup->unlimited_add_like_max_points_user;
	       
	       $create_act_activitypoints = true;
               if (!$unlimited_add_like_max_points_user){
	          $add_like_max_points_user=$activitypoints_group_setup->add_like_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($object_owner_guid,"add_like",$container_guid);
	          $sum_points = $sum_points+$points_act;
	          if ($sum_points > $add_like_max_points_user)
	             $create_act_activitypoints = false;
	       }
	       if ($create_act_activitypoints) {
	          $description_act="";
	         activitypoints_add($object_owner_guid,$points_act,"add_like",$object_guid,null,$container_guid,false,$description_act);
	       }
	    
	       $create_pas_activitypoints = true;
	       if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
	          $points_pas = $activitypoints_group_setup->receive_like_teacher_points;
	          $unlimited_receive_like_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_like_teacher_max_points_user;
	          if (!$unlimited_receive_like_teacher_max_points_user){
	             $receive_like_teacher_max_points_user=$activitypoints_group_setup->receive_like_teacher_max_points_user;
	             $sum_points = activitypoints_get_sum_points_per_action($entity_owner_guid,"receive_like_teacher",$container_guid);
	             $sum_points = $sum_points+$points_pas;
	             if ($sum_points > $receive_like_teacher_max_points_user)
	                $create_pas_activitypoints = false;
	          }
	          if ($create_pas_activitypoints) {
	             $description_pas="";
	             activitypoints_add($entity_owner_guid,$points_pas,"receive_like_teacher",$object_entity_guid,$object_guid,$container_guid,false,$description_pas);
	          }
	       } else {
	          $points_pas = $activitypoints_group_setup->receive_like_points;
	          $unlimited_receive_like_max_points_user = $activitypoints_group_setup->unlimited_receive_like_max_points_user;
	          if (!$unlimited_receive_like_max_points_user){
	             $receive_like_max_points_user=$activitypoints_group_setup->receive_like_max_points_user;
	             $sum_points = activitypoints_get_sum_points_per_action($entity_owner_guid,"receive_like",$container_guid);
	             $sum_points = $sum_points+$points_pas;
	             if ($sum_points > $receive_like_max_points_user)
	                $create_pas_activitypoints = false;
	          }
	          if ($create_pas_activitypoints) {
	             $description_pas="";
	             activitypoints_add($entity_owner_guid,$points_pas,"receive_like",$object_entity_guid,$object_guid,$container_guid,false,$description_pas);
	          }
	       }
	    }
            //system_message("createeeeeeeeeeeee like");
         }   
      }
   }
}

function activitypoints_delete_annotation($event, $object_type, $object) {

   $user_guid = elgg_get_logged_in_user_guid();
   $object_name = $object->name;
   $object_guid = $object->id;
   $object_entity = get_entity($object->entity_guid);
   $object_entity_guid = $object_entity->getGUID();
   $object_entity_subtype = $object_entity->getSubtype();
   $object_owner_guid = $object->getOwnerGUID();

   $entity_owner_guid = $object_entity->getOwnerGUID();
   $container_guid = $object_entity->container_guid;
   if ((strcmp($object_entity_subtype,'comment')==0)||(strcmp($object_entity_subtype,'discussion_reply')==0)) {
      $container = get_entity($container_guid);
      $container_guid = $container->container_guid;
   }
   $container = get_entity($container_guid);
   
   if ($container instanceof ElggObject)
      $container_subtype = get_subtype_id('object',$container->getSubtype());
   if ($container_subtype==6) {
      $container_guid = $container->container_guid;
      $container = get_entity($container_guid);
   }

   if (($container instanceof ElggGroup) && ( $container->activitypoints_enable != "no")) {
      if (strcmp($object_name,'likes')==0) {
         $activitypoint_act_guid =  activitypoints_search($object_owner_guid,"add_like",$object_guid,null,$container_guid);
	 if ($activitypoint_act_guid) 
	    activitypoints_remove($activitypoint_act_guid);
	 if (activitypoints_is_admin_or_teacher($container_guid,$object_owner_guid)){
	    $activitypoint_pass_guid =  activitypoints_search($entity_owner_guid,"receive_like_teacher",$object_entity_guid,$object_guid,$container_guid);
	 } else {
	    $activitypoint_pass_guid =  activitypoints_search($entity_owner_guid,"receive_like",$object_entity_guid,$object_guid,$container_guid);
	 }
	 if ($activitypoint_pass_guid)
	    activitypoints_remove($activitypoint_pass_guid);
         //system_message("deleteteeeeeeeeeeeee like");
      }
   }
}

function activitypoints_create_group($event, $object_type, $object) {
	 //system_message("createeeeeeeeeeeeeee group");
}

function activitypoints_delete_group($event, $object_type, $object) {
	 //system_message("deleteeeeeeeeeeeeeee group");
}

function activitypoints_route_handler($hook, $type, $returnvalue, $params) {
    /*
     * $returnvalue -> segments[0] = "view"  $returnvalue -> segments[1] = guid del recurso  $returnvalue -> segments[1] = titulo del recurso visto
     */
 
   if ($returnvalue["segments"][0] == "view") {
      $user_guid = elgg_get_logged_in_user_guid();
      $object_guid = $returnvalue["segments"][1]; //-> segments[1];
      $object = get_entity($object_guid);
      if ($object instanceof ElggObject){
         $object_subtype = $object->getSubtype();
         $object_owner_guid = $object->getOwnerGUID();
         $container_guid = $object->container_guid;
         $container = get_entity($container_guid);
      }
   }

   if ($container instanceof ElggObject)
      $container_subtype = get_subtype_id('object',$container->getSubtype());
   if ($container_subtype==6) {
      $container_guid = $container->container_guid;
      $container = get_entity($container_guid);
   }

   if ($user_guid!=$object_owner_guid) {

   $options = array('type_subtype_pairs' => array('object' => 'activitypoints_group_setup'), 'limit' => false, 'container_guid' => $container_guid);
   $activitypoints_group_setups = elgg_get_entities_from_metadata($options);
   if ($activitypoints_group_setups) {
      $activitypoints_group_setup = $activitypoints_group_setups[0];
      if (($container instanceof ElggGroup) && ($container->activitypoints_enable != "no")) {
         if (strcmp($object_subtype,'task')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_task",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_task_points;
	       $unlimited_view_task_max_points_user=$activitypoints_group_setup->unlimited_view_task_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_task_max_points_user){
	          $view_task_max_points_user=$activitypoints_group_setup->view_task_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_task",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_task_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_task",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew task");
         }
         if (strcmp($object_subtype,'test')==0) {
            $activitypoint_guid =  activitypoints_search($user_guid,"view_test",$object_guid,null,$container_guid);
            if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_test_points;
               $unlimited_view_test_max_points_user=$activitypoints_group_setup->unlimited_view_test_max_points_user;
               $create_activitypoints = true;
               if (!$unlimited_view_test_max_points_user){
                  $view_test_max_points_user=$activitypoints_group_setup->view_test_max_points_user;
                  $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_test",$container_guid);
                  $sum_points = $sum_points+$points;
                  if ($sum_points > $view_test_max_points_user)
                     $create_activitypoints = false;
               }
               if ($create_activitypoints) {
                  $description="";
                  activitypoints_add($user_guid,$points,"view_test",$object_guid,null,$container_guid,false,$description);
               }
            }
            // system_message("vieeeeeeeeeeeeeew test");
         }
         if (strcmp($object_subtype,'form')==0) {
            $activitypoint_guid =  activitypoints_search($user_guid,"view_form",$object_guid,null,$container_guid);
            if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_form_points;
               $unlimited_view_form_max_points_user=$activitypoints_group_setup->unlimited_view_form_max_points_user;
               $create_activitypoints = true;
               if (!$unlimited_view_form_max_points_user){
                  $view_form_max_points_user=$activitypoints_group_setup->view_form_max_points_user;
                  $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_form",$container_guid);
                  $sum_points = $sum_points+$points;
                  if ($sum_points > $view_form_max_points_user)
                     $create_activitypoints = false;
               }
               if ($create_activitypoints) {
                  $description="";
                  activitypoints_add($user_guid,$points,"view_form",$object_guid,null,$container_guid,false,$description);
               }
            }
            // system_message("vieeeeeeeeeeeeeew form");
         }
	 if (strcmp($object_subtype,'question')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_question",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_question_points;
	       $unlimited_view_question_max_points_user=$activitypoints_group_setup->unlimited_view_question_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_question_max_points_user){
	          $view_question_max_points_user=$activitypoints_group_setup->view_question_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_question",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_question_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_question",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew question");
         }
	 if (strcmp($object_subtype,'blog')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_blog_post",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_blog_post_points;
	       $unlimited_view_blog_post_max_points_user=$activitypoints_group_setup->unlimited_view_blog_post_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_blog_post_max_points_user){
	          $view_blog_post_max_points_user=$activitypoints_group_setup->view_blog_post_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_blog_post",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_blog_post_max_points_user){
	             $create_activitypoints = false;
		  }
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_blog_post",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew blog post");
         }
	 if (strcmp($object_subtype,'page_top')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_page_top",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_page_top_points;
	       $unlimited_view_page_top_max_points_user=$activitypoints_group_setup->unlimited_view_page_top_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_page_top_max_points_user){
	          $view_page_top_max_points_user=$activitypoints_group_setup->view_page_top_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_page_top",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_page_top_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_page_top",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew page top");
         }
	 if (strcmp($object_subtype,'bookmarks')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_bookmark",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_bookmark_points;
	       $unlimited_view_bookmark_max_points_user=$activitypoints_group_setup->unlimited_view_bookmark_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_bookmark_max_points_user){
	          $view_bookmark_max_points_user=$activitypoints_group_setup->view_bookmark_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_bookmark",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_bookmark_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_bookmark",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew bookmark");
         }
	 if (strcmp($object_subtype,'file')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_file",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_file_points;
	       $unlimited_view_file_max_points_user=$activitypoints_group_setup->unlimited_view_file_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_file_max_points_user){
	          $view_file_max_points_user=$activitypoints_group_setup->view_file_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_file",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_file_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_file",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew file");
         }
	 if (strcmp($object_subtype,'groupforumtopic')==0) {
	    $activitypoint_guid =  activitypoints_search($user_guid,"view_forum",$object_guid,null,$container_guid);
	    if (!$activitypoint_guid) {
               $points=$activitypoints_group_setup->view_forum_points;
	       $unlimited_view_forum_max_points_user=$activitypoints_group_setup->unlimited_view_forum_max_points_user;
	       $create_activitypoints = true;
	       if (!$unlimited_view_forum_max_points_user){
	          $view_forum_max_points_user=$activitypoints_group_setup->view_forum_max_points_user;
	          $sum_points = activitypoints_get_sum_points_per_action($user_guid,"view_forum",$container_guid);
	          $sum_points = $sum_points+$points;
	          if ($sum_points > $view_forum_max_points_user)
	             $create_activitypoints = false;
	       }
	       if ($create_activitypoints) {
	          $description="";
                  activitypoints_add($user_guid,$points,"view_forum",$object_guid,null,$container_guid,false,$description);
	       }
	    }
            // system_message("vieeeeeeeeeeeeeew forum");
	 }
      }
   }
   }
}

elgg_register_plugin_hook_handler('route', 'task', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'test', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'form', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'questions', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'blog', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'pages', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'bookmarks', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'file', 'activitypoints_route_handler');
elgg_register_plugin_hook_handler('route', 'discussion', 'activitypoints_route_handler');

elgg_register_event_handler('create', 'object', 'activitypoints_create_object');

elgg_register_event_handler('delete', 'object', 'activitypoints_delete_object');

elgg_register_event_handler('create', 'annotation', 'activitypoints_create_annotation');

elgg_register_event_handler('delete', 'annotations', 'activitypoints_delete_annotation');

elgg_register_event_handler('create', 'group', 'activitypoints_create_group');

elgg_register_event_handler('delete', 'group', 'activitypoints_delete_group');

$action_base = elgg_get_plugins_path() . 'activitypoints/actions/activitypoints';
elgg_register_action("activitypoints/delete","$action_base/delete.php");
elgg_register_action("activitypoints/reset","$action_base/reset.php");
elgg_register_action("activitypoints/add","$action_base/add.php");
elgg_register_action("activitypoints/export_reset","$action_base/export_reset.php");
elgg_register_action("activitypoints/export_import","$action_base/export_import.php");
elgg_register_action("activitypoints/import_sum","$action_base/import_sum.php");
elgg_register_action("activitypoints/delete_ranking","$action_base/delete_ranking.php");
elgg_register_action("activitypoints/setup_group","$action_base/setup_group.php");
?>
