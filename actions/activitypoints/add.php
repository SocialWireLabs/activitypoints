<?php

$user_guid = (int) get_input('user_guid');
$points = (int) get_input('points');
$group_guid = (int) get_input('group_guid');
$description = get_input('description');

if ($points!=0) {
   activitypoints_add($user_guid, $points, null, null, null, $group_guid, false, $description);
   system_message(elgg_echo("activitypoints:add_success"));
} else {
   register_error(elgg_echo("activitypoints:empty_points"));
}
forward(REFERER);

?>