<?php

$group_guid = get_input('group_guid', 0);
$owner = get_entity($group_guid);
if (!$owner || !elgg_instanceof($owner, 'group')) {
   forward();
}
elgg_set_page_owner_guid($group_guid);
                
// access check for closed groups
group_gatekeeper();

$vars['group_guid'] = $owner->guid;
$form_vars = array('enctype' => 'multipart/form-data');
$content = elgg_view_form('activitypoints/export_reset', $form_vars, $vars);
$content .= elgg_view_form('activitypoints/export_import', $form_vars, $vars);
$content .= elgg_view_form('activitypoints/import_sum', $form_vars, $vars);
$content .= elgg_view_form('activitypoints/delete_ranking', $form_vars, $vars);

$title = elgg_echo('activitypoints:title:export', array($user->name));

$params = array('content' => $content,'title' => $title);

if (elgg_instanceof($owner, 'group')) {
   $params['filter'] = '';
}

if ($owner instanceof ElggGroup)
   $params['sidebar'] = elgg_view('activitypoints/sidebar/links_sidebar', array('owner' => $owner));

$body = elgg_view_layout('content', $params);
echo elgg_view_page($title,$body);
?>