<div class="contentWrapper">

<?php

$user_guid = elgg_get_logged_in_user_guid();
$user = get_entity($user_guid);

$activitypoints_group_setup = $vars['entity'];
$container_guid = $vars['container_guid'];
$container = get_entity($container_guid);

$action = "activitypoints/setup_group";

if (!elgg_is_sticky_form('setup_group_activitypoints')) {
   if ($activitypoints_group_setup) {
      $add_task_points = $activitypoints_group_setup->add_task_points;
      $unlimited_add_task_max_points_user = $activitypoints_group_setup->unlimited_add_task_max_points_user; 
      $add_task_max_points_user = $activitypoints_group_setup->add_task_max_points_user;
      $view_task_points = $activitypoints_group_setup->view_task_points;
      $unlimited_view_task_max_points_user = $activitypoints_group_setup->unlimited_view_task_max_points_user; 
      $view_task_max_points_user = $activitypoints_group_setup->view_task_max_points_user;
      $add_task_answer_points = $activitypoints_group_setup->add_task_answer_points;
      $unlimited_add_task_answer_max_points_user = $activitypoints_group_setup->unlimited_add_task_answer_max_points_user; 
      $add_task_answer_max_points_user = $activitypoints_group_setup->add_task_answer_max_points_user;
      ///
      $add_test_points = $activitypoints_group_setup->add_test_points;
      $unlimited_add_test_max_points_user = $activitypoints_group_setup->unlimited_add_test_max_points_user;
      $add_test_max_points_user = $activitypoints_group_setup->add_test_max_points_user;
      $view_test_points = $activitypoints_group_setup->view_test_points;
      $unlimited_view_test_max_points_user = $activitypoints_group_setup->unlimited_view_test_max_points_user; 
      $view_test_max_points_user = $activitypoints_group_setup->view_test_max_points_user;
      $add_test_answer_points = $activitypoints_group_setup->add_test_answer_points;
      $unlimited_add_test_answer_max_points_user = $activitypoints_group_setup->unlimited_add_test_answer_max_points_user; 
      $add_test_answer_max_points_user = $activitypoints_group_setup->add_test_answer_max_points_user;
      ///
      $add_form_points = $activitypoints_group_setup->add_form_points;
      $unlimited_add_form_max_points_user = $activitypoints_group_setup->unlimited_add_form_max_points_user;
      $add_form_max_points_user = $activitypoints_group_setup->add_form_max_points_user;
      $view_form_points = $activitypoints_group_setup->view_form_points;
      $unlimited_view_form_max_points_user = $activitypoints_group_setup->unlimited_view_form_max_points_user; 
      $view_form_max_points_user = $activitypoints_group_setup->view_form_max_points_user;
      $add_form_answer_points = $activitypoints_group_setup->add_form_answer_points;
      $unlimited_add_form_answer_max_points_user = $activitypoints_group_setup->unlimited_add_form_answer_max_points_user; 
      $add_form_answer_max_points_user = $activitypoints_group_setup->add_form_answer_max_points_user;
      ///
      $add_question_points = $activitypoints_group_setup->add_question_points;
      $unlimited_add_question_max_points_user = $activitypoints_group_setup->unlimited_add_question_max_points_user; 
      $add_question_max_points_user = $activitypoints_group_setup->add_question_max_points_user;
      $view_question_points = $activitypoints_group_setup->view_question_points;
      $unlimited_view_question_max_points_user = $activitypoints_group_setup->unlimited_view_question_max_points_user; 
      $view_question_max_points_user = $activitypoints_group_setup->view_question_max_points_user;
      $add_answer_points = $activitypoints_group_setup->add_answer_points;
      $unlimited_add_answer_max_points_user = $activitypoints_group_setup->unlimited_add_answer_max_points_user; 
      $add_answer_max_points_user = $activitypoints_group_setup->add_answer_max_points_user;
      $add_blog_post_points = $activitypoints_group_setup->add_blog_post_points;
      $unlimited_add_blog_post_max_points_user = $activitypoints_group_setup->unlimited_add_blog_post_max_points_user; 
      $add_blog_post_max_points_user = $activitypoints_group_setup->add_blog_post_max_points_user;
      $view_blog_post_points = $activitypoints_group_setup->view_blog_post_points;
      $unlimited_view_blog_post_max_points_user = $activitypoints_group_setup->unlimited_view_blog_post_max_points_user; 
      $view_blog_post_max_points_user = $activitypoints_group_setup->view_blog_post_max_points_user;
      $add_page_top_points = $activitypoints_group_setup->add_page_top_points;
      $unlimited_add_page_top_max_points_user = $activitypoints_group_setup->unlimited_add_page_top_max_points_user; 
      $add_page_top_max_points_user = $activitypoints_group_setup->add_page_top_max_points_user;
      $view_page_top_points = $activitypoints_group_setup->view_page_top_points;
      $unlimited_view_page_top_max_points_user = $activitypoints_group_setup->unlimited_view_page_top_max_points_user; 
      $view_page_top_max_points_user = $activitypoints_group_setup->view_page_top_max_points_user;
      $add_page_points = $activitypoints_group_setup->add_page_points;
      $unlimited_add_page_max_points_user = $activitypoints_group_setup->unlimited_add_page_max_points_user; 
      $add_page_max_points_user = $activitypoints_group_setup->add_page_max_points_user;
      $add_bookmark_points = $activitypoints_group_setup->add_bookmark_points;
      $unlimited_add_bookmark_max_points_user = $activitypoints_group_setup->unlimited_add_bookmark_max_points_user; 
      $add_bookmark_max_points_user = $activitypoints_group_setup->add_bookmark_max_points_user;
      $view_bookmark_points = $activitypoints_group_setup->view_bookmark_points;
      $unlimited_view_bookmark_max_points_user = $activitypoints_group_setup->unlimited_view_bookmark_max_points_user; 
      $view_bookmark_max_points_user = $activitypoints_group_setup->view_bookmark_max_points_user;
      $add_file_points = $activitypoints_group_setup->add_file_points;
      $unlimited_add_file_max_points_user = $activitypoints_group_setup->unlimited_add_file_max_points_user; 
      $add_file_max_points_user = $activitypoints_group_setup->add_file_max_points_user;
      $view_file_points = $activitypoints_group_setup->view_file_points;
      $unlimited_view_file_max_points_user = $activitypoints_group_setup->unlimited_view_file_max_points_user; 
      $view_file_max_points_user = $activitypoints_group_setup->view_file_max_points_user;
      $add_forum_points = $activitypoints_group_setup->add_forum_points;
      $unlimited_add_forum_max_points_user = $activitypoints_group_setup->unlimited_add_forum_max_points_user; 
      $add_forum_max_points_user = $activitypoints_group_setup->add_forum_max_points_user;
      $view_forum_points = $activitypoints_group_setup->view_forum_points;
      $unlimited_view_forum_max_points_user = $activitypoints_group_setup->unlimited_view_forum_max_points_user; 
      $view_forum_max_points_user = $activitypoints_group_setup->view_forum_max_points_user;
      $add_forum_post_points = $activitypoints_group_setup->add_forum_post_points;
      $receive_forum_post_points = $activitypoints_group_setup->receive_forum_post_points;
      $receive_forum_post_teacher_points = $activitypoints_group_setup->receive_forum_post_teacher_points;
      $unlimited_add_forum_post_max_points_user = $activitypoints_group_setup->unlimited_add_forum_post_max_points_user; 
      $add_forum_post_max_points_user = $activitypoints_group_setup->add_forum_post_max_points_user;
      $unlimited_receive_forum_post_max_points_user = $activitypoints_group_setup->unlimited_receive_forum_post_max_points_user; 
      $receive_forum_post_max_points_user = $activitypoints_group_setup->receive_forum_post_max_points_user;
      $unlimited_receive_forum_post_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_forum_post_teacher_max_points_user; 
      $receive_forum_post_teacher_max_points_user = $activitypoints_group_setup->receive_forum_post_teacher_max_points_user;
      $unlimited_max_forum_posts_user_object = $activitypoints_group_setup->unlimited_max_forum_posts_user_object; 
      $max_forum_posts_user_object = $activitypoints_group_setup->max_forum_posts_user_object;
      $add_comment_points = $activitypoints_group_setup->add_comment_points;
      $receive_comment_points = $activitypoints_group_setup->receive_comment_points;
      $receive_comment_teacher_points = $activitypoints_group_setup->receive_comment_teacher_points;
      $unlimited_add_comment_max_points_user = $activitypoints_group_setup->unlimited_add_comment_max_points_user; 
      $add_comment_max_points_user = $activitypoints_group_setup->add_comment_max_points_user;
      $unlimited_receive_comment_max_points_user = $activitypoints_group_setup->unlimited_receive_comment_max_points_user; 
      $receive_comment_max_points_user = $activitypoints_group_setup->receive_comment_max_points_user;
      $unlimited_receive_comment_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_comment_teacher_max_points_user; 
      $receive_comment_teacher_max_points_user = $activitypoints_group_setup->receive_comment_teacher_max_points_user;
      $unlimited_max_comments_user_object = $activitypoints_group_setup->unlimited_max_comments_user_object; 
      $max_comments_user_object = $activitypoints_group_setup->max_comments_user_object;
      $add_like_points = $activitypoints_group_setup->add_like_points;
      $receive_like_points = $activitypoints_group_setup->receive_like_points;
      $receive_like_teacher_points = $activitypoints_group_setup->receive_like_teacher_points;
      $unlimited_add_like_max_points_user = $activitypoints_group_setup->unlimited_add_like_max_points_user; 
      $add_like_max_points_user = $activitypoints_group_setup->add_like_max_points_user;
      $unlimited_receive_like_max_points_user = $activitypoints_group_setup->unlimited_receive_like_max_points_user; 
      $receive_like_max_points_user = $activitypoints_group_setup->receive_like_max_points_user;
      $unlimited_receive_like_teacher_max_points_user = $activitypoints_group_setup->unlimited_receive_like_teacher_max_points_user; 
      $receive_like_teacher_max_points_user = $activitypoints_group_setup->receive_like_teacher_max_points_user;
   } else {
      $add_task_points = "";
      $unlimited_add_task_max_points_user = true; 
      $add_task_max_points_user = "";
      $view_task_points = "";
      $unlimited_view_task_max_points_user = true; 
      $view_task_max_points_user = "";
      $add_task_answer_points = "";
      $unlimited_add_task_answer_max_points_user = true; 
      $add_task_answer_max_points_user = "";
      ///
      $add_test_points = "";
      $unlimited_add_test_max_points_user = true; 
      $add_test_max_points_user = "";
      $view_test_points = "";
      $unlimited_view_test_max_points_user = true; 
      $view_test_max_points_user = "";
      $add_test_answer_points = "";
      $unlimited_add_test_answer_max_points_user = true; 
      $add_test_answer_max_points_user = "";
      ///
      $add_form_points = "";
      $unlimited_add_form_max_points_user = true; 
      $add_form_max_points_user = "";
      $view_form_points = "";
      $unlimited_view_form_max_points_user = true; 
      $view_form_max_points_user = "";
      $add_form_answer_points = "";
      $unlimited_add_form_answer_max_points_user = true; 
      $add_form_answer_max_points_user = "";
      ///
      $add_question_points = "";
      $unlimited_add_question_max_points_user = true; 
      $add_question_max_points_user = "";
      $view_question_points = "";
      $unlimited_view_question_max_points_user = true; 
      $view_question_max_points_user = "";
      $add_answer_points = "";
      $unlimited_add_answer_max_points_user = true; 
      $add_answer_max_points_user = "";
      $add_blog_post_points = "";
      $unlimited_add_blog_post_max_points_user = true; 
      $add_blog_post_max_points_user = "";
      $view_blog_post_points = "";
      $unlimited_view_blog_post_max_points_user = true; 
      $view_blog_post_max_points_user = "";
      $add_page_top_points = "";
      $unlimited_add_page_top_max_points_user = true; 
      $add_page_top_max_points_user = "";
      $view_page_top_points = "";
      $unlimited_view_page_top_max_points_user = true; 
      $view_page_top_max_points_user = "";
      $add_page_points = "";
      $unlimited_add_page_max_points_user = true; 
      $add_page_max_points_user = "";
      $add_bookmark_points = "";
      $unlimited_add_bookmark_max_points_user = true; 
      $add_bookmark_max_points_user = "";
      $view_bookmark_points = "";
      $unlimited_view_bookmark_max_points_user = true; 
      $view_bookmark_max_points_user = "";
      $add_file_points = "";
      $unlimited_add_file_max_points_user = true; 
      $add_file_max_points_user = "";
      $view_file_points = "";
      $unlimited_view_file_max_points_user = true; 
      $view_file_max_points_user = "";
      $add_forum_points = "";
      $unlimited_add_forum_max_points_user = true; 
      $add_forum_max_points_user = "";
      $view_forum_points = "";
      $unlimited_view_forum_max_points_user = true; 
      $view_forum_max_points_user = "";
      $add_forum_post_points = "";
      $receive_forum_post_points = "";
      $receive_forum_post_teacher_points = "";
      $unlimited_add_forum_post_max_points_user = true; 
      $add_forum_post_max_points_user = "";
      $unlimited_receive_forum_post_max_points_user = true; 
      $receive_forum_post_max_points_user = "";
      $unlimited_receive_forum_post_teacher_max_points_user = true; 
      $receive_forum_post_teacher_max_points_user = "";
      $unlimited_max_forum_posts_user_object = true; 
      $max_forum_posts_user_object = "";
      $add_comment_points = "";
      $receive_comment_points = "";
      $receive_comment_teacher_points = "";
      $unlimited_add_comment_max_points_user = true; 
      $add_comment_max_points_user = "";
      $unlimited_receive_comment_max_points_user = true; 
      $receive_comment_max_points_user = "";
      $unlimited_receive_comment_teacher_max_points_user = true; 
      $receive_comment_teacher_max_points_user = "";
      $unlimited_max_comments_user_object = true; 
      $max_comments_user_object = "";
      $add_like_points = "";
      $receive_like_points = "";
      $receive_like_teacher_points = "";
      $unlimited_add_like_max_points_user = true; 
      $add_like_max_points_user = "";
      $unlimited_receive_like_max_points_user = true; 
      $receive_like_max_points_user = "";
      $unlimited_receive_like_teacher_max_points_user = true; 
      $receive_like_teacher_max_points_user = "";
   }
} else {
   $add_task_points = elgg_get_sticky_value('setup_group_activitypoints','add_task_points');
   $unlimited_add_task_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_task_max_points_user');
   $add_task_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_task_max_points_user');
   $view_task_points = elgg_get_sticky_value('setup_group_activitypoints','view_task_points');
   $unlimited_view_task_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_task_max_points_user');
   $view_task_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_task_max_points_user');
   $add_task_answer_points = elgg_get_sticky_value('setup_group_activitypoints','add_task_answer_points');
   $unlimited_add_task_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_task_answer_max_points_user');
   $add_task_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_task_answer_max_points_user');
   ///
   $add_test_points = elgg_get_sticky_value('setup_group_activitypoints','add_test_points');
   $unlimited_add_test_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_test_max_points_user');
   $add_test_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_test_max_points_user');
   $view_test_points = elgg_get_sticky_value('setup_group_activitypoints','view_test_points');
   $unlimited_view_test_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_test_max_points_user');
   $view_test_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_test_max_points_user');
   $add_test_answer_points = elgg_get_sticky_value('setup_group_activitypoints','add_test_answer_points');
   $unlimited_add_test_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_test_answer_max_points_user');
   $add_test_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_test_answer_max_points_user');
   ///
   $add_form_points = elgg_get_sticky_value('setup_group_activitypoints','add_form_points');
   $unlimited_add_form_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_form_max_points_user');
   $add_form_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_form_max_points_user');
   $view_form_points = elgg_get_sticky_value('setup_group_activitypoints','view_form_points');
   $unlimited_view_form_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_form_max_points_user');
   $view_form_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_form_max_points_user');
   $add_form_answer_points = elgg_get_sticky_value('setup_group_activitypoints','add_form_answer_points');
   $unlimited_add_form_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_form_answer_max_points_user');
   $add_form_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_form_answer_max_points_user');
   ///
   $add_question_points = elgg_get_sticky_value('setup_group_activitypoints','add_question_points');
   $unlimited_add_question_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_question_max_points_user');
   $add_question_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_question_max_points_user');
   $view_question_points = elgg_get_sticky_value('setup_group_activitypoints','view_question_points');
   $unlimited_view_question_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_question_max_points_user');
   $view_question_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_question_max_points_user');
   $add_blog_post_points = elgg_get_sticky_value('setup_group_activitypoints','add_blog_post_points');
   $add_answer_points = elgg_get_sticky_value('setup_group_activitypoints','add_answer_points');
   $unlimited_add_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_answer_max_points_user');
   $add_answer_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_answer_max_points_user');
   $unlimited_add_blog_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_blog_post_max_points_user');
   $add_blog_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_blog_post_max_points_user');
   $view_blog_post_points = elgg_get_sticky_value('setup_group_activitypoints','view_blog_post_points');
   $unlimited_view_blog_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_blog_post_max_points_user');
   $view_blog_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_blog_post_max_points_user');
   $add_page_top_points = elgg_get_sticky_value('setup_group_activitypoints','add_page_top_points');
   $unlimited_add_page_top_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_page_top_max_points_user');
   $add_page_top_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_page_top_max_points_user');
   $view_page_top_points = elgg_get_sticky_value('setup_group_activitypoints','view_page_top_points');
   $unlimited_view_page_top_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_page_top_max_points_user');
   $view_page_top_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_page_top_max_points_user');
   $add_page_points = elgg_get_sticky_value('setup_group_activitypoints','add_page_points');
   $unlimited_add_page_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_page_max_points_user');
   $add_page_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_page_max_points_user');
   $add_bookmark_points = elgg_get_sticky_value('setup_group_activitypoints','add_bookmark_points');
   $unlimited_add_bookmark_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_bookmark_max_points_user');
   $add_bookmark_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_bookmark_max_points_user');
   $view_bookmark_points = elgg_get_sticky_value('setup_group_activitypoints','view_bookmark_points');
   $unlimited_view_bookmark_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_bookmark_max_points_user');
   $view_bookmark_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_bookmark_max_points_user');
   $add_file_points = elgg_get_sticky_value('setup_group_activitypoints','add_file_points');
   $unlimited_add_file_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_file_max_points_user');
   $add_file_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_file_max_points_user');
   $view_file_points = elgg_get_sticky_value('setup_group_activitypoints','view_file_points');
   $unlimited_view_file_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_file_max_points_user');
   $view_file_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_file_max_points_user');
   $add_forum_points = elgg_get_sticky_value('setup_group_activitypoints','add_forum_points');
   $unlimited_add_forum_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_forum_max_points_user');
   $add_forum_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_forum_max_points_user');
   $view_forum_points = elgg_get_sticky_value('setup_group_activitypoints','view_forum_points');
   $unlimited_view_forum_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_view_forum_max_points_user');
   $view_forum_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','view_forum_max_points_user');
   $add_forum_post_points = elgg_get_sticky_value('setup_group_activitypoints','add_forum_post_points');
   $receive_forum_post_points = elgg_get_sticky_value('setup_group_activitypoints','receive_forum_post_points');
   $receive_forum_post_teacher_points = elgg_get_sticky_value('setup_group_activitypoints','receive_forum_post_teacher_points');
   $unlimited_add_forum_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_forum_post_max_points_user'); 
   $add_forum_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_forum_post_max_points_user');
   $unlimited_receive_forum_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_receive_forum_post_max_points_user'); 
   $receive_forum_post_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','receive_forum_post_max_points_user');
   $unlimited_receive_forum_post_teacher_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_receive_forum_post_teacher_max_points_user'); 
   $receive_forum_post_teacher_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','receive_forum_post_teacher_max_points_user');
   $unlimited_max_forum_posts_user_object = elgg_get_sticky_value('setup_group_activitypoints','unlimited_max_forum_posts_user_object'); 
   $max_forum_posts_user_object = elgg_get_sticky_value('setup_group_activitypoints','max_forum_posts_user_object');
   $add_comment_points = elgg_get_sticky_value('setup_group_activitypoints','add_comment_points');
   $receive_comment_points = elgg_get_sticky_value('setup_group_activitypoints','receive_comment_points');
   $receive_comment_teacher_points = elgg_get_sticky_value('setup_group_activitypoints','receive_comment_teacher_points');
   $unlimited_add_comment_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_comment_max_points_user'); 
   $add_comment_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_comment_max_points_user');
   $unlimited_receive_comment_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_receive_comment_max_points_user'); 
   $receive_comment_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','receive_comment_max_points_user');
   $unlimited_receive_comment_teacher_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_receive_comment_teacher_max_points_user'); 
   $receive_comment_teacher_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','receive_comment_teacher_max_points_user');
   $unlimited_max_comments_user_object = elgg_get_sticky_value('setup_group_activitypoints','unlimited_max_comments_user_object'); 
   $max_comments_user_object = elgg_get_sticky_value('setup_group_activitypoints','max_comments_user_object');
   $add_like_points = elgg_get_sticky_value('setup_group_activitypoints','add_like_points');
   $receive_like_points = elgg_get_sticky_value('setup_group_activitypoints','receive_like_points');
   $receive_like_teacher_points = elgg_get_sticky_value('setup_group_activitypoints','receive_like_teacher_points');
   $unlimited_add_like_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_add_like_max_points_user'); 
   $add_like_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','add_like_max_points_user');
   $unlimited_receive_like_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_receive_like_max_points_user'); 
   $receive_like_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','receive_like_max_points_user');
   $unlimited_receive_like_teacher_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','unlimited_receive_like_teacher_max_points_user'); 
   $receive_like_teacher_max_points_user = elgg_get_sticky_value('setup_group_activitypoints','receive_like_teacher_max_points_user');
}

