<?php

gatekeeper();

$user_guid = elgg_get_logged_in_user_guid();
$user = get_entity($user_guid);

$activitypoints_group_setup_guid = get_input('activitypoints_group_setup_guid');
$activitypoints_group_setup = get_entity($activitypoints_group_setup_guid);

$add_task_points = get_input('add_task_points');
$unlimited_add_task_max_points_user = get_input('unlimited_add_task_max_points_user');
if (strcmp($unlimited_add_task_max_points_user,"on")==0) {
   $unlimited_add_task_max_points_user = true;
} else {
   $unlimited_add_task_max_points_user = false;
   $add_task_max_points_user = get_input('add_task_max_points_user');
}

$add_test_points = get_input('add_test_points');
$unlimited_add_test_max_points_user = get_input('unlimited_add_test_max_points_user');
if (strcmp($unlimited_add_test_max_points_user,"on")==0) {
   $unlimited_add_test_max_points_user = true;
} else {
   $unlimited_add_test_max_points_user = false;
   $add_test_max_points_user = get_input('add_test_max_points_user');
}

$add_form_points = get_input('add_form_points');
$unlimited_add_form_max_points_user = get_input('unlimited_add_form_max_points_user');
if (strcmp($unlimited_add_form_max_points_user,"on")==0) {
   $unlimited_add_form_max_points_user = true;
} else {
   $unlimited_add_form_max_points_user = false;
   $add_form_max_points_user = get_input('add_form_max_points_user');
}

$view_task_points = get_input('view_task_points');
$unlimited_view_task_max_points_user = get_input('unlimited_view_task_max_points_user');
if (strcmp($unlimited_view_task_max_points_user,"on")==0) {
   $unlimited_view_task_max_points_user = true;
} else {
   $unlimited_view_task_max_points_user = false;
   $view_task_max_points_user = get_input('view_task_max_points_user');
}

$view_test_points = get_input('view_test_points');
$unlimited_view_test_max_points_user = get_input('unlimited_view_test_max_points_user');
if (strcmp($unlimited_view_test_max_points_user,"on")==0) {
   $unlimited_view_test_max_points_user = true;
} else {
   $unlimited_view_test_max_points_user = false;
   $view_test_max_points_user = get_input('view_test_max_points_user');
}

$view_form_points = get_input('view_form_points');
$unlimited_view_form_max_points_user = get_input('unlimited_view_form_max_points_user');
if (strcmp($unlimited_view_form_max_points_user,"on")==0) {
   $unlimited_view_form_max_points_user = true;
} else {
   $unlimited_view_form_max_points_user = false;
   $view_form_max_points_user = get_input('view_form_max_points_user');
}

$add_task_answer_points = get_input('add_task_answer_points');
$unlimited_add_task_answer_max_points_user = get_input('unlimited_add_task_answer_max_points_user');
if (strcmp($unlimited_add_task_answer_max_points_user,"on")==0) {
   $unlimited_add_task_answer_max_points_user = true;
} else {
   $unlimited_add_task_answer_max_points_user = false;
   $add_task_answer_max_points_user = get_input('add_task_answer_max_points_user');
}

$add_test_answer_points = get_input('add_test_answer_points');
$unlimited_add_test_answer_max_points_user = get_input('unlimited_add_test_answer_max_points_user');
if (strcmp($unlimited_add_test_answer_max_points_user,"on")==0) {
   $unlimited_add_test_answer_max_points_user = true;
} else {
   $unlimited_add_test_answer_max_points_user = false;
   $add_test_answer_max_points_user = get_input('add_test_answer_max_points_user');
}

$add_form_answer_points = get_input('add_form_answer_points');
$unlimited_add_form_answer_max_points_user = get_input('unlimited_add_form_answer_max_points_user');
if (strcmp($unlimited_add_form_answer_max_points_user,"on")==0) {
   $unlimited_add_form_answer_max_points_user = true;
} else {
   $unlimited_add_form_answer_max_points_user = false;
   $add_form_answer_max_points_user = get_input('add_form_answer_max_points_user');
}

$add_question_points = get_input('add_question_points');
$unlimited_add_question_max_points_user = get_input('unlimited_add_question_max_points_user');
if (strcmp($unlimited_add_question_max_points_user,"on")==0) {
   $unlimited_add_question_max_points_user = true;
} else {
   $unlimited_add_question_max_points_user = false;
   $add_question_max_points_user = get_input('add_question_max_points_user');
}

$view_question_points = get_input('view_question_points');
$unlimited_view_question_max_points_user = get_input('unlimited_view_question_max_points_user');
if (strcmp($unlimited_view_question_max_points_user,"on")==0) {
   $unlimited_view_question_max_points_user = true;
} else {
   $unlimited_view_question_max_points_user = false;
   $view_question_max_points_user = get_input('view_question_max_points_user');
}

$add_answer_points = get_input('add_answer_points');
$unlimited_add_answer_max_points_user = get_input('unlimited_add_answer_max_points_user');
if (strcmp($unlimited_add_answer_max_points_user,"on")==0) {
   $unlimited_add_answer_max_points_user = true;
} else {
   $unlimited_add_answer_max_points_user = false;
   $add_answer_max_points_user = get_input('add_answer_max_points_user');
}

$add_blog_post_points = get_input('add_blog_post_points');
$unlimited_add_blog_post_max_points_user = get_input('unlimited_add_blog_post_max_points_user');
if (strcmp($unlimited_add_blog_post_max_points_user,"on")==0) {
   $unlimited_add_blog_post_max_points_user = true;
} else {
   $unlimited_add_blog_post_max_points_user = false;
   $add_blog_post_max_points_user = get_input('add_blog_post_max_points_user');
}

