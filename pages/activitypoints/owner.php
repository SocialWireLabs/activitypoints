<?php

$owner = elgg_get_page_owner_entity();
if (!$owner) {
   forward();
}

// access check for closed groups
group_gatekeeper();

if (!elgg_instanceof($owner, 'object')) {
   if (is_admin_or_teacher($owner->guid))
      elgg_register_title_button('activitypoints','setup_group');
}

$area2 = "<div><br><table><tr><th width=\"50%\"><b>".elgg_echo('activitypoints:column:user')."</b></th>";
$area2 .= "<th width=\"20%\"><b>".elgg_echo('activitypoints:column:points')."</b></th>";
if (elgg_is_admin_logged_in() || elgg_get_logged_in_user_guid() == $owner->owner_guid || (elgg_is_active_plugin('group_tools') && check_entity_relationship(elgg_get_logged_in_user_guid(),'group_admin', $owner->guid)))
   $area2 .= "<th width=\"10%\"><b>".elgg_echo('activitypoints:column:action')."</b></tr>";
$area2 .= "<tr><td colspan=3><hr></td></tr>";

$offset = (int)get_input('offset', 0);

$order_by_metadata = array('name' => 'activitypoints_'.  elgg_get_page_owner_guid(), 'direction' => 'desc', 'as' => 'integer');
$options = array('type' => 'user', 'relationship' => 'member', 'relationship_guid' => elgg_get_page_owner_guid(), 'inverse_relationship' => TRUE,'limit' => null, 'offset' => $offset, 'order_by_metadata' => $order_by_metadata);

$ordered_members = elgg_get_entities_from_relationship($options);

foreach ($ordered_members as $member) {
   if (!is_admin_or_teacher($owner->guid, $member->guid)) {
      $metadata_name = 'activitypoints_'.$owner->guid;
      if ($member->$metadata_name){
         $wwwroot = elgg_get_config('wwwroot');
         $area2 .= "<tr><td><a href=\"{$wwwroot}activitypoints/detail/group:{$owner->guid}/{$member->guid}\">{$member->name}</a></td>";	
	 
	 $sum_points = 0;
	 //De usuario
         $options = array('limit' => 0, 'type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $member->guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'group_guid', 'value' => $owner->guid),array('name' => 'ranking_guid', 'value' => 0)));

	 $entities = new ElggBatch(elgg_get_entities_from_metadata, $options);

	 if ($entities){
	    foreach ($entities as $one_entity) {
	       $sum_points += (int) $one_entity->points;
	    }
	 }

         //De subgrupo
         $subgroups = elgg_get_entities_from_relationship(array('type_subtype_pairs' => array('group' => 'lbr_subgroup'),'container_guids' => $owner->guid,'relationship' => 'member','inverse_relationship' => false,'relationship_guid' => $member->guid));
         if ($subgroups) {
            $options_subgroup = array('limit' => 0, 'type' => 'object', 'subtype' => 'activitypoint', 'container_guid' => $subgroups[0]->guid, 'metadata_case_sensitive' => false,'metadata_name_value_pairs' => array(array('name' => 'group_guid', 'value' => $owner->guid),array('name' => 'ranking_guid', 'value' => 0)));

	    $entities_subgroup = new ElggBatch(elgg_get_entities_from_metadata, $options_subgroup);
              
	    if ($entities_subgroup){
	       foreach ($entities_subgroup as $one_entity) {
	          $sum_points += (int) $one_entity->points;
	       }
	    }
         }
	    
	 if ((!is_numeric($member->$medatada_name))||($member->$metadata_name!=$sum_points)) {
	    $area2 .= "<td>$sum_points</td>";
	    $member->$metadata_name = $sum_points;
	 } else {
	    $area2 .= "<td>{$member->$metadata_name}</td>";
	 }
      
         if (is_admin_or_teacher($owner->guid))
            $area2 .= "<td>" . elgg_view("output/url", array('href' => elgg_add_action_tokens_to_url ($wwwroot. "action/activitypoints/reset?user_guid={$member->guid}&group=$owner->guid"),'text' => elgg_echo('activitypoints:reset'),'confirm' => sprintf(elgg_echo('activitypoints:reset:confirm'), $entity->name)))."</td></tr>";
      }
   }
}
   
$area2 .= "</table></div>";

$title = elgg_echo('activitypoints:title:group',array($owner->name));

$params = array('content' => $area2,'title' => $title);

if (elgg_instanceof($owner, 'group')) {
   $params['filter'] = '';
}

if ($owner instanceof ElggGroup)
   $params['sidebar'] = elgg_view('activitypoints/sidebar/links_sidebar', array('owner' => $owner));

$body = elgg_view_layout('content', $params);
echo elgg_view_page($title,$body);
?>