elgg_clear_sticky_form('setup_group_activitypoints');

if ($unlimited_add_task_max_points_user){
   $selected_unlimited_add_task_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_task_max_points_user = "display:none";
} else {
   $selected_unlimited_add_task_max_points_user = "";
   $style_display_unlimited_add_task_max_points_user = "display:block";
}

if ($unlimited_view_task_max_points_user){
   $selected_unlimited_view_task_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_task_max_points_user = "display:none";
} else {
   $selected_unlimited_view_task_max_points_user = "";
   $style_display_unlimited_view_task_max_points_user = "display:block";
}

if ($unlimited_add_task_answer_max_points_user){
   $selected_unlimited_add_task_answer_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_task_answer_max_points_user = "display:none";
} else {
   $selected_unlimited_add_task_answer_max_points_user = "";
   $style_display_unlimited_add_task_answer_max_points_user = "display:block";
}

///
if ($unlimited_add_test_max_points_user){
   $selected_unlimited_add_test_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_test_max_points_user = "display:none";
} else {
   $selected_unlimited_add_test_max_points_user = "";
   $style_display_unlimited_add_test_max_points_user = "display:block";
}

if ($unlimited_view_test_max_points_user){
   $selected_unlimited_view_test_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_test_max_points_user = "display:none";
} else {
   $selected_unlimited_view_test_max_points_user = "";
   $style_display_unlimited_view_test_max_points_user = "display:block";
}