$view_blog_post_points = get_input('view_blog_post_points');
$unlimited_view_blog_post_max_points_user = get_input('unlimited_view_blog_post_max_points_user');
if (strcmp($unlimited_view_blog_post_max_points_user,"on")==0) {
   $unlimited_view_blog_post_max_points_user = true;
} else {
   $unlimited_view_blog_post_max_points_user = false;
   $view_blog_post_max_points_user = get_input('view_blog_post_max_points_user');
}

$add_page_top_points = get_input('add_page_top_points');
$unlimited_add_page_top_max_points_user = get_input('unlimited_add_page_top_max_points_user');
if (strcmp($unlimited_add_page_top_max_points_user,"on")==0) {
   $unlimited_add_page_top_max_points_user = true;
} else {
   $unlimited_add_page_top_max_points_user = false;
   $add_page_top_max_points_user = get_input('add_page_top_max_points_user');
}
$add_page_points = get_input('add_page_points');
$unlimited_add_page_max_points_user = get_input('unlimited_add_page_max_points_user');
if (strcmp($unlimited_add_page_max_points_user,"on")==0) {
   $unlimited_add_page_max_points_user = true;
} else {
   $unlimited_add_page_max_points_user = false;
   $add_page_max_points_user = get_input('add_page_max_points_user');
}

$view_page_top_points = get_input('view_page_top_points');
$unlimited_view_page_top_max_points_user = get_input('unlimited_view_page_top_max_points_user');
if (strcmp($unlimited_view_page_top_max_points_user,"on")==0) {
   $unlimited_view_page_top_max_points_user = true;
} else {
   $unlimited_view_page_top_max_points_user = false;
   $view_page_top_max_points_user = get_input('view_page_top_max_points_user');
}

$add_bookmark_points = get_input('add_bookmark_points');
$unlimited_add_bookmark_max_points_user = get_input('unlimited_add_bookmark_max_points_user');
if (strcmp($unlimited_add_bookmark_max_points_user,"on")==0) {
   $unlimited_add_bookmark_max_points_user = true;
} else {
   $unlimited_add_bookmark_max_points_user = false;
   $add_bookmark_max_points_user = get_input('add_bookmark_max_points_user');
}

$view_bookmark_points = get_input('view_bookmark_points');
$unlimited_view_bookmark_max_points_user = get_input('unlimited_view_bookmark_max_points_user');
if (strcmp($unlimited_view_bookmark_max_points_user,"on")==0) {
   $unlimited_view_bookmark_max_points_user = true;
} else {
   $unlimited_view_bookmark_max_points_user = false;
   $view_bookmark_max_points_user = get_input('view_bookmark_max_points_user');
}

$add_file_points = get_input('add_file_points');
$unlimited_add_file_max_points_user = get_input('unlimited_add_file_max_points_user');
if (strcmp($unlimited_add_file_max_points_user,"on")==0) {
   $unlimited_add_file_max_points_user = true;
} else {
   $unlimited_add_file_max_points_user = false;
   $add_file_max_points_user = get_input('add_file_max_points_user');
}

$view_file_points = get_input('view_file_points');
$unlimited_view_file_max_points_user = get_input('unlimited_view_file_max_points_user');
if (strcmp($unlimited_view_file_max_points_user,"on")==0) {
   $unlimited_view_file_max_points_user = true;
} else {
   $unlimited_view_file_max_points_user = false;
   $view_file_max_points_user = get_input('view_file_max_points_user');
}

$add_forum_points = get_input('add_forum_points');
$unlimited_add_forum_max_points_user = get_input('unlimited_add_forum_max_points_user');
if (strcmp($unlimited_add_forum_max_points_user,"on")==0) {
   $unlimited_add_forum_max_points_user = true;
} else {
   $unlimited_add_forum_max_points_user = false;
   $add_forum_max_points_user = get_input('add_forum_max_points_user');
}

$view_forum_points = get_input('view_forum_points');
$unlimited_view_forum_max_points_user = get_input('unlimited_view_forum_max_points_user');
if (strcmp($unlimited_view_forum_max_points_user,"on")==0) {
   $unlimited_view_forum_max_points_user = true;
} else {
   $unlimited_view_forum_max_points_user = false;
   $view_forum_max_points_user = get_input('view_forum_max_points_user');
}

$add_forum_post_points = get_input('add_forum_post_points');
$receive_forum_post_points = get_input('receive_forum_post_points');
$receive_forum_post_teacher_points = get_input('receive_forum_post_teacher_points');
$unlimited_add_forum_post_max_points_user = get_input('unlimited_add_forum_post_max_points_user');
if (strcmp($unlimited_add_forum_post_max_points_user,"on")==0) {
   $unlimited_add_forum_post_max_points_user = true;
} else {
   $unlimited_add_forum_post_max_points_user = false;
   $add_forum_post_max_points_user = get_input('add_forum_post_max_points_user');
}
$unlimited_receive_forum_post_max_points_user = get_input('unlimited_receive_forum_post_max_points_user');
if (strcmp($unlimited_receive_forum_post_max_points_user,"on")==0) {
   $unlimited_receive_forum_post_max_points_user = true;
} else {
   $unlimited_receive_forum_post_max_points_user = false;
   $receive_forum_post_max_points_user = get_input('receive_forum_post_max_points_user');
}
$unlimited_receive_forum_post_teacher_max_points_user = get_input('unlimited_receive_forum_post_teacher_max_points_user');
if (strcmp($unlimited_receive_forum_post_teacher_max_points_user,"on")==0) {
   $unlimited_receive_forum_post_teacher_max_points_user = true;
} else {
   $unlimited_receive_forum_post_teacher_max_points_user = false;
   $receive_forum_post_teacher_max_points_user = get_input('receive_forum_post_teacher_max_points_user');
}
$unlimited_max_forum_posts_user_object = get_input('unlimited_max_forum_posts_user_object');
if (strcmp($unlimited_max_forum_posts_user_object,"on")==0) {
   $unlimited_max_forum_posts_user_object = true;
} else {
   $unlimited_max_forum_posts_user_object = false;
   $max_forum_posts_user_object = get_input('max_forum_posts_user_object');
}

