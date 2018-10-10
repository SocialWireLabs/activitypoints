<?php

$owner = $vars['owner'];

$activitypoints_string = elgg_echo('activitypoints:submenu:list');
$add_activitypoints_string = elgg_echo('activitypoints:submenu:add');
$export_activitypoints_string = elgg_echo('activitypoints:submenu:export');
$wwwroot = elgg_get_config('wwwroot');

$links = <<<EOT
<div class="elgg-module elgg-owner-block">
<div class="elgg-head">
    <div class="elgg-image-block clearfix">
        <div class="elgg-body">
    <h3><a href="{$wwwroot}activitypoints/group/{$owner->guid}/all">{$activitypoints_string}</a></h3></div></div>
</div>
<div class="elgg-body">
    <ul class="elgg-menu elgg-menu-owner-block elgg-menu-owner-block-default">
        <li><a href="{$wwwroot}activitypoints/group/{$owner->guid}/all">{$activitypoints_string}</a></li>
EOT;

if (is_admin_or_teacher($owner->guid)) {
    $links .= <<<EOT
        <li><a href="{$wwwroot}activitypoints/add/{$owner->guid}">{$add_activitypoints_string}</a></li>
        <li><a href="{$wwwroot}activitypoints/export/{$owner->guid}">{$export_activitypoints_string}</a></li>
EOT;
}

$links .= <<<EOT
    </ul>
</div>
</div>
EOT;

echo $links;