if ($unlimited_add_test_answer_max_points_user){
   $selected_unlimited_add_test_answer_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_test_answer_max_points_user = "display:none";
} else {
   $selected_unlimited_add_test_answer_max_points_user = "";
   $style_display_unlimited_add_test_answer_max_points_user = "display:block";
}

///
if ($unlimited_add_form_max_points_user){
   $selected_unlimited_add_form_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_form_max_points_user = "display:none";
} else {
   $selected_unlimited_add_form_max_points_user = "";
   $style_display_unlimited_add_form_max_points_user = "display:block";
}

if ($unlimited_view_form_max_points_user){
   $selected_unlimited_view_form_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_form_max_points_user = "display:none";
} else {
   $selected_unlimited_view_form_max_points_user = "";
   $style_display_unlimited_view_form_max_points_user = "display:block";
}

if ($unlimited_add_form_answer_max_points_user){
   $selected_unlimited_add_form_answer_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_form_answer_max_points_user = "display:none";
} else {
   $selected_unlimited_add_form_answer_max_points_user = "";
   $style_display_unlimited_add_form_answer_max_points_user = "display:block";
}
///

if ($unlimited_add_question_max_points_user){
   $selected_unlimited_add_question_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_question_max_points_user = "display:none";
} else {
   $selected_unlimited_add_question_max_points_user = "";
   $style_display_unlimited_add_question_max_points_user = "display:block";
}

if ($unlimited_view_question_max_points_user){
   $selected_unlimited_view_question_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_question_max_points_user = "display:none";
} else {
   $selected_unlimited_view_question_max_points_user = "";
   $style_display_unlimited_view_question_max_points_user = "display:block";
}

if ($unlimited_add_answer_max_points_user){
   $selected_unlimited_add_answer_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_answer_max_points_user = "display:none";
} else {
   $selected_unlimited_add_answer_max_points_user = "";
   $style_display_unlimited_add_answer_max_points_user = "display:block";
}

if ($unlimited_add_blog_post_max_points_user){
   $selected_unlimited_add_blog_post_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_blog_post_max_points_user = "display:none";
} else {
   $selected_unlimited_add_blog_post_max_points_user = "";
   $style_display_unlimited_add_blog_post_max_points_user = "display:block";
}

if ($unlimited_view_blog_post_max_points_user){
   $selected_unlimited_view_blog_post_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_blog_post_max_points_user = "display:none";
} else {
   $selected_unlimited_view_blog_post_max_points_user = "";
   $style_display_unlimited_view_blog_post_max_points_user = "display:block";
}

if ($unlimited_add_page_top_max_points_user){
   $selected_unlimited_add_page_top_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_page_top_max_points_user = "display:none";
} else {
   $selected_unlimited_add_page_top_max_points_user = "";
   $style_display_unlimited_add_page_top_max_points_user = "display:block";
}

if ($unlimited_view_page_top_max_points_user){
   $selected_unlimited_view_page_top_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_page_top_max_points_user = "display:none";
} else {
   $selected_unlimited_view_page_top_max_points_user = "";
   $style_display_unlimited_view_page_top_max_points_user = "display:block";
}

if ($unlimited_add_page_max_points_user){
   $selected_unlimited_add_page_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_page_max_points_user = "display:none";
} else {
   $selected_unlimited_add_page_max_points_user = "";
   $style_display_unlimited_add_page_max_points_user = "display:block";
}

if ($unlimited_add_bookmark_max_points_user){
   $selected_unlimited_add_bookmark_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_bookmark_max_points_user = "display:none";
} else {
   $selected_unlimited_add_bookmark_max_points_user = "";
   $style_display_unlimited_add_bookmark_max_points_user = "display:block";
}

if ($unlimited_view_bookmark_max_points_user){
   $selected_unlimited_view_bookmark_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_bookmark_max_points_user = "display:none";
} else {
   $selected_unlimited_view_bookmark_max_points_user = "";
   $style_display_unlimited_view_bookmark_max_points_user = "display:block";
}

if ($unlimited_add_file_max_points_user){
   $selected_unlimited_add_file_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_file_max_points_user = "display:none";
} else {
   $selected_unlimited_add_file_max_points_user = "";
   $style_display_unlimited_add_file_max_points_user = "display:block";
}

if ($unlimited_view_file_max_points_user){
   $selected_unlimited_view_file_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_file_max_points_user = "display:none";
} else {
   $selected_unlimited_view_file_max_points_user = "";
   $style_display_unlimited_view_file_max_points_user = "display:block";
}

if ($unlimited_add_forum_max_points_user){
   $selected_unlimited_add_forum_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_forum_max_points_user = "display:none";
} else {
   $selected_unlimited_add_forum_max_points_user = "";
   $style_display_unlimited_add_forum_max_points_user = "display:block";
}

if ($unlimited_view_forum_max_points_user){
   $selected_unlimited_view_forum_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_view_forum_max_points_user = "display:none";
} else {
   $selected_unlimited_view_forum_max_points_user = "";
   $style_display_unlimited_view_forum_max_points_user = "display:block";
}

if ($unlimited_add_forum_post_max_points_user){
   $selected_unlimited_add_forum_post_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_forum_post_max_points_user = "display:none";
} else {
   $selected_unlimited_add_forum_post_max_points_user = "";
   $style_display_unlimited_add_forum_post_max_points_user = "display:block";
}

if ($unlimited_receive_forum_post_max_points_user){
   $selected_unlimited_receive_forum_post_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_receive_forum_post_max_points_user = "display:none";
} else {
   $selected_unlimited_receive_forum_post_max_points_user = "";
   $style_display_unlimited_receive_forum_post_max_points_user = "display:block";
}

if ($unlimited_receive_forum_post_teacher_max_points_user){
   $selected_unlimited_receive_forum_post_teacher_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_receive_forum_post_teacher_max_points_user = "display:none";
} else {
   $selected_unlimited_receive_forum_post_teacher_max_points_user = "";
   $style_display_unlimited_receive_forum_post_teacher_max_points_user = "display:block";
}

if ($unlimited_max_forum_posts_user_object){
   $selected_unlimited_max_forum_posts_user_object = "checked = \"checked\"";
   $style_display_unlimited_max_forum_posts_user_object = "display:none";
} else {
   $selected_unlimited_max_forum_posts_user_object = "";
   $style_display_unlimited_max_forum_posts_user_object = "display:block";
}

if ($unlimited_add_comment_max_points_user){
   $selected_unlimited_add_comment_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_comment_max_points_user = "display:none";
} else {
   $selected_unlimited_add_comment_max_points_user = "";
   $style_display_unlimited_add_comment_max_points_user = "display:block";
}

if ($unlimited_receive_comment_max_points_user){
   $selected_unlimited_receive_comment_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_receive_comment_max_points_user = "display:none";
} else {
   $selected_unlimited_receive_comment_max_points_user = "";
   $style_display_unlimited_receive_comment_max_points_user = "display:block";
}

