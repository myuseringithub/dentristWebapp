<?php // If Logged in && (Admin || Member)
global $current_user, $wpdb;
// $role = $wpdb->prefix . 'capabilities';
// $current_user->role = array_keys($current_user->$role);
// $role = $current_user->role[0];

$is_a_member = SZN\WPExtend\Visitor::isCurrentUserInGroup('MCQs');  // Member of MCQ.

if(is_user_logged_in() && (in_array('administrator', $current_user->roles) || $is_a_member)) {
  return 'loggedin&(admin||member)';
} elseif(is_user_logged_in()) {
  return 'loggedin';
} else {
  return 'notlogged';
}
