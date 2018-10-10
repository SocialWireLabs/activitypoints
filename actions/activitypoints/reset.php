<?php

$user_guid = (int)get_input('user_guid');
$group_guid = (int)get_input('group');

activitypoints_reset_user($user_guid, $group_guid);
    
system_message(elgg_echo("activitypoints:reset:success"));
forward(REFERER);

?>