if ($unlimited_receive_comment_teacher_max_points_user){
   $selected_unlimited_receive_comment_teacher_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_receive_comment_teacher_max_points_user = "display:none";
} else {
   $selected_unlimited_receive_comment_teacher_max_points_user = "";
   $style_display_unlimited_receive_comment_teacher_max_points_user = "display:block";
}

if ($unlimited_max_comments_user_object){
   $selected_unlimited_max_comments_user_object = "checked = \"checked\"";
   $style_display_unlimited_max_comments_user_object = "display:none";
} else {
   $selected_unlimited_max_comments_user_object = "";
   $style_display_unlimited_max_comments_user_object = "display:block";
}

if ($unlimited_add_like_max_points_user){
   $selected_unlimited_add_like_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_add_like_max_points_user = "display:none";
} else {
   $selected_unlimited_add_like_max_points_user = "";
   $style_display_unlimited_add_like_max_points_user = "display:block";
}

if ($unlimited_receive_like_max_points_user){
   $selected_unlimited_receive_like_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_receive_like_max_points_user = "display:none";
} else {
   $selected_unlimited_receive_like_max_points_user = "";
   $style_display_unlimited_receive_like_max_points_user = "display:block";
}

if ($unlimited_receive_like_teacher_max_points_user){
   $selected_unlimited_receive_like_teacher_max_points_user = "checked = \"checked\"";
   $style_display_unlimited_receive_like_teacher_max_points_user = "display:none";
} else {
   $selected_unlimited_receive_like_teacher_max_points_user = "";
   $style_display_unlimited_receive_like_teacher_max_points_user = "display:block";
}

$conf_tasks = elgg_echo("activitypoints:conf_tasks");
$conf_task_answers = elgg_echo("activitypoints:conf_task_answers");
///
$conf_tests = elgg_echo("activitypoints:conf_tests");
$conf_test_answers = elgg_echo("activitypoints:conf_test_answers");
///
$conf_forms = elgg_echo("activitypoints:conf_forms");
$conf_form_answers = elgg_echo("activitypoints:conf_form_answers");
///
$conf_questions = elgg_echo("activitypoints:conf_questions");
$conf_answers = elgg_echo("activitypoints:conf_answers");
$conf_blogs = elgg_echo("activitypoints:conf_blogs");
$conf_pages = elgg_echo("activitypoints:conf_pages");
$conf_bookmarks = elgg_echo("activitypoints:conf_bookmarks");
$conf_files = elgg_echo("activitypoints:conf_files");
$conf_forums = elgg_echo("activitypoints:conf_forums");
$conf_forum_posts = elgg_echo("activitypoints:conf_forum_posts");
$conf_comments = elgg_echo("activitypoints:conf_comments");
$conf_likes = elgg_echo("activitypoints:conf_likes");

$add_task_points_label = elgg_echo("activitypoints:add_task_points_label");
$unlimited_add_task_max_points_user_label = elgg_echo("activitypoints:unlimited_add_task_max_points_user_label"); 
$add_task_max_points_user_label = elgg_echo("activitypoints:add_task_max_points_user_label"); 
$view_task_points_label = elgg_echo("activitypoints:view_task_points_label");
$unlimited_view_task_max_points_user_label = elgg_echo("activitypoints:unlimited_view_task_max_points_user_label"); 
$view_task_max_points_user_label = elgg_echo("activitypoints:view_task_max_points_user_label"); 
$add_task_answer_points_label = elgg_echo("activitypoints:add_task_answer_points_label");
$unlimited_add_task_answer_max_points_user_label = elgg_echo("activitypoints:unlimited_add_task_answer_max_points_user_label"); 
$add_task_answer_max_points_user_label = elgg_echo("activitypoints:add_task_answer_max_points_user_label");
///
$add_test_points_label = elgg_echo("activitypoints:add_test_points_label");
$unlimited_add_test_max_points_user_label = elgg_echo("activitypoints:unlimited_add_test_max_points_user_label"); 
$add_test_max_points_user_label = elgg_echo("activitypoints:add_test_max_points_user_label"); 
$view_test_points_label = elgg_echo("activitypoints:view_test_points_label");
$unlimited_view_test_max_points_user_label = elgg_echo("activitypoints:unlimited_view_test_max_points_user_label"); 
$view_test_max_points_user_label = elgg_echo("activitypoints:view_test_max_points_user_label"); 
$add_test_answer_points_label = elgg_echo("activitypoints:add_test_answer_points_label");
$unlimited_add_test_answer_max_points_user_label = elgg_echo("activitypoints:unlimited_add_test_answer_max_points_user_label"); 
$add_test_answer_max_points_user_label = elgg_echo("activitypoints:add_test_answer_max_points_user_label");
///
$add_form_points_label = elgg_echo("activitypoints:add_form_points_label");
$unlimited_add_form_max_points_user_label = elgg_echo("activitypoints:unlimited_add_form_max_points_user_label"); 
$add_form_max_points_user_label = elgg_echo("activitypoints:add_form_max_points_user_label"); 
$view_form_points_label = elgg_echo("activitypoints:view_form_points_label");
$unlimited_view_form_max_points_user_label = elgg_echo("activitypoints:unlimited_view_form_max_points_user_label"); 
$view_form_max_points_user_label = elgg_echo("activitypoints:view_form_max_points_user_label"); 
$add_form_answer_points_label = elgg_echo("activitypoints:add_form_answer_points_label");
$unlimited_add_form_answer_max_points_user_label = elgg_echo("activitypoints:unlimited_add_form_answer_max_points_user_label"); 
$add_form_answer_max_points_user_label = elgg_echo("activitypoints:add_form_answer_max_points_user_label");
///
$add_question_points_label = elgg_echo("activitypoints:add_question_points_label");
$unlimited_add_question_max_points_user_label = elgg_echo("activitypoints:unlimited_add_question_max_points_user_label"); 
$add_question_max_points_user_label = elgg_echo("activitypoints:add_question_max_points_user_label"); 
$view_question_points_label = elgg_echo("activitypoints:view_question_points_label");
$unlimited_view_question_max_points_user_label = elgg_echo("activitypoints:unlimited_view_question_max_points_user_label"); 
$view_question_max_points_user_label = elgg_echo("activitypoints:view_question_max_points_user_label"); 
$add_answer_points_label = elgg_echo("activitypoints:add_answer_points_label");
$unlimited_add_answer_max_points_user_label = elgg_echo("activitypoints:unlimited_add_answer_max_points_user_label"); 
$add_answer_max_points_user_label = elgg_echo("activitypoints:add_answer_max_points_user_label"); 
$add_blog_post_points_label = elgg_echo("activitypoints:add_blog_post_points_label");
$unlimited_add_blog_post_max_points_user_label = elgg_echo("activitypoints:unlimited_add_blog_post_max_points_user_label"); 
$add_blog_post_max_points_user_label = elgg_echo("activitypoints:add_blog_post_max_points_user_label");
$view_blog_post_points_label = elgg_echo("activitypoints:view_blog_post_points_label");
$unlimited_view_blog_post_max_points_user_label = elgg_echo("activitypoints:unlimited_view_blog_post_max_points_user_label"); 
$view_blog_post_max_points_user_label = elgg_echo("activitypoints:view_blog_post_max_points_user_label"); 
$add_page_top_points_label = elgg_echo("activitypoints:add_page_top_points_label");
$unlimited_add_page_top_max_points_user_label = elgg_echo("activitypoints:unlimited_add_page_top_max_points_user_label"); 
$add_page_top_max_points_user_label = elgg_echo("activitypoints:add_page_top_max_points_user_label");
$view_page_top_points_label = elgg_echo("activitypoints:view_page_top_points_label");
$unlimited_view_page_top_max_points_user_label = elgg_echo("activitypoints:unlimited_view_page_top_max_points_user_label"); 
$view_page_top_max_points_user_label = elgg_echo("activitypoints:view_page_top_max_points_user_label"); 
$add_page_points_label = elgg_echo("activitypoints:add_page_points_label");
$unlimited_add_page_max_points_user_label = elgg_echo("activitypoints:unlimited_add_page_max_points_user_label"); 
$add_page_max_points_user_label = elgg_echo("activitypoints:add_page_max_points_user_label"); 
$add_bookmark_points_label = elgg_echo("activitypoints:add_bookmark_points_label");
$unlimited_add_bookmark_max_points_user_label = elgg_echo("activitypoints:unlimited_add_bookmark_max_points_user_label"); 
$add_bookmark_max_points_user_label = elgg_echo("activitypoints:add_bookmark_max_points_user_label");
$view_bookmark_points_label = elgg_echo("activitypoints:view_bookmark_points_label");
$unlimited_view_bookmark_max_points_user_label = elgg_echo("activitypoints:unlimited_view_bookmark_max_points_user_label"); 
$view_bookmark_max_points_user_label = elgg_echo("activitypoints:view_bookmark_max_points_user_label"); 
$add_file_points_label = elgg_echo("activitypoints:add_file_points_label");
$unlimited_add_file_max_points_user_label = elgg_echo("activitypoints:unlimited_add_file_max_points_user_label"); 
$add_file_max_points_user_label = elgg_echo("activitypoints:add_file_max_points_user_label"); 
$view_file_points_label = elgg_echo("activitypoints:view_file_points_label");
$unlimited_view_file_max_points_user_label = elgg_echo("activitypoints:unlimited_view_file_max_points_user_label"); 
$view_file_max_points_user_label = elgg_echo("activitypoints:view_file_max_points_user_label"); 
$add_forum_points_label = elgg_echo("activitypoints:add_forum_points_label");
$unlimited_add_forum_max_points_user_label = elgg_echo("activitypoints:unlimited_add_forum_max_points_user_label"); 
$add_forum_max_points_user_label = elgg_echo("activitypoints:add_forum_max_points_user_label");
$view_forum_points_label = elgg_echo("activitypoints:view_forum_points_label");
$unlimited_view_forum_max_points_user_label = elgg_echo("activitypoints:unlimited_view_forum_max_points_user_label"); 
$view_forum_max_points_user_label = elgg_echo("activitypoints:view_forum_max_points_user_label"); 
$add_forum_post_points_label = elgg_echo("activitypoints:add_forum_post_points_label");
$receive_forum_post_points_label = elgg_echo("activitypoints:receive_forum_post_points_label");
$receive_forum_post_teacher_points_label = elgg_echo("activitypoints:receive_forum_post_teacher_points_label");
$unlimited_add_forum_post_max_points_user_label = elgg_echo("activitypoints:unlimited_add_forum_post_max_points_user_label"); 
$add_forum_post_max_points_user_label = elgg_echo("activitypoints:add_forum_post_max_points_user_label"); 
$unlimited_receive_forum_post_max_points_user_label = elgg_echo("activitypoints:unlimited_receive_forum_post_max_points_user_label"); 
$receive_forum_post_max_points_user_label = elgg_echo("activitypoints:receive_forum_post_max_points_user_label"); 
$unlimited_receive_forum_post_teacher_max_points_user_label = elgg_echo("activitypoints:unlimited_receive_forum_post_teacher_max_points_user_label"); 
$receive_forum_post_teacher_max_points_user_label = elgg_echo("activitypoints:receive_forum_post_teacher_max_points_user_label"); 
$unlimited_max_forum_posts_user_object_label = elgg_echo("activitypoints:unlimited_max_forum_posts_user_object_label"); 
$max_forum_posts_user_object_label = elgg_echo("activitypoints:max_forum_posts_user_object_label");
$add_comment_points_label = elgg_echo("activitypoints:add_comment_points_label");
$receive_comment_points_label = elgg_echo("activitypoints:receive_comment_points_label");
$receive_comment_teacher_points_label = elgg_echo("activitypoints:receive_comment_teacher_points_label");
$unlimited_add_comment_max_points_user_label = elgg_echo("activitypoints:unlimited_add_comment_max_points_user_label"); 
$add_comment_max_points_user_label = elgg_echo("activitypoints:add_comment_max_points_user_label"); 
$unlimited_receive_comment_max_points_user_label = elgg_echo("activitypoints:unlimited_receive_comment_max_points_user_label"); 
$receive_comment_max_points_user_label = elgg_echo("activitypoints:receive_comment_max_points_user_label"); 
$unlimited_receive_comment_teacher_max_points_user_label = elgg_echo("activitypoints:unlimited_receive_comment_teacher_max_points_user_label"); 
$receive_comment_teacher_max_points_user_label = elgg_echo("activitypoints:receive_comment_teacher_max_points_user_label"); 
$unlimited_max_comments_user_object_label = elgg_echo("activitypoints:unlimited_max_comments_user_object_label"); 
$max_comments_user_object_label = elgg_echo("activitypoints:max_comments_user_object_label");
$add_like_points_label = elgg_echo("activitypoints:add_like_points_label");
$receive_like_points_label = elgg_echo("activitypoints:receive_like_points_label");
$receive_like_teacher_points_label = elgg_echo("activitypoints:receive_like_teacher_points_label");
$unlimited_add_like_max_points_user_label = elgg_echo("activitypoints:unlimited_add_like_max_points_user_label"); 
$add_like_max_points_user_label = elgg_echo("activitypoints:add_like_max_points_user_label"); 
$unlimited_receive_like_max_points_user_label = elgg_echo("activitypoints:unlimited_receive_like_max_points_user_label"); 
$receive_like_max_points_user_label = elgg_echo("activitypoints:receive_like_max_points_user_label"); 
$unlimited_receive_like_teacher_max_points_user_label = elgg_echo("activitypoints:unlimited_receive_like_teacher_max_points_user_label"); 
$receive_like_teacher_max_points_user_label = elgg_echo("activitypoints:receive_like_teacher_max_points_user_label"); 

