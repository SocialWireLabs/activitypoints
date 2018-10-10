<?php

$owner = get_entity($vars['entity']->owner_guid);
$icon = elgg_view_entity_icon($owner, 'small');

$points = sprintf(elgg_echo('activitypoints:object:points'),$vars['entity']->points);

$num_points = $vars['entity']->points;

if ($num_points != 0) {

   if ($vars['entity']->rated_entity) {

      $rated_entity = get_entity($vars['entity']->rated_entity);

      $action = $vars['entity']->action;
    
      switch ($action) {
         case "add_task":
            $text_detail = elgg_echo('activitypoints:detail_adding_task');
         break;
         case "view_task":
            $text_detail = elgg_echo('activitypoints:detail_viewing_task');
         break;
         case "add_task_answer":
            $text_detail = elgg_echo('activitypoints:detail_adding_task_answer');
         break;
         case "add_test":
            $text_detail = elgg_echo('activitypoints:detail_adding_test');
         break;
         case "view_test":
            $text_detail = elgg_echo('activitypoints:detail_viewing_test');
         break;
         case "add_test_answer":
            $text_detail = elgg_echo('activitypoints:detail_adding_test_answer');
         break;
         case "add_form":
            $text_detail = elgg_echo('activitypoints:detail_adding_form');
         break;
         case "view_form":
            $text_detail = elgg_echo('activitypoints:detail_viewing_form');
         break;
         case "add_form_answer":
            $text_detail = elgg_echo('activitypoints:detail_adding_form_answer');
         break;
         case "add_question":
            $text_detail = elgg_echo('activitypoints:detail_adding_question');
         break;
         case "view_question":
            $text_detail = elgg_echo('activitypoints:detail_viewing_question');
         break;
         case "add_answer":
            $text_detail = elgg_echo('activitypoints:detail_adding_answer');
         break;
         case "add_blog_post":
            $text_detail = elgg_echo('activitypoints:detail_adding_blog_post');
         break;
         case "view_blog_post":
            $text_detail = elgg_echo('activitypoints:detail_viewing_blog_post');
         break;
         case "add_page_top":
            $text_detail = elgg_echo('activitypoints:detail_adding_page_top');
         break;
         case "view_page_top":
            $text_detail = elgg_echo('activitypoints:detail_viewing_page_top');
         break;
         case "add_page":
            $text_detail = elgg_echo('activitypoints:detail_adding_page');
         break;
         case "add_bookmark":
            $text_detail = elgg_echo('activitypoints:detail_adding_bookmark');
         break;
         case "view_bookmark":
            $text_detail = elgg_echo('activitypoints:detail_viewing_bookmark');
         break;
         case "add_file":
            $text_detail = elgg_echo('activitypoints:detail_adding_file');
         break;
         case "view_file":
            $text_detail = elgg_echo('activitypoints:detail_viewing_file');
         break;
         case "add_forum":
            $text_detail = elgg_echo('activitypoints:detail_adding_forum');
         break;
         case "view_forum":
            $text_detail = elgg_echo('activitypoints:detail_viewing_forum');
         break;
         case "add_forum_post":
            $text_detail = elgg_echo('activitypoints:detail_adding_forum_post');
         break;
         case "receive_forum_post":
	 case "receive_forum_post_teacher":
            $text_detail = elgg_echo('activitypoints:detail_receiving_forum_post');
         break;
         case "add_comment":
	    if ($rated_entity) {
	       $rated_entity_subtype = $rated_entity->getSubtype();
               if (($rated_entity_subtype == 'task_answer')||($rated_entity_subtype == 'answer')) {
	          $text_detail = elgg_echo('activitypoints:detail_adding_comment_answer');
	       } else {
                  $text_detail = elgg_echo('activitypoints:detail_adding_comment');
               }
	    } else {
               $text_detail = "";
	    }
	 break;
         case "receive_comment":
	 case "receive_comment_teacher":
	    if ($rated_entity) {
	       $rated_entity_subtype = $rated_entity->getSubtype();
               if (($rated_entity_subtype == 'task_answer')||($rated_entity_subtype == 'answer')) {
	          $text_detail = elgg_echo('activitypoints:detail_receiving_comment_answer');
	       } else {
                  $text_detail = elgg_echo('activitypoints:detail_receiving_comment');
               }
	    } else {
               $text_detail = "";
	    }
	 break;
         case "add_like":
	    $comment_guid = $vars['entity']->rated_entity; 
            $comment = elgg_get_annotation_from_id($comment_guid);
	    if ($comment) {
               $rated_entity = get_entity($comment->entity_guid);
	       if ($rated_entity) {
	          $rated_entity_subtype = $rated_entity->getSubtype();
                  if (($rated_entity_subtype == 'task_answer')||($rated_entity_subtype == 'answer')) {
                     $text_detail = elgg_echo('activitypoints:detail_adding_like_answer');
	          } else {
	             $text_detail = elgg_echo('activitypoints:detail_adding_like');
	          }
	       } else {
	          $text_detail = "";
	       }
	    } else {
	       $text_detail = "";
	    }
         break;
         case "receive_like":
	 case "receive_like_teacher":
	    if ($rated_entity) {
	       $rated_entity_subtype = $rated_entity->getSubtype();
               if (($rated_entity_subtype == 'task_answer')||($rated_entity_subtype == 'answer')) {
                  $text_detail = elgg_echo('activitypoints:detail_receiving_like_answer');
	       } else {
	          $text_detail = elgg_echo('activitypoints:detail_receiving_like');
	       }
	    } else {
               $text_detail = "";
	    }
         break;
      }
         
      	 
      if ((strcmp($action,"add_forum_post")!=0)&&(strcmp($action,"receive_forum_post")!=0)&&(strcmp($action,"receive_forum_post_teacher")!=0)&&(strcmp($action,"add_like")!=0)&&(strcmp($action,"receive_like")!=0)&&(strcmp($action,"receive_like_teacher")!=0)&&(strcmp($action,"add_comment")!=0)&&(strcmp($action,"receive_comment")!=0)&&(strcmp($action,"receive_comment_teacher")!=0)){
         if ($rated_entity) {
	    $rated_entity_subtype = $rated_entity->getSubtype();
            if ($rated_entity_subtype == 'task_answer'){	
               //como no tienen título ni vista, mostramos la tarea que se contesta
	       $options = array('relationship' => 'task_answer', 'relationship_guid' => $rated_entity->getGUID(),'inverse_relationship' => true, 'type' => 'object', 'subtype' => 'task');
               $tasks=elgg_get_entities_from_relationship($options);
               if (!empty($tasks))
                  $rated_entity=$tasks[0];
            }  

            if ($rated_entity_subtype == 'test_answer'){ 
               //como no tienen título ni vista, mostramos el test que se contesta
               $options = array('relationship' => 'test_answer', 'relationship_guid' => $rated_entity->getGUID(),'inverse_relationship' => true, 'type' => 'object', 'subtype' => 'test');
               $tests=elgg_get_entities_from_relationship($options);
               if (!empty($tests))
                  $rated_entity=$tests[0];
            }

            if ($rated_entity_subtype == 'form_answer'){ 
               //como no tienen título ni vista, mostramos el formulario que se contesta
               $options = array('relationship' => 'form_answer', 'relationship_guid' => $rated_entity->getGUID(),'inverse_relationship' => true, 'type' => 'object', 'subtype' => 'form');
               $forms=elgg_get_entities_from_relationship($options);
               if (!empty($forms))
                  $rated_entity=$forms[0];
            }

            if ($rated_entity_subtype == 'answer'){
               //como no tienen título ni vista, mostramos la pregunta que se contesta
               $rated_entity = get_entity($rated_entity->container_guid);
            }
	 }
      }
       

       if ((strcmp($action,"add_comment")==0)||(strcmp($action,"receive_comment")==0)||(strcmp($action,"receive_comment_teacher")==0)){
          if ($rated_entity) {
	     $rated_entity_subtype = $rated_entity->getSubtype();
             if ($rated_entity_subtype == 'task_answer'){
                //como no tienen título ni vista, mostramos la tarea cuya respuesta se comenta
	        $options = array('relationship' => 'task_answer', 'relationship_guid' => $rated_entity->getGUID(),'inverse_relationship' => true, 'type' => 'object', 'subtype' => 'task');
                $tasks=elgg_get_entities_from_relationship($options);
                if (!empty($tasks))
                   $rated_entity=$tasks[0];
             }
             if ($rated_entity_subtype == 'answer'){
                //como no tienen título ni vista, mostramos la pregunta cuya respuesta se comenta
                $rated_entity = get_entity($rated_entity->container_guid);
             }
	  }
       }

       if ($rated_entity) {

          $url = $rated_entity->getURL();
	  
	  if ($rated_entity->getSubtype()=="thewire"){
	     $title = $url;
	  } else {
	     if (($rated_entity->getSubtype()=="discussion_reply")||($rated_entity->getSubtype()=="comment")) {
	        $ent = get_entity($rated_entity->container_guid);
	        if ((strcmp($action,"add_like")==0)||(strcmp($action,"receive_like")==0)||(strcmp($action,"receive_like_teacher")==0)){
		   if ($rated_entity->getSubtype()=="discussion_reply")
		      $title = elgg_echo("activitypoints:detail_a_reply_in") . $ent->title;
		   else
		      $title = elgg_echo("activitypoints:detail_a_comment_in") . $ent->title;
		} else {
	           $title = $ent->title;
		}
	     } else {
                $title = $rated_entity->title;
	        if (!$title)
                   $title = $vars['entity']->description;
	        }
	     }
	  $link = "<a href=\"{$url}\">{$title}</a>";
       } else {
          $link = $vars['entity']->description;
       }

       $info = "<p>$points $text_detail $link</p>";

   } else {
       $info = "<p>$points {$vars['entity']->description}</p>";
   }

   //Identidad y fecha
   $container = get_entity($vars['entity']->container_guid);
   $friendlytime = elgg_view_friendly_time($vars['entity']->time_created);
   $info .= "<p class=\"owner_timestamp\">{$container->name} {$friendlytime}";

   //Controles para borrar
   if (is_admin_or_teacher($vars['entity']->group_guid))
      $info .= " (<a href=\"" . elgg_add_action_tokens_to_url(elgg_get_site_url() . "action/activitypoints/delete?guid={$vars['entity']->guid}")."\">".elgg_echo('activitypoints:delete')."</a>)";

   $html .= elgg_view_image_block($icon,$info);
   echo $html;

}

?>
