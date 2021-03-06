<?php

$group = elgg_get_page_owner_entity();

if ($group->activitypoints_enable == "no") {
	return true;
}

$all_link = elgg_view('output/url', array(
	'href' => "activitypoints/group/$group->guid/all",
	'text' => elgg_echo('link:view:all'),
	'is_trusted' => true,
));


elgg_push_context('widgets');
$content = "<div><br><table><tr><th width=\"90%\"><b>".elgg_echo('activitypoints:column:user_widget')."</b></th>";
$content .= "<th width=\"20%\"><b>".elgg_echo('activitypoints:column:points')."</b></th>";
$content .= "<tr><td colspan=2><hr></td></tr>";

$offset = (int)get_input('offset', 0);

$order_by_metadata = array('name' => 'activitypoints_'.  elgg_get_page_owner_guid(), 'direction' => 'desc', 'as' => 'integer');
$options = array('type' => 'user', 'relationship' => 'member', 'relationship_guid' => elgg_get_page_owner_guid(), 'inverse_relationship' => TRUE,
    'limit' => 5, 'offset' => $offset, 'order_by_metadata' => $order_by_metadata);

$ordered_members = elgg_get_entities_from_relationship($options);

foreach ($ordered_members as $member) {
    if (!is_admin_or_teacher($group->guid, $member->guid)) {
        $wwwroot = elgg_get_config('wwwroot');
        $content .= "<tr><td><a href=\"{$wwwroot}activitypoints/detail/group:{$group->guid}/{$member->guid}\">{$member->name}</a></td>";
        $metadata_name = 'activitypoints_'.$group->guid;
        $content .= "<td>{$member->$metadata_name}</td></tr>";
        $content .= "<tr><td colspan=3><hr></td></tr>";
    }
}
$content .= "</table></div>";


elgg_pop_context();

if (!$content) {
	$content = '<p>' . elgg_echo('activitypoints:none') . '</p>';
}

if (is_admin_or_teacher($group->guid))
    $new_link = elgg_view('output/url', array(
            'href' => "activitypoints/add/$group->guid",
            'text' => elgg_echo('activitypoints:title:add'),
            'is_trusted' => true,
    ));
else
    $new_link = '';
echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('activitypoints:submenu:list'),
	'content' => $content,
	'all_link' => $all_link,
	'add_link' => $new_link,
));

?>