?>
<form action="<?php echo elgg_get_site_url()."action/".$action?>" name="setup_group_activitypoints" enctype="multipart/form-data" method="post">

<?php echo elgg_view('input/securitytoken');
?>

<p><a onclick="activitypoints_show_task();" style="cursor:hand;"><?php echo $conf_tasks; ?></a></p>     
<div id="resultsDiv_task" style="display:none;">     
<p>
<b><?php echo $add_task_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_task_points\" value = $add_task_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_task_max_points_user\" onChange=\"activitypoints_show_add_task_max_points_user()\" $selected_unlimited_add_task_max_points_user> $unlimited_add_task_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_task_max_points_user" style="<?php echo $style_display_unlimited_add_task_max_points_user;?>;">
<p>
<b><?php echo $add_task_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_task_max_points_user\" value = $add_task_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_task_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_task_points\" value = $view_task_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_task_max_points_user\" onChange=\"activitypoints_show_view_task_max_points_user()\" $selected_unlimited_view_task_max_points_user> $unlimited_view_task_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_task_max_points_user" style="<?php echo $style_display_unlimited_view_task_max_points_user;?>;">
<p>
<b><?php echo $view_task_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_task_max_points_user\" value = $view_task_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<!--Test-->
<p><a onclick="activitypoints_show_test();" style="cursor:hand;"><?php echo $conf_tests; ?></a></p>     
<div id="resultsDiv_test" style="display:none;">     
<p>
<b><?php echo $add_test_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_test_points\" value = $add_test_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_test_max_points_user\" onChange=\"activitypoints_show_add_test_max_points_user()\" $selected_unlimited_add_test_max_points_user> $unlimited_add_test_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_test_max_points_user" style="<?php echo $style_display_unlimited_add_test_max_points_user;?>;">
<p>
<b><?php echo $add_test_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_test_max_points_user\" value = $add_test_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_test_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_test_points\" value = $view_test_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_test_max_points_user\" onChange=\"activitypoints_show_view_test_max_points_user()\" $selected_unlimited_view_test_max_points_user> $unlimited_view_test_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_test_max_points_user" style="<?php echo $style_display_unlimited_view_test_max_points_user;?>;">
<p>
<b><?php echo $view_test_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_test_max_points_user\" value = $view_test_max_points_user>"; ?>
</p>
<br>
</div>
</div>
<!--Form-->
<p><a onclick="activitypoints_show_form();" style="cursor:hand;"><?php echo $conf_forms; ?></a></p>     
<div id="resultsDiv_form" style="display:none;">     
<p>
<b><?php echo $add_form_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_form_points\" value = $add_form_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_form_max_points_user\" onChange=\"activitypoints_show_add_form_max_points_user()\" $selected_unlimited_add_form_max_points_user> $unlimited_add_form_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_form_max_points_user" style="<?php echo $style_display_unlimited_add_form_max_points_user;?>;">
<p>
<b><?php echo $add_form_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_form_max_points_user\" value = $add_form_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_form_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_form_points\" value = $view_form_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_form_max_points_user\" onChange=\"activitypoints_show_view_form_max_points_user()\" $selected_unlimited_view_form_max_points_user> $unlimited_view_form_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_form_max_points_user" style="<?php echo $style_display_unlimited_view_form_max_points_user;?>;">
<p>
<b><?php echo $view_form_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_form_max_points_user\" value = $view_form_max_points_user>"; ?>
</p>
<br>
</div>
</div>
<!---->

<p><a onclick="activitypoints_show_task_answer();" style="cursor:hand;"><?php echo $conf_task_answers; ?></a></p>     
<div id="resultsDiv_task_answer" style="display:none;">     
<p>
<b><?php echo $add_task_answer_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_task_answer_points\" value = $add_task_answer_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_task_answer_max_points_user\" onChange=\"activitypoints_show_add_task_answer_max_points_user()\" $selected_unlimited_add_task_answer_max_points_user> $unlimited_add_task_answer_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_task_answer_max_points_user" style="<?php echo $style_display_unlimited_add_task_answer_max_points_user;?>;">
<p>
<b><?php echo $add_task_answer_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_task_answer_max_points_user\" value = $add_task_answer_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<!--Test answer-->
<p><a onclick="activitypoints_show_test_answer();" style="cursor:hand;"><?php echo $conf_test_answers; ?></a></p>     
<div id="resultsDiv_test_answer" style="display:none;">     
<p>
<b><?php echo $add_test_answer_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_test_answer_points\" value = $add_test_answer_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_test_answer_max_points_user\" onChange=\"activitypoints_show_add_test_answer_max_points_user()\" $selected_unlimited_add_test_answer_max_points_user> $unlimited_add_test_answer_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_test_answer_max_points_user" style="<?php echo $style_display_unlimited_add_test_answer_max_points_user;?>;">
<p>
<b><?php echo $add_test_answer_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_test_answer_max_points_user\" value = $add_test_answer_max_points_user>"; ?>
</p>
<br>
</div>
</div>
<!--Form answer-->
<p><a onclick="activitypoints_show_form_answer();" style="cursor:hand;"><?php echo $conf_form_answers; ?></a></p>     
<div id="resultsDiv_form_answer" style="display:none;">     
<p>
<b><?php echo $add_form_answer_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_form_answer_points\" value = $add_form_answer_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_form_answer_max_points_user\" onChange=\"activitypoints_show_add_form_answer_max_points_user()\" $selected_unlimited_add_form_answer_max_points_user> $unlimited_add_form_answer_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_form_answer_max_points_user" style="<?php echo $style_display_unlimited_add_form_answer_max_points_user;?>;">
<p>
<b><?php echo $add_form_answer_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_form_answer_max_points_user\" value = $add_form_answer_max_points_user>"; ?>
</p>
<br>
</div>
</div>
<!---->