$add_comment_points = get_input('add_comment_points');
$receive_comment_points = get_input('receive_comment_points');
$receive_comment_teacher_points = get_input('receive_comment_teacher_points');
$unlimited_add_comment_max_points_user = get_input('unlimited_add_comment_max_points_user');
if (strcmp($unlimited_add_comment_max_points_user,"on")==0) {
   $unlimited_add_comment_max_points_user = true;
} else {
   $unlimited_add_comment_max_points_user = false;
   $add_comment_max_points_user = get_input('add_comment_max_points_user');
}
$unlimited_receive_comment_max_points_user = get_input('unlimited_receive_comment_max_points_user');
if (strcmp($unlimited_receive_comment_max_points_user,"on")==0) {
   $unlimited_receive_comment_max_points_user = true;
} else {
   $unlimited_receive_comment_max_points_user = false;
   $receive_comment_max_points_user = get_input('receive_comment_max_points_user');
}
$unlimited_receive_comment_teacher_max_points_user = get_input('unlimited_receive_comment_teacher_max_points_user');
if (strcmp($unlimited_receive_comment_teacher_max_points_user,"on")==0) {
   $unlimited_receive_comment_teacher_max_points_user = true;
} else {
   $unlimited_receive_comment_teacher_max_points_user = false;
   $receive_comment_teacher_max_points_user = get_input('receive_comment_teacher_max_points_user');
}
$unlimited_max_comments_user_object = get_input('unlimited_max_comments_user_object');
if (strcmp($unlimited_max_comments_user_object,"on")==0) {
   $unlimited_max_comments_user_object = true;
} else {
   $unlimited_max_comments_user_object = false;
   $max_comments_user_object = get_input('max_comments_user_object');
}

$add_like_points = get_input('add_like_points');
$receive_like_points = get_input('receive_like_points');
$receive_like_teacher_points = get_input('receive_like_teacher_points');
$unlimited_add_like_max_points_user = get_input('unlimited_add_like_max_points_user');
if (strcmp($unlimited_add_like_max_points_user,"on")==0) {
   $unlimited_add_like_max_points_user = true;
} else {
   $unlimited_add_like_max_points_user = false;
   $add_like_max_points_user = get_input('add_like_max_points_user');
}
$unlimited_receive_like_max_points_user = get_input('unlimited_receive_like_max_points_user');
if (strcmp($unlimited_receive_like_max_points_user,"on")==0) {
   $unlimited_receive_like_max_points_user = true;
} else {
   $unlimited_receive_like_max_points_user = false;
   $receive_like_max_points_user = get_input('receive_like_max_points_user');
}
$unlimited_receive_like_teacher_max_points_user = get_input('unlimited_receive_like_teacher_max_points_user');
if (strcmp($unlimited_receive_like_teacher_max_points_user,"on")==0) {
   $unlimited_receive_like_teacher_max_points_user = true;
} else {
   $unlimited_receive_like_teacher_max_points_user = false;
   $receive_like_teacher_max_points_user = get_input('receive_like_teacher_max_points_user');
}

/////////////////////////////////////////////////////////////////////////

// Cache to the session
elgg_make_sticky_form('setup_group_activitypoints');

/////////////////////////////////////////////////////////////////////////

//Numeric add_task_points
if (strcmp($add_task_points,"")!=0){
   $is_number = is_numeric($add_task_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_task_points"));
      forward($_SERVER['HTTP_REFEER']);
   }
} else {
   $add_task_points = 0;
}

//Numeric add_test_points
if (strcmp($add_test_points,"")!=0){
   $is_number = is_numeric($add_test_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_test_points"));
      forward($_SERVER['HTTP_REFEER']);
   }
} else {
   $add_test_points = 0;
}

//Numeric add_form_points
if (strcmp($add_form_points,"")!=0){
   $is_number = is_numeric($add_form_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_form_points"));
      forward($_SERVER['HTTP_REFEER']);
   }
} else {
  $add_form_points = 0;
}

//Numeric add_task_max_points_user
if (!$unlimited_add_task_max_points_user){
   if (strcmp($add_task_max_points_user,"")!=0){
      $is_number = is_numeric($add_task_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_task_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }
   } else {
      $add_task_max_points_user = 0;
   }
}

