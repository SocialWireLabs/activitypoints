<?php

$guid = (int) get_input('guid');
activitypoints_remove($guid);

system_message(elgg_echo("activitypoints:delete_success"));
forward($_SERVER['HTTP_REFERER']);

?>