<p><a onclick="activitypoints_show_question();" style="cursor:hand;"><?php echo $conf_questions; ?></a></p>     
<div id="resultsDiv_question" style="display:none;">     
<p>
<b><?php echo $add_question_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_question_points\" value = $add_question_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_question_max_points_user\" onChange=\"activitypoints_show_add_question_max_points_user()\" $selected_unlimited_add_question_max_points_user> $unlimited_add_question_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_question_max_points_user" style="<?php echo $style_display_unlimited_add_question_max_points_user;?>;">
<p>
<b><?php echo $add_question_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_question_max_points_user\" value = $add_question_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_question_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_question_points\" value = $view_question_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_question_max_points_user\" onChange=\"activitypoints_show_view_question_max_points_user()\" $selected_unlimited_view_question_max_points_user> $unlimited_view_question_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_question_max_points_user" style="<?php echo $style_display_unlimited_view_question_max_points_user;?>;">
<p>
<b><?php echo $view_question_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_question_max_points_user\" value = $view_question_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_answer();" style="cursor:hand;"><?php echo $conf_answers; ?></a></p>     
<div id="resultsDiv_answer" style="display:none;">     
<p>
<b><?php echo $add_answer_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_answer_points\" value = $add_answer_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_answer_max_points_user\" onChange=\"activitypoints_show_add_answer_max_points_user()\" $selected_unlimited_add_answer_max_points_user> $unlimited_add_answer_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_answer_max_points_user" style="<?php echo $style_display_unlimited_add_answer_max_points_user;?>;">
<p>
<b><?php echo $add_answer_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_answer_max_points_user\" value = $add_answer_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_blog_post();" style="cursor:hand;"><?php echo $conf_blogs; ?></a></p>     
<div id="resultsDiv_blog_post" style="display:none;">     
<p>
<b><?php echo $add_blog_post_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_blog_post_points\" value = $add_blog_post_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_blog_post_max_points_user\" onChange=\"activitypoints_show_add_blog_post_max_points_user()\" $selected_unlimited_add_blog_post_max_points_user> $unlimited_add_blog_post_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_blog_post_max_points_user" style="<?php echo $style_display_unlimited_add_blog_post_max_points_user;?>;">
<p>
<b><?php echo $add_blog_post_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_blog_post_max_points_user\" value = $add_blog_post_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_blog_post_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_blog_post_points\" value = $view_blog_post_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_blog_post_max_points_user\" onChange=\"activitypoints_show_view_blog_post_max_points_user()\" $selected_unlimited_view_blog_post_max_points_user> $unlimited_view_blog_post_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_blog_post_max_points_user" style="<?php echo $style_display_unlimited_view_blog_post_max_points_user;?>;">
<p>
<b><?php echo $view_blog_post_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_blog_post_max_points_user\" value = $view_blog_post_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_page();" style="cursor:hand;"><?php echo $conf_pages; ?></a></p>     
<div id="resultsDiv_page" style="display:none;">     
<p>
<b><?php echo $add_page_top_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_page_top_points\" value = $add_page_top_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_page_top_max_points_user\" onChange=\"activitypoints_show_add_page_top_max_points_user()\" $selected_unlimited_add_page_top_max_points_user> $unlimited_add_page_top_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_page_top_max_points_user" style="<?php echo $style_display_unlimited_add_page_top_max_points_user;?>;">
<p>
<b><?php echo $add_page_top_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_page_top_max_points_user\" value = $add_page_top_max_points_user>"; ?>
</p>
</div>
<br>
<p>
<b><?php echo $view_page_top_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_page_top_points\" value = $view_page_top_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_page_top_max_points_user\" onChange=\"activitypoints_show_view_page_top_max_points_user()\" $selected_unlimited_view_page_top_max_points_user> $unlimited_view_page_top_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_page_top_max_points_user" style="<?php echo $style_display_unlimited_view_page_top_max_points_user;?>;">
<p>
<b><?php echo $view_page_top_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_page_top_max_points_user\" value = $view_page_top_max_points_user>"; ?>
</p>
</div>
<br>
<p>
<b><?php echo $add_page_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_page_points\" value = $add_page_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_page_max_points_user\" onChange=\"activitypoints_show_add_page_max_points_user()\" $selected_unlimited_add_page_max_points_user> $unlimited_add_page_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_page_max_points_user" style="<?php echo $style_display_unlimited_add_page_max_points_user;?>;">
<p>
<b><?php echo $add_page_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_page_max_points_user\" value = $add_page_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_bookmark();" style="cursor:hand;"><?php echo $conf_bookmarks; ?></a></p>     
<div id="resultsDiv_bookmark" style="display:none;">     
<p>
<b><?php echo $add_bookmark_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_bookmark_points\" value = $add_bookmark_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_bookmark_max_points_user\" onChange=\"activitypoints_show_add_bookmark_max_points_user()\" $selected_unlimited_add_bookmark_max_points_user> $unlimited_add_bookmark_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_bookmark_max_points_user" style="<?php echo $style_display_unlimited_add_bookmark_max_points_user;?>;">
<p>
<b><?php echo $add_bookmark_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_bookmark_max_points_user\" value = $add_bookmark_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_bookmark_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_bookmark_points\" value = $view_bookmark_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_bookmark_max_points_user\" onChange=\"activitypoints_show_view_bookmark_max_points_user()\" $selected_unlimited_view_bookmark_max_points_user> $unlimited_view_bookmark_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_bookmark_max_points_user" style="<?php echo $style_display_unlimited_view_bookmark_max_points_user;?>;">
<p>
<b><?php echo $view_bookmark_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_bookmark_max_points_user\" value = $view_bookmark_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_file();" style="cursor:hand;"><?php echo $conf_files; ?></a></p>     
<div id="resultsDiv_file" style="display:none;">     
<p>
<b><?php echo $add_file_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_file_points\" value = $add_file_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_file_max_points_user\" onChange=\"activitypoints_show_add_file_max_points_user()\" $selected_unlimited_add_file_max_points_user> $unlimited_add_file_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_file_max_points_user" style="<?php echo $style_display_unlimited_add_file_max_points_user;?>;">
<p>
<b><?php echo $add_file_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_file_max_points_user\" value = $add_file_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_file_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_file_points\" value = $view_file_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_file_max_points_user\" onChange=\"activitypoints_show_view_file_max_points_user()\" $selected_unlimited_view_file_max_points_user> $unlimited_view_file_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_file_max_points_user" style="<?php echo $style_display_unlimited_view_file_max_points_user;?>;">
<p>
<b><?php echo $view_file_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_file_max_points_user\" value = $view_file_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_forum();" style="cursor:hand;"><?php echo $conf_forums; ?></a></p>     
<div id="resultsDiv_forum" style="display:none;">     
<p>
<b><?php echo $add_forum_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_forum_points\" value = $add_forum_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_forum_max_points_user\" onChange=\"activitypoints_show_add_forum_max_points_user()\" $selected_unlimited_add_forum_max_points_user> $unlimited_add_forum_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_forum_max_points_user" style="<?php echo $style_display_unlimited_add_forum_max_points_user;?>;">
<p>
<b><?php echo $add_forum_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_forum_max_points_user\" value = $add_forum_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b><?php echo $view_forum_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_forum_points\" value = $view_forum_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_view_forum_max_points_user\" onChange=\"activitypoints_show_view_forum_max_points_user()\" $selected_unlimited_view_forum_max_points_user> $unlimited_view_forum_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_view_forum_max_points_user" style="<?php echo $style_display_unlimited_view_forum_max_points_user;?>;">
<p>
<b><?php echo $view_forum_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"view_forum_max_points_user\" value = $view_forum_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_forum_post();" style="cursor:hand;"><?php echo $conf_forum_posts; ?></a></p>     
<div id="resultsDiv_forum_post" style="display:none;">     
<p>
<b><?php echo $add_forum_post_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_forum_post_points\" value = $add_forum_post_points>"; ?>
</p>
<br>
<p>
<b><?php echo $receive_forum_post_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_forum_post_points\" value = $receive_forum_post_points>"; ?>
</p>
<br>
<p>
<b><?php echo $receive_forum_post_teacher_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_forum_post_teacher_points\" value = $receive_forum_post_teacher_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_forum_post_max_points_user\" onChange=\"activitypoints_show_add_forum_post_max_points_user()\" $selected_unlimited_add_forum_post_max_points_user> $unlimited_add_forum_post_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_forum_post_max_points_user" style="<?php echo $style_display_unlimited_add_forum_post_max_points_user;?>;">
<p>
<b><?php echo $add_forum_post_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_forum_post_max_points_user\" value = $add_forum_post_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_receive_forum_post_max_points_user\" onChange=\"activitypoints_show_receive_forum_post_max_points_user()\" $selected_unlimited_receive_forum_post_max_points_user> $unlimited_receive_forum_post_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_receive_forum_post_max_points_user" style="<?php echo $style_display_unlimited_receive_forum_post_max_points_user;?>;">
<p>
<b><?php echo $receive_forum_post_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_forum_post_max_points_user\" value = $receive_forum_post_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_receive_forum_post_teacher_max_points_user\" onChange=\"activitypoints_show_receive_forum_post_teacher_max_points_user()\" $selected_unlimited_receive_forum_post_teacher_max_points_user> $unlimited_receive_forum_post_teacher_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_receive_forum_post_teacher_max_points_user" style="<?php echo $style_display_unlimited_receive_forum_post_teacher_max_points_user;?>;">
<p>
<b><?php echo $receive_forum_post_teacher_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_forum_post_teacher_max_points_user\" value = $receive_forum_post_teacher_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_max_forum_posts_user_object\" onChange=\"activitypoints_show_max_forum_posts_user_object()\" $selected_unlimited_max_forum_posts_user_object> $unlimited_max_forum_posts_user_object_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_max_forum_posts_user_object" style="<?php echo $style_display_unlimited_max_forum_posts_user_object;?>;">
<p>
<b><?php echo $max_forum_posts_user_object_label; ?></b>
<?php echo "<input type = \"text\" name = \"max_forum_posts_user_object\" value = $max_forum_posts_user_object>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_comment();" style="cursor:hand;"><?php echo $conf_comments; ?></a></p>     
<div id="resultsDiv_comment" style="display:none;">     
<p>
<b><?php echo $add_comment_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_comment_points\" value = $add_comment_points>"; ?>
</p>
<br>
<p>
<b><?php echo $receive_comment_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_comment_points\" value = $receive_comment_points>"; ?>
</p>
<br>
<p>
<b><?php echo $receive_comment_teacher_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_comment_teacher_points\" value = $receive_comment_teacher_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_comment_max_points_user\" onChange=\"activitypoints_show_add_comment_max_points_user()\" $selected_unlimited_add_comment_max_points_user> $unlimited_add_comment_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_comment_max_points_user" style="<?php echo $style_display_unlimited_add_comment_max_points_user;?>;">
<p>
<b><?php echo $add_comment_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_comment_max_points_user\" value = $add_comment_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_receive_comment_max_points_user\" onChange=\"activitypoints_show_receive_comment_max_points_user()\" $selected_unlimited_receive_comment_max_points_user> $unlimited_receive_comment_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_receive_comment_max_points_user" style="<?php echo $style_display_unlimited_receive_comment_max_points_user;?>;">
<p>
<b><?php echo $receive_comment_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_comment_max_points_user\" value = $receive_comment_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_receive_comment_teacher_max_points_user\" onChange=\"activitypoints_show_receive_comment_teacher_max_points_user()\" $selected_unlimited_receive_comment_teacher_max_points_user> $unlimited_receive_comment_teacher_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_receive_comment_teacher_max_points_user" style="<?php echo $style_display_unlimited_receive_comment_teacher_max_points_user;?>;">
<p>
<b><?php echo $receive_comment_teacher_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_comment_teacher_max_points_user\" value = $receive_comment_teacher_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_max_comments_user_object\" onChange=\"activitypoints_show_max_comments_user_object()\" $selected_unlimited_max_comments_user_object> $unlimited_max_comments_user_object_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_max_comments_user_object" style="<?php echo $style_display_unlimited_max_comments_user_object;?>;">
<p>
<b><?php echo $max_comments_user_object_label; ?></b>
<?php echo "<input type = \"text\" name = \"max_comments_user_object\" value = $max_comments_user_object>"; ?>
</p>
<br>
</div>
</div>

