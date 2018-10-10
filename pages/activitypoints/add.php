<?php
                
$owner = elgg_get_page_owner_entity();
if (!$owner) {
   forward();
}

// access check for closed groups
group_gatekeeper();

$vars['group_guid'] = $owner->guid;
$form_vars = array('enctype' => 'multipart/form-data');
$content = elgg_view_form('activitypoints/add', $form_vars, $vars);
$title = elgg_echo('activitypoints:title:add', array($user->name));

$params = array('content' => $content,'title' => $title);

if (elgg_instanceof($owner, 'group')) {
   $params['filter'] = '';
}

if ($owner instanceof ElggGroup)
   $params['sidebar'] = elgg_view('activitypoints/sidebar/links_sidebar', array('owner' => $owner));

$body = elgg_view_layout('content', $params);
echo elgg_view_page($title,$body);

?>