//Numeric add_test_max_points_user
if (!$unlimited_add_test_max_points_user){
   if (strcmp($add_test_max_points_user,"")!=0){
      $is_number = is_numeric($add_test_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_test_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $add_test_max_points_user = 0;
   }
}

//Numeric add_form_max_points_user
if (!$unlimited_add_form_max_points_user){
   if (strcmp($add_form_max_points_user,"")!=0){
      $is_number = is_numeric($add_form_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_form_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_form_max_points_user = 0;
   }
}

//Numeric view_task_points
if (strcmp($view_task_points,"")!=0){
   $is_number = is_numeric($view_task_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_task_points"));
      forward($_SERVER['HTTP_REFERER']);
   }
} else {
   $view_task_points = 0;
}

//Numeric view_test_points
if (strcmp($view_test_points,"")!=0){
   $is_number = is_numeric($view_test_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_test_points"));
      forward($_SERVER['HTTP_REFERER']);
   }
} else {
   $view_test_points = 0;
}

//Numeric view_form_points
if (strcmp($view_form_points,"")!=0){
   $is_number = is_numeric($view_form_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_form_points"));
      forward($_SERVER['HTTP_REFERER']); 
   } 
} else {
   $view_form_points = 0;
}

//Numeric view_task_max_points_user
if (!$unlimited_view_task_max_points_user){
   if (strcmp($view_task_max_points_user,"")!=0){
      $is_number = is_numeric($view_task_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_task_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $view_task_max_points_user = 0;
   }
}

//Numeric view_test_max_points_user
if (!$unlimited_view_test_max_points_user){
   if (strcmp($view_test_max_points_user,"")!=0){
      $is_number = is_numeric($view_test_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_test_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }   
   } else {
      $view_test_max_points_user = 0;
   }
}

//Numeric view_form_max_points_user
if (!$unlimited_view_form_max_points_user){
   if (strcmp($view_form_max_points_user,"")!=0){
      $is_number = is_numeric($view_form_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_form_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $view_form_max_points_user = 0;
   }
}

//Numeric add_task_answer_points
if (strcmp($add_task_answer_points,"")!=0){
   $is_number = is_numeric($add_task_answer_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_task_answer_points"));
      forward($_SERVER['HTTP_REFERER']);
   }
} else {
   $add_task_answer_points = 0;
}

//Numeric add_test_answer_points
if (strcmp($add_test_answer_points,"")!=0){
   $is_number = is_numeric($add_test_answer_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_test_answer_points"));
      forward($_SERVER['HTTP_REFERER']);
   }
} else {
   $add_test_answer_points = 0;
}

//Numeric add_form_answer_points
if (strcmp($add_form_answer_points,"")!=0){
   $is_number = is_numeric($add_form_answer_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_form_answer_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_form_answer_points = 0;
}

//Numeric add_task_answer_max_points_user
if (!$unlimited_add_task_answer_max_points_user){
   if (strcmp($add_task_answer_max_points_user,"")!=0){
      $is_number = is_numeric($add_task_answer_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_task_answer_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_task_answer_max_points_user = 0;
   }
}

//Numeric add_test_answer_max_points_user
if (!$unlimited_add_test_answer_max_points_user){
   if (strcmp($add_test_answer_max_points_user,"")!=0){
      $is_number = is_numeric($add_test_answer_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_test_answer_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $add_test_answer_max_points_user = 0;
   } 
}

//Numeric add_form_answer_max_points_user
if (!$unlimited_add_form_answer_max_points_user){
   if (strcmp($add_form_answer_max_points_user,"")!=0){
      $is_number = is_numeric($add_form_answer_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_form_answer_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_form_answer_max_points_user = 0;
   }
}

//Numeric add_question_points
if (strcmp($add_question_points,"")!=0){
   $is_number = is_numeric($add_question_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_question_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_question_points = 0;
}
//Numeric add_question_max_points_user
if (!$unlimited_add_question_max_points_user){
   if (strcmp($add_question_max_points_user,"")!=0){
      $is_number = is_numeric($add_question_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_question_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_question_max_points_user = 0;
   }
}

//Numeric view_question_points
if (strcmp($view_question_points,"")!=0){
   $is_number = is_numeric($view_question_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_question_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $view_question_points = 0;
}
//Numeric view_question_max_points_user
if (!$unlimited_view_question_max_points_user){
   if (strcmp($view_question_max_points_user,"")!=0){
      $is_number = is_numeric($view_question_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_question_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }
   } else {
      $view_question_max_points_user = 0;
   }  
}

//Numeric add_answer_points
if (strcmp($add_answer_points,"")!=0){
   $is_number = is_numeric($add_answer_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_answer_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_answer_points = 0;
}
//Numeric add_answer_max_points_user
if (!$unlimited_add_answer_max_points_user){
   if (strcmp($add_answer_max_points_user,"")!=0){
      $is_number = is_numeric($add_answer_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_answer_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_answer_max_points_user = 0;
   }
}

//Numeric add_blog_post_points
if (strcmp($add_blog_post_points,"")!=0){
   $is_number = is_numeric($add_blog_post_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_blog_post_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_blog_post_points = 0;
}
//Numeric add_blog_post_max_points_user
if (!$unlimited_add_blog_post_max_points_user){
   if (strcmp($add_blog_post_max_points_user,"")!=0){
      $is_number = is_numeric($add_blog_post_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_blog_post_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_blog_post_max_points_user = 0;
   }
}

//Numeric view_blog_post_points
if (strcmp($view_blog_post_points,"")!=0){
   $is_number = is_numeric($view_blog_post_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_blog_post_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $view_blog_post_points = 0;
}
//Numeric view_blog_post_max_points_user
if (!$unlimited_view_blog_post_max_points_user){
   if (strcmp($view_blog_post_max_points_user,"")!=0){
      $is_number = is_numeric($view_blog_post_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_blog_post_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $view_blog_post_max_points_user = 0;
   } 
}

//Numeric add_page_top_points
if (strcmp($add_page_top_points,"")!=0){
   $is_number = is_numeric($add_page_top_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_page_top_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_page_top_points = 0;
}
//Numeric add_page_top_max_points_user
if (!$unlimited_add_page_top_max_points_user){
   if (strcmp($add_page_top_max_points_user,"")!=0){
      $is_number = is_numeric($add_page_top_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_page_top_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_page_top_max_points_user = 0;
   }
}
//Numeric add_page_points
if (strcmp($add_page_points,"")!=0){
   $is_number = is_numeric($add_page_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_page_points"));
      forward($_SERVER['HTTP_REFERER']);
   }
} else {
   $add_page_points = 0;
} 
//Numeric add_page_max_points_user
if (!$unlimited_add_page_max_points_user){
   if (strcmp($add_page_max_points_user,"")!=0){
      $is_number = is_numeric($add_page_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_page_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_page_max_points_user = 0;
   }
}

//Numeric view_page_top_points
if (strcmp($view_page_top_points,"")!=0){
   $is_number = is_numeric($view_page_top_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_page_top_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $view_page_top_points = 0;
}
//Numeric view_page_top_max_points_user
if (!$unlimited_view_page_top_max_points_user){
   if (strcmp($view_page_top_max_points_user,"")!=0){
      $is_number = is_numeric($view_page_top_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_page_top_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $view_page_top_max_points_user = 0;
   } 
}

//Numeric add_bookmark_points
$is_number = is_numeric($add_bookmark_points);
if (strcmp($add_bookmark_points,"")!=0){
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_bookmark_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_bookmark_points = 0;
}
//Numeric add_bookmark_max_points_user
if (!$unlimited_add_bookmark_max_points_user){
   if (strcmp($add_bookmark_max_points_user,"")!=0){
      $is_number = is_numeric($add_bookmark_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_bookmark_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $add_bookmark_max_points_user = 0;
   } 
}

//Numeric view_bookmark_points
if (strcmp($view_bookmark_points,"")!=0){
   $is_number = is_numeric($view_bookmark_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_bookmark_points"));
      forward($_SERVER['HTTP_REFERER']);
   }
} else {
   $view_bookmark_points = 0;
} 
//Numeric view_bookmark_max_points_user
if (!$unlimited_view_bookmark_max_points_user){
   if (strcmp($view_bookmark_max_points_user,"")!=0){
      $is_number = is_numeric($view_bookmark_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_bookmark_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $view_bookmark_max_points_user = 0;
   }
}

//Numeric add_file_points
if (strcmp($add_file_points,"")!=0){
   $is_number = is_numeric($add_file_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_file_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_file_points = 0;
}
//Numeric add_file_max_points_user
if (!$unlimited_add_file_max_points_user){
   if (strcmp($add_file_max_points_user,"")!=0){
      $is_number = is_numeric($add_file_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_file_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }
   } else {
      $add_file_max_points_user = 0;
   }  
}

//Numeric view_file_points
if (strcmp($view_file_points,"")!=0){
   $is_number = is_numeric($view_file_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_file_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $view_file_points = 0;
}
//Numeric view_file_max_points_user
if (!$unlimited_view_file_max_points_user){
   if (strcmp($view_file_max_points_user,"")!=0){
      $is_number = is_numeric($view_file_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_file_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $view_file_max_points_user = 0;
   }
}

//Numeric add_forum_points
if (strcmp($add_forum_points,"")!=0){
   $is_number = is_numeric($add_forum_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_forum_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_forum_points = 0;
}
//Numeric add_forum_max_points_user
if (!$unlimited_add_forum_max_points_user){
   if (strcmp($add_forum_max_points_user,"")!=0){
      $is_number = is_numeric($add_forum_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_forum_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_forum_max_points_user = 0;
   }
}

//Numeric view_forum_points
if (strcmp($view_forum_points,"")!=0){
   $is_number = is_numeric($view_forum_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_view_forum_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $view_forum_points = 0;
}
//Numeric view_forum_max_points_user
if (!$unlimited_view_forum_max_points_user){
   if (strcmp($view_forum_max_points_user,"")!=0){
      $is_number = is_numeric($view_forum_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_view_forum_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $view_forum_max_points_user = 0;
   } 
}

//Numeric add_forum_post_points
if (strcmp($add_forum_post_points,"")!=0){
   $is_number = is_numeric($add_forum_post_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_forum_post_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_forum_post_points = 0;
}
//Numeric receive_forum_post_points
if (strcmp($receive_forum_post_points,"")!=0){
   $is_number = is_numeric($receive_forum_post_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_receive_forum_post_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $receive_forum_post_points = 0;
}
//Numeric receive_forum_post_teacher_points
if (strcmp($receive_forum_post_teacher_points,"")!=0){
   $is_number = is_numeric($receive_forum_post_teacher_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_receive_forum_post_teacher_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $receive_forum_post_teacher_points = 0;
}
//Numeric add_forum_post_max_points_user
if (!$unlimited_add_forum_post_max_points_user){
   if (strcmp($add_forum_post_max_points_user,"")!=0){
      $is_number = is_numeric($add_forum_post_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_forum_post_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_forum_post_max_points_user = 0;
   }
}
//Numeric receive_forum_post_max_points_user
if (!$unlimited_receive_forum_post_max_points_user){
   if (strcmp($receive_forum_post_max_points_user,"")!=0){
      $is_number = is_numeric($receive_forum_post_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_receive_forum_post_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $receive_forum_post_max_points_user = 0;
   }
}
//Numeric receive_forum_post_teacher_max_points_user
if (!$unlimited_receive_forum_post_teacher_max_points_user){
   if (strcmp($receive_forum_post_teacher_max_points_user,"")!=0){
      $is_number = is_numeric($receive_forum_post_teacher_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_receive_forum_post_teacher_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $receive_forum_post_teacher_max_points_user = 0;
   }
}
//Numeric max_forum_posts_user_object
if (!$unlimited_max_forum_posts_user_object){
   if (strcmp($max_forum_posts_user_object,"")!=0){
      $is_number = is_numeric($max_forum_posts_user_object);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_max_forum_posts_user_object"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $max_forum_posts_user_object = 0;
   } 
}

//Numeric add_comment_points
if (strcmp($add_comment_points,"")!=0){
   $is_number = is_numeric($add_comment_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_comment_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_comment_points = 0;
}
//Numeric receive_comment_points
if (strcmp($receive_comment_points,"")!=0){
   $is_number = is_numeric($receive_comment_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_receive_comment_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $receive_comment_points = 0;
}
//Numeric receive_comment_teacher_points
if (strcmp($receive_comment_teacher_points,"")!=0){
   $is_number = is_numeric($receive_comment_teacher_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_receive_comment_teacher_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $receive_comment_teacher_points = 0;
}
//Numeric add_comment_max_points_user
if (!$unlimited_add_comment_max_points_user){
   if (strcmp($add_comment_max_points_user,"")!=0){
      $is_number = is_numeric($add_comment_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_comment_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_comment_max_points_user = 0;
   }
}
//Numeric receive_comment_max_points_user
if (!$unlimited_receive_comment_max_points_user){
   if (strcmp($receive_comment_max_points_user,"")!=0){
      $is_number = is_numeric($receive_comment_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_receive_comment_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $receive_comment_max_points_user = 0;
   } 
}
//Numeric receive_comment_teacher_max_points_user
if (!$unlimited_receive_comment_teacher_max_points_user){
   if (strcmp($receive_comment_teacher_max_points_user,"")!=0){
      $is_number = is_numeric($receive_comment_teacher_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_receive_comment_teacher_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $receive_comment_teacher_max_points_user = 0;
   } 
}
//Numeric max_comments_user_object
if (!$unlimited_max_comments_user_object){
   if (strcmp($max_comments_user_object,"")!=0){
      $is_number = is_numeric($max_comments_user_object);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_max_comments_user_object"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $max_comments_user_object = 0;
   }
}

//Numeric add_like_points
if (strcmp($add_like_points,"")!=0){
   $is_number = is_numeric($add_like_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_add_like_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $add_like_points = 0;
}
//Numeric receive_like_points
if (strcmp($receive_like_points,"")!=0){
   $is_number = is_numeric($receive_like_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_receive_like_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $receive_like_points = 0;
}
//Numeric receive_like_teacher_points
if (strcmp($receive_like_teacher_points,"")!=0){
   $is_number = is_numeric($receive_like_teacher_points);
   if (!$is_number){
      register_error(elgg_echo("activitypoints:bad_receive_like_teacher_points"));
      forward($_SERVER['HTTP_REFERER']);
   } 
} else {
   $receive_like_teacher_points = 0;
}
//Numeric add_like_max_points_user
if (!$unlimited_add_like_max_points_user){
   if (strcmp($add_like_max_points_user,"")!=0){
      $is_number = is_numeric($add_like_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_add_like_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      }  
   } else {
      $add_like_max_points_user = 0;
   }
}
//Numeric receive_like_max_points_user
if (!$unlimited_receive_like_max_points_user){
   if (strcmp($receive_like_max_points_user,"")!=0){
      $is_number = is_numeric($receive_like_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_receive_like_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $receive_like_max_points_user = 0;
   } 
}
//Numeric receive_like_teacher_max_points_user
if (!$unlimited_receive_like_teacher_max_points_user){
   if (strcmp($receive_like_teacher_max_points_user,"")!=0){
      $is_number = is_numeric($receive_like_teacher_max_points_user);
      if (!$is_number){
         register_error(elgg_echo("activitypoints:bad_receive_like_teacher_max_points_user"));
         forward($_SERVER['HTTP_REFERER']);
      } 
   } else {
      $receive_like_teacher_max_points_user = 0;
   } 
}

///////////////////////////////////////////////////////////////////////////
           
if ($activitypoints_group_setup && $activitypoints_group_setup->getSubtype() == 'activitypoints_group_setup') {
   $container_guid = $activitypoints_group_setup->container_guid;
   
} else {
   $container_guid = get_input('container_guid');
   $activitypoints_group_setup = new ElggObject();
   $activitypoints_group_setup->subtype = 'activitypoints_group_setup';
   $activitypoints_group_setup->owner_guid = $user_guid;
   $activitypoints_group_setup->container_guid = $container_guid;
   $activitypoints_group_setup->group_guid = $container_guid;
   $activitypoints_group_setup->access_id = get_entity($container_guid)->group_acl;
   
   if (!$activitypoints_group_setup->save()) {
      register_error(elgg_echo("activitypoints:error_save"));
      forward($_SERVER['HTTP_REFERER']);
   }
}
  
$activitypoints_group_setup->add_task_points = $add_task_points;
$activitypoints_group_setup->unlimited_add_task_max_points_user = $unlimited_add_task_max_points_user;
if (!$unlimited_add_task_max_points_user){
   $activitypoints_group_setup->add_task_max_points_user = $add_task_max_points_user;
}

$activitypoints_group_setup->add_test_points = $add_test_points;
$activitypoints_group_setup->unlimited_add_test_max_points_user = $unlimited_add_test_max_points_user;
if (!$unlimited_add_test_max_points_user){
   $activitypoints_group_setup->add_test_max_points_user = $add_test_max_points_user;
}

$activitypoints_group_setup->add_form_points = $add_form_points;
$activitypoints_group_setup->unlimited_add_form_max_points_user = $unlimited_add_form_max_points_user;
if (!$unlimited_add_form_max_points_user){
   $activitypoints_group_setup->add_form_max_points_user = $add_form_max_points_user;
}

$activitypoints_group_setup->view_task_points = $view_task_points;
$activitypoints_group_setup->unlimited_view_task_max_points_user = $unlimited_view_task_max_points_user;
if (!$unlimited_view_task_max_points_user){
   $activitypoints_group_setup->view_task_max_points_user = $view_task_max_points_user;
}

$activitypoints_group_setup->view_test_points = $view_test_points;
$activitypoints_group_setup->unlimited_view_test_max_points_user = $unlimited_view_test_max_points_user;
if (!$unlimited_view_test_max_points_user){
   $activitypoints_group_setup->view_test_max_points_user = $view_test_max_points_user;
}

$activitypoints_group_setup->view_form_points = $view_form_points;
$activitypoints_group_setup->unlimited_view_form_max_points_user = $unlimited_view_form_max_points_user;
if (!$unlimited_view_form_max_points_user){
   $activitypoints_group_setup->view_form_max_points_user = $view_form_max_points_user;
}

$activitypoints_group_setup->add_task_answer_points = $add_task_answer_points;
$activitypoints_group_setup->unlimited_add_task_answer_max_points_user = $unlimited_add_task_answer_max_points_user;
if (!$unlimited_add_task_answer_max_points_user){
   $activitypoints_group_setup->add_task_answer_max_points_user = $add_task_answer_max_points_user;
}

$activitypoints_group_setup->add_test_answer_points = $add_test_answer_points;
$activitypoints_group_setup->unlimited_add_test_answer_max_points_user = $unlimited_add_test_answer_max_points_user;
if (!$unlimited_add_test_answer_max_points_user){
   $activitypoints_group_setup->add_test_answer_max_points_user = $add_test_answer_max_points_user;
}

$activitypoints_group_setup->add_form_answer_points = $add_form_answer_points;
$activitypoints_group_setup->unlimited_add_form_answer_max_points_user = $unlimited_add_form_answer_max_points_user;
if (!$unlimited_add_form_answer_max_points_user){
   $activitypoints_group_setup->add_form_answer_max_points_user = $add_form_answer_max_points_user;
}

$activitypoints_group_setup->add_question_points = $add_question_points;
$activitypoints_group_setup->unlimited_add_question_max_points_user = $unlimited_add_question_max_points_user;
if (!$unlimited_add_question_max_points_user){
   $activitypoints_group_setup->add_question_max_points_user = $add_question_max_points_user;
}

$activitypoints_group_setup->view_question_points = $view_question_points;
$activitypoints_group_setup->unlimited_view_question_max_points_user = $unlimited_view_question_max_points_user;
if (!$unlimited_view_question_max_points_user){
   $activitypoints_group_setup->view_question_max_points_user = $view_question_max_points_user;
}

$activitypoints_group_setup->add_answer_points = $add_answer_points;
$activitypoints_group_setup->unlimited_add_answer_max_points_user = $unlimited_add_answer_max_points_user;
if (!$unlimited_add_answer_max_points_user){
   $activitypoints_group_setup->add_answer_max_points_user = $add_answer_max_points_user;
}
 
$activitypoints_group_setup->add_blog_post_points = $add_blog_post_points;
$activitypoints_group_setup->unlimited_add_blog_post_max_points_user = $unlimited_add_blog_post_max_points_user;
if (!$unlimited_add_blog_post_max_points_user){
   $activitypoints_group_setup->add_blog_post_max_points_user = $add_blog_post_max_points_user;
}

$activitypoints_group_setup->view_blog_post_points = $view_blog_post_points;
$activitypoints_group_setup->unlimited_view_blog_post_max_points_user = $unlimited_view_blog_post_max_points_user;
if (!$unlimited_view_blog_post_max_points_user){
   $activitypoints_group_setup->view_blog_post_max_points_user = $view_blog_post_max_points_user;
}

$activitypoints_group_setup->add_page_top_points = $add_page_top_points;
$activitypoints_group_setup->unlimited_add_page_top_max_points_user = $unlimited_add_page_top_max_points_user;
if (!$unlimited_add_page_top_max_points_user){
   $activitypoints_group_setup->add_page_top_max_points_user = $add_page_top_max_points_user;
}
$activitypoints_group_setup->add_page_points = $add_page_points;
$activitypoints_group_setup->unlimited_add_page_max_points_user = $unlimited_add_page_max_points_user;
if (!$unlimited_add_page_max_points_user){
   $activitypoints_group_setup->add_page_max_points_user = $add_page_max_points_user;
}
   
$activitypoints_group_setup->view_page_top_points = $view_page_top_points;
$activitypoints_group_setup->unlimited_view_page_top_max_points_user = $unlimited_view_page_top_max_points_user;
if (!$unlimited_view_page_top_max_points_user){
   $activitypoints_group_setup->view_page_top_max_points_user = $view_page_top_max_points_user;
}

$activitypoints_group_setup->add_bookmark_points = $add_bookmark_points;
$activitypoints_group_setup->unlimited_add_bookmark_max_points_user = $unlimited_add_bookmark_max_points_user;
if (!$unlimited_add_bookmark_max_points_user){
   $activitypoints_group_setup->add_bookmark_max_points_user = $add_bookmark_max_points_user;
}

$activitypoints_group_setup->view_bookmark_points = $view_bookmark_points;
$activitypoints_group_setup->unlimited_view_bookmark_max_points_user = $unlimited_view_bookmark_max_points_user;
if (!$unlimited_view_bookmark_max_points_user){
   $activitypoints_group_setup->view_bookmark_max_points_user = $view_bookmark_max_points_user;
}

$activitypoints_group_setup->add_file_points = $add_file_points;
$activitypoints_group_setup->unlimited_add_file_max_points_user = $unlimited_add_file_max_points_user;
if (!$unlimited_add_file_max_points_user){
   $activitypoints_group_setup->add_file_max_points_user = $add_file_max_points_user;
}

$activitypoints_group_setup->view_file_points = $view_file_points;
$activitypoints_group_setup->unlimited_view_file_max_points_user = $unlimited_view_file_max_points_user;
if (!$unlimited_view_file_max_points_user){
   $activitypoints_group_setup->view_file_max_points_user = $view_file_max_points_user;
}

$activitypoints_group_setup->add_forum_points = $add_forum_points;
$activitypoints_group_setup->unlimited_add_forum_max_points_user = $unlimited_add_forum_max_points_user;
if (!$unlimited_add_forum_max_points_user){
   $activitypoints_group_setup->add_forum_max_points_user = $add_forum_max_points_user;
}

$activitypoints_group_setup->view_forum_points = $view_forum_points;
$activitypoints_group_setup->unlimited_view_forum_max_points_user = $unlimited_view_forum_max_points_user;
if (!$unlimited_view_forum_max_points_user){
   $activitypoints_group_setup->view_forum_max_points_user = $view_forum_max_points_user;
}

$activitypoints_group_setup->add_forum_post_points = $add_forum_post_points;
$activitypoints_group_setup->receive_forum_post_points = $receive_forum_post_points;
$activitypoints_group_setup->receive_forum_post_teacher_points = $receive_forum_post_teacher_points;
$activitypoints_group_setup->unlimited_add_forum_post_max_points_user = $unlimited_add_forum_post_max_points_user;
if (!$unlimited_add_forum_post_max_points_user){
   $activitypoints_group_setup->add_forum_post_max_points_user = $add_forum_post_max_points_user;
}
$activitypoints_group_setup->unlimited_receive_forum_post_max_points_user = $unlimited_receive_forum_post_max_points_user;
if (!$unlimited_receive_forum_post_max_points_user){
   $activitypoints_group_setup->receive_forum_post_max_points_user = $receive_forum_post_max_points_user;
}
$activitypoints_group_setup->unlimited_receive_forum_post_teacher_max_points_user = $unlimited_receive_forum_post_teacher_max_points_user;
if (!$unlimited_receive_forum_post_teacher_max_points_user){
   $activitypoints_group_setup->receive_forum_post_teacher_max_points_user = $receive_forum_post_teacher_max_points_user;
}
$activitypoints_group_setup->unlimited_max_forum_posts_user_object = $unlimited_max_forum_posts_user_object;
if (!$unlimited_max_forum_posts_user_object){
   $activitypoints_group_setup->max_forum_posts_user_object = $max_forum_posts_user_object;
}

$activitypoints_group_setup->add_comment_points = $add_comment_points;
$activitypoints_group_setup->receive_comment_points = $receive_comment_points;
$activitypoints_group_setup->receive_comment_teacher_points = $receive_comment_teacher_points;
$activitypoints_group_setup->unlimited_add_comment_max_points_user = $unlimited_add_comment_max_points_user;
if (!$unlimited_add_comment_max_points_user){
   $activitypoints_group_setup->add_comment_max_points_user = $add_comment_max_points_user;
}
$activitypoints_group_setup->unlimited_receive_comment_max_points_user = $unlimited_receive_comment_max_points_user;
if (!$unlimited_receive_comment_max_points_user){
   $activitypoints_group_setup->receive_comment_max_points_user = $receive_comment_max_points_user;
}
$activitypoints_group_setup->unlimited_receive_comment_teacher_max_points_user = $unlimited_receive_comment_teacher_max_points_user;
if (!$unlimited_receive_comment_teacher_max_points_user){
   $activitypoints_group_setup->receive_comment_teacher_max_points_user = $receive_comment_teacher_max_points_user;
}
$activitypoints_group_setup->unlimited_max_comments_user_object = $unlimited_max_comments_user_object;
if (!$unlimited_max_comments_user_object){
   $activitypoints_group_setup->max_comments_user_object = $max_comments_user_object;
}

$activitypoints_group_setup->add_like_points = $add_like_points;
$activitypoints_group_setup->receive_like_points = $receive_like_points;
$activitypoints_group_setup->receive_like_teacher_points = $receive_like_teacher_points;
$activitypoints_group_setup->unlimited_add_like_max_points_user = $unlimited_add_like_max_points_user;
if (!$unlimited_add_like_max_points_user){
   $activitypoints_group_setup->add_like_max_points_user = $add_like_max_points_user;
}
$activitypoints_group_setup->unlimited_receive_like_max_points_user = $unlimited_receive_like_max_points_user;
if (!$unlimited_receive_like_max_points_user){
   $activitypoints_group_setup->receive_like_max_points_user = $receive_like_max_points_user;
}
$activitypoints_group_setup->unlimited_receive_like_teacher_max_points_user = $unlimited_receive_like_teacher_max_points_user;
if (!$unlimited_receive_like_teacher_max_points_user){
   $activitypoints_group_setup->receive_like_teacher_max_points_user = $receive_like_teacher_max_points_user;
}

// Remove the activitypoints post cache
elgg_clear_sticky_form('setup_group_activitypoints');

system_message(elgg_echo("activitypoints:setup_group_saved"));

forward(elgg_get_site_url() . 'activitypoints/group/' . $container_guid);
?>