<p><a onclick="activitypoints_show_like();" style="cursor:hand;"><?php echo $conf_likes;?></a></p>     
<div id="resultsDiv_like" style="display:none;">     
<p>
<b><?php echo $add_like_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_like_points\" value = $add_like_points>"; ?>
</p>
<br>
<p>
<b><?php echo $receive_like_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_like_points\" value = $receive_like_points>"; ?>
</p>
<br>
<p>
<b><?php echo $receive_like_teacher_points_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_like_teacher_points\" value = $receive_like_teacher_points>"; ?>
</p>
<br>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_add_like_max_points_user\" onChange=\"activitypoints_show_add_like_max_points_user()\" $selected_unlimited_add_like_max_points_user> $unlimited_add_like_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_add_like_max_points_user" style="<?php echo $style_display_unlimited_add_like_max_points_user;?>;">
<p>
<b><?php echo $add_like_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"add_like_max_points_user\" value = $add_like_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_receive_like_max_points_user\" onChange=\"activitypoints_show_receive_like_max_points_user()\" $selected_unlimited_receive_like_max_points_user> $unlimited_receive_like_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_receive_like_max_points_user" style="<?php echo $style_display_unlimited_receive_like_max_points_user;?>;">
<p>
<b><?php echo $receive_like_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_like_max_points_user\" value = $receive_like_max_points_user>"; ?>
</p>
<br>
</div>
<p>
<b>
<?php echo "<input type = \"checkbox\" name = \"unlimited_receive_like_teacher_max_points_user\" onChange=\"activitypoints_show_receive_like_teacher_max_points_user()\" $selected_unlimited_receive_like_teacher_max_points_user> $unlimited_receive_like_teacher_max_points_user_label"; ?>
</b> 
</p><br>
<div id="resultsDiv_unlimited_receive_like_teacher_max_points_user" style="<?php echo $style_display_unlimited_receive_like_teacher_max_points_user;?>;">
<p>
<b><?php echo $receive_like_teacher_max_points_user_label; ?></b>
<?php echo "<input type = \"text\" name = \"receive_like_teacher_max_points_user\" value = $receive_like_teacher_max_points_user>"; ?>
</p>
<br>
</div>
</div>

<?php
if ($activitypoints_group_setup) {
   ?>
   <input type="hidden" name="activitypoints_group_setup_guid" value="<?php echo $activitypoints_group_setup->getGUID(); ?>">
   <?php
   $submit_input = elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('activitypoints:save_setup_group')));
} else {
   ?>
   <input type="hidden" name="container_guid" value="<?php echo $vars['container_guid']; ?>">
   <?php
   $submit_input = elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('activitypoints:save_setup_group')));
}
echo $submit_input;

?>
</form>

<script type="text/javascript">
   function activitypoints_show_task(){
      var resultsDiv_task = document.getElementById('resultsDiv_task');
      if (resultsDiv_task.style.display == 'none') {
         resultsDiv_task.style.display = 'block';
      } else {  
         resultsDiv_task.style.display = 'none';
      }
   }    
   function activitypoints_show_add_task_max_points_user(){
      var resultsDiv_unlimited_add_task_max_points_user = document.getElementById('resultsDiv_unlimited_add_task_max_points_user');    
      
      if (resultsDiv_unlimited_add_task_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_task_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_task_max_points_user.style.display = 'none';
      }
   }   
   function activitypoints_show_view_task_max_points_user(){
      var resultsDiv_unlimited_view_task_max_points_user = document.getElementById('resultsDiv_unlimited_view_task_max_points_user');    
      
      if (resultsDiv_unlimited_view_task_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_task_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_task_max_points_user.style.display = 'none';
      }
   }

   function activitypoints_show_test(){
      var resultsDiv_test = document.getElementById('resultsDiv_test');
      if (resultsDiv_test.style.display == 'none') {
         resultsDiv_test.style.display = 'block';
      } else {  
         resultsDiv_test.style.display = 'none';
      }
   }    
   function activitypoints_show_add_test_max_points_user(){
      var resultsDiv_unlimited_add_test_max_points_user = document.getElementById('resultsDiv_unlimited_add_test_max_points_user');    
      
      if (resultsDiv_unlimited_add_test_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_test_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_test_max_points_user.style.display = 'none';
      }
   }   
   function activitypoints_show_view_test_max_points_user(){
      var resultsDiv_unlimited_view_test_max_points_user = document.getElementById('resultsDiv_unlimited_view_test_max_points_user');    
      
      if (resultsDiv_unlimited_view_test_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_test_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_test_max_points_user.style.display = 'none';
      }
   }

   function activitypoints_show_form(){
      var resultsDiv_form = document.getElementById('resultsDiv_form');
      if (resultsDiv_form.style.display == 'none') {
         resultsDiv_form.style.display = 'block';
      } else {  
         resultsDiv_form.style.display = 'none';
      }
   }    
   function activitypoints_show_add_form_max_points_user(){
      var resultsDiv_unlimited_add_form_max_points_user = document.getElementById('resultsDiv_unlimited_add_form_max_points_user');    
      
      if (resultsDiv_unlimited_add_form_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_form_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_form_max_points_user.style.display = 'none';
      }
   }   
   function activitypoints_show_view_form_max_points_user(){
      var resultsDiv_unlimited_view_form_max_points_user = document.getElementById('resultsDiv_unlimited_view_form_max_points_user');    
      
      if (resultsDiv_unlimited_view_form_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_form_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_form_max_points_user.style.display = 'none';
      }
   }

   function activitypoints_show_task_answer(){
      var resultsDiv_task_answer = document.getElementById('resultsDiv_task_answer');
      if (resultsDiv_task_answer.style.display == 'none') {
         resultsDiv_task_answer.style.display = 'block';
      } else {  
         resultsDiv_task_answer.style.display = 'none';
      }
   }    
   function activitypoints_show_add_task_answer_max_points_user(){
      var resultsDiv_unlimited_add_task_answer_max_points_user = document.getElementById('resultsDiv_unlimited_add_task_answer_max_points_user');    
      
      if (resultsDiv_unlimited_add_task_answer_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_task_answer_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_task_answer_max_points_user.style.display = 'none';
      }
   }

   function activitypoints_show_test_answer(){
      var resultsDiv_test_answer = document.getElementById('resultsDiv_test_answer');
      if (resultsDiv_test_answer.style.display == 'none') {
         resultsDiv_test_answer.style.display = 'block';
      } else {  
         resultsDiv_test_answer.style.display = 'none';
      }
   }    
   function activitypoints_show_add_test_answer_max_points_user(){
      var resultsDiv_unlimited_add_test_answer_max_points_user = document.getElementById('resultsDiv_unlimited_add_test_answer_max_points_user');    
      
      if (resultsDiv_unlimited_add_test_answer_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_test_answer_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_test_answer_max_points_user.style.display = 'none';
      }
   }

   function activitypoints_show_form_answer(){
      var resultsDiv_form_answer = document.getElementById('resultsDiv_form_answer');
      if (resultsDiv_form_answer.style.display == 'none') {
         resultsDiv_form_answer.style.display = 'block';
      } else {  
         resultsDiv_form_answer.style.display = 'none';
      }
   }    
   function activitypoints_show_add_form_answer_max_points_user(){
      var resultsDiv_unlimited_add_form_answer_max_points_user = document.getElementById('resultsDiv_unlimited_add_form_answer_max_points_user');    
      
      if (resultsDiv_unlimited_add_form_answer_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_form_answer_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_form_answer_max_points_user.style.display = 'none';
      }
   } 

   function activitypoints_show_question(){
      var resultsDiv_question = document.getElementById('resultsDiv_question');
      if (resultsDiv_question.style.display == 'none') {
         resultsDiv_question.style.display = 'block';
      } else {  
         resultsDiv_question.style.display = 'none';
      }
   }    
   function activitypoints_show_add_question_max_points_user(){
      var resultsDiv_unlimited_add_question_max_points_user = document.getElementById('resultsDiv_unlimited_add_question_max_points_user');    
      
      if (resultsDiv_unlimited_add_question_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_question_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_question_max_points_user.style.display = 'none';
      }
   }   
   function activitypoints_show_view_question_max_points_user(){
      var resultsDiv_unlimited_view_question_max_points_user = document.getElementById('resultsDiv_unlimited_view_question_max_points_user');    
      
      if (resultsDiv_unlimited_view_question_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_question_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_question_max_points_user.style.display = 'none';
      }
   }   
   
   function activitypoints_show_answer(){
      var resultsDiv_answer = document.getElementById('resultsDiv_answer');
      if (resultsDiv_answer.style.display == 'none') {
         resultsDiv_answer.style.display = 'block';
      } else {  
         resultsDiv_answer.style.display = 'none';
      }
   }    
   function activitypoints_show_add_answer_max_points_user(){
      var resultsDiv_unlimited_add_answer_max_points_user = document.getElementById('resultsDiv_unlimited_add_answer_max_points_user');    
      
      if (resultsDiv_unlimited_add_answer_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_answer_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_answer_max_points_user.style.display = 'none';
      }
   }   

   function activitypoints_show_blog_post(){
      var resultsDiv_blog_post = document.getElementById('resultsDiv_blog_post');
      if (resultsDiv_blog_post.style.display == 'none') {
         resultsDiv_blog_post.style.display = 'block';
      } else {  
         resultsDiv_blog_post.style.display = 'none';
      }
   }    
   function activitypoints_show_add_blog_post_max_points_user(){
      var resultsDiv_unlimited_add_blog_post_max_points_user = document.getElementById('resultsDiv_unlimited_add_blog_post_max_points_user');    
      
      if (resultsDiv_unlimited_add_blog_post_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_blog_post_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_blog_post_max_points_user.style.display = 'none';
      }
   }   
   function activitypoints_show_view_blog_post_max_points_user(){
      var resultsDiv_unlimited_view_blog_post_max_points_user = document.getElementById('resultsDiv_unlimited_view_blog_post_max_points_user');    
      
      if (resultsDiv_unlimited_view_blog_post_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_blog_post_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_blog_post_max_points_user.style.display = 'none';
      }
   }   

   function activitypoints_show_page(){
      var resultsDiv_page = document.getElementById('resultsDiv_page');
      if (resultsDiv_page.style.display == 'none') {
         resultsDiv_page.style.display = 'block';
      } else {  
         resultsDiv_page.style.display = 'none';
      }
   }    
   function activitypoints_show_add_page_top_max_points_user(){
      var resultsDiv_unlimited_add_page_top_max_points_user = document.getElementById('resultsDiv_unlimited_add_page_top_max_points_user');    
      
      if (resultsDiv_unlimited_add_page_top_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_page_top_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_page_top_max_points_user.style.display = 'none';
      }
   }   
   function activitypoints_show_add_page_max_points_user(){
      var resultsDiv_unlimited_add_page_max_points_user = document.getElementById('resultsDiv_unlimited_add_page_max_points_user');    
      
      if (resultsDiv_unlimited_add_page_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_page_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_page_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_view_page_top_max_points_user(){
      var resultsDiv_unlimited_view_page_top_max_points_user = document.getElementById('resultsDiv_unlimited_view_page_top_max_points_user');    
      
      if (resultsDiv_unlimited_view_page_top_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_page_top_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_page_top_max_points_user.style.display = 'none';
      }
   }   

   function activitypoints_show_bookmark(){
      var resultsDiv_bookmark = document.getElementById('resultsDiv_bookmark');
      if (resultsDiv_bookmark.style.display == 'none') {
         resultsDiv_bookmark.style.display = 'block';
      } else {  
         resultsDiv_bookmark.style.display = 'none';
      }
   }
   function activitypoints_show_add_bookmark_max_points_user(){
      var resultsDiv_unlimited_add_bookmark_max_points_user = document.getElementById('resultsDiv_unlimited_add_bookmark_max_points_user');    
      
      if (resultsDiv_unlimited_add_bookmark_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_bookmark_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_bookmark_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_view_bookmark_max_points_user(){
      var resultsDiv_unlimited_view_bookmark_max_points_user = document.getElementById('resultsDiv_unlimited_view_bookmark_max_points_user');    
      
      if (resultsDiv_unlimited_view_bookmark_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_bookmark_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_bookmark_max_points_user.style.display = 'none';
      }
   } 

   function activitypoints_show_file(){
      var resultsDiv_file = document.getElementById('resultsDiv_file');
      if (resultsDiv_file.style.display == 'none') {
         resultsDiv_file.style.display = 'block';
      } else {  
         resultsDiv_file.style.display = 'none';
      }
   }
   function activitypoints_show_add_file_max_points_user(){
      var resultsDiv_unlimited_add_file_max_points_user = document.getElementById('resultsDiv_unlimited_add_file_max_points_user');    
      
      if (resultsDiv_unlimited_add_file_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_file_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_file_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_view_file_max_points_user(){
      var resultsDiv_unlimited_view_file_max_points_user = document.getElementById('resultsDiv_unlimited_view_file_max_points_user');    
      
      if (resultsDiv_unlimited_view_file_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_file_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_file_max_points_user.style.display = 'none';
      }
   } 

   function activitypoints_show_forum(){
      var resultsDiv_forum = document.getElementById('resultsDiv_forum');
      if (resultsDiv_forum.style.display == 'none') {
         resultsDiv_forum.style.display = 'block';
      } else {  
         resultsDiv_forum.style.display = 'none';
      }
   }
   function activitypoints_show_add_forum_max_points_user(){
      var resultsDiv_unlimited_add_forum_max_points_user = document.getElementById('resultsDiv_unlimited_add_forum_max_points_user');    
      
      if (resultsDiv_unlimited_add_forum_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_forum_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_forum_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_view_forum_max_points_user(){
      var resultsDiv_unlimited_view_forum_max_points_user = document.getElementById('resultsDiv_unlimited_view_forum_max_points_user');    
      
      if (resultsDiv_unlimited_view_forum_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_view_forum_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_view_forum_max_points_user.style.display = 'none';
      }
   } 

   function activitypoints_show_forum_post(){
      var resultsDiv_forum_post = document.getElementById('resultsDiv_forum_post');
      if (resultsDiv_forum_post.style.display == 'none') {
         resultsDiv_forum_post.style.display = 'block';
      } else {  
         resultsDiv_forum_post.style.display = 'none';
      }
   }
   function activitypoints_show_add_forum_post_max_points_user(){
      var resultsDiv_unlimited_add_forum_post_max_points_user = document.getElementById('resultsDiv_unlimited_add_forum_post_max_points_user');    
      
      if (resultsDiv_unlimited_add_forum_post_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_forum_post_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_forum_post_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_receive_forum_post_max_points_user(){
      var resultsDiv_unlimited_receive_forum_post_max_points_user = document.getElementById('resultsDiv_unlimited_receive_forum_post_max_points_user');    
      
      if (resultsDiv_unlimited_receive_forum_post_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_receive_forum_post_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_receive_forum_post_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_receive_forum_post_teacher_max_points_user(){
      var resultsDiv_unlimited_receive_forum_post_teacher_max_points_user = document.getElementById('resultsDiv_unlimited_receive_forum_post_teacher_max_points_user');    
      
      if (resultsDiv_unlimited_receive_forum_post_teacher_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_receive_forum_post_teacher_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_receive_forum_post_teacher_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_max_forum_posts_user_object(){
      var resultsDiv_unlimited_max_forum_posts_user_object = document.getElementById('resultsDiv_unlimited_max_forum_posts_user_object');    
      
      if (resultsDiv_unlimited_max_forum_posts_user_object.style.display == 'none'){
         resultsDiv_unlimited_max_forum_posts_user_object.style.display = 'block';
      } else {       
         resultsDiv_unlimited_max_forum_posts_user_object.style.display = 'none';
      }
   } 

   function activitypoints_show_comment(){
      var resultsDiv_comment = document.getElementById('resultsDiv_comment');
      if (resultsDiv_comment.style.display == 'none') {
         resultsDiv_comment.style.display = 'block';
      } else {  
         resultsDiv_comment.style.display = 'none';
      }
   }
   function activitypoints_show_add_comment_max_points_user(){
      var resultsDiv_unlimited_add_comment_max_points_user = document.getElementById('resultsDiv_unlimited_add_comment_max_points_user');    
      
      if (resultsDiv_unlimited_add_comment_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_comment_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_comment_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_receive_comment_max_points_user(){
      var resultsDiv_unlimited_receive_comment_max_points_user = document.getElementById('resultsDiv_unlimited_receive_comment_max_points_user');    
      
      if (resultsDiv_unlimited_receive_comment_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_receive_comment_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_receive_comment_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_receive_comment_teacher_max_points_user(){
      var resultsDiv_unlimited_receive_comment_teacher_max_points_user = document.getElementById('resultsDiv_unlimited_receive_comment_teacher_max_points_user');    
      
      if (resultsDiv_unlimited_receive_comment_teacher_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_receive_comment_teacher_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_receive_comment_teacher_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_max_comments_user_object(){
      var resultsDiv_unlimited_max_comments_user_object = document.getElementById('resultsDiv_unlimited_max_comments_user_object');    
      
      if (resultsDiv_unlimited_max_comments_user_object.style.display == 'none'){
         resultsDiv_unlimited_max_comments_user_object.style.display = 'block';
      } else {       
         resultsDiv_unlimited_max_comments_user_object.style.display = 'none';
      }
   } 
      
   function activitypoints_show_like(){
      var resultsDiv_like = document.getElementById('resultsDiv_like');
      if (resultsDiv_like.style.display == 'none') {
         resultsDiv_like.style.display = 'block';
      } else {  
         resultsDiv_like.style.display = 'none';
      }
   }
   function activitypoints_show_add_like_max_points_user(){
      var resultsDiv_unlimited_add_like_max_points_user = document.getElementById('resultsDiv_unlimited_add_like_max_points_user');    
      
      if (resultsDiv_unlimited_add_like_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_add_like_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_add_like_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_receive_like_max_points_user(){
      var resultsDiv_unlimited_receive_like_max_points_user = document.getElementById('resultsDiv_unlimited_receive_like_max_points_user');    
      
      if (resultsDiv_unlimited_receive_like_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_receive_like_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_receive_like_max_points_user.style.display = 'none';
      }
   } 
   function activitypoints_show_receive_like_teacher_max_points_user(){
      var resultsDiv_unlimited_receive_like_teacher_max_points_user = document.getElementById('resultsDiv_unlimited_receive_like_teacher_max_points_user');    
      
      if (resultsDiv_unlimited_receive_like_teacher_max_points_user.style.display == 'none'){
         resultsDiv_unlimited_receive_like_teacher_max_points_user.style.display = 'block';
      } else {       
         resultsDiv_unlimited_receive_like_teacher_max_points_user.style.display = 'none';
      }
   } 
   
</script>

</div>
