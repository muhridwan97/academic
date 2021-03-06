<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// Super admin permission
defined('PERMISSION_ALL_ACCESS') OR define('PERMISSION_ALL_ACCESS', 'all-access');

defined('PERMISSION_ACCOUNT_EDIT') OR define('PERMISSION_ACCOUNT_EDIT', 'account-edit');
defined('PERMISSION_SETTING_EDIT') OR define('PERMISSION_SETTING_EDIT', 'setting-edit');

// Master role permission
defined('PERMISSION_ROLE_VIEW') OR define('PERMISSION_ROLE_VIEW', 'role-view');
defined('PERMISSION_ROLE_CREATE') OR define('PERMISSION_ROLE_CREATE', 'role-create');
defined('PERMISSION_ROLE_EDIT') OR define('PERMISSION_ROLE_EDIT', 'role-edit');
defined('PERMISSION_ROLE_DELETE') OR define('PERMISSION_ROLE_DELETE', 'role-delete');

// Master user permission
defined('PERMISSION_USER_VIEW') OR define('PERMISSION_USER_VIEW', 'user-view');
defined('PERMISSION_USER_CREATE') OR define('PERMISSION_USER_CREATE', 'user-create');
defined('PERMISSION_USER_EDIT') OR define('PERMISSION_USER_EDIT', 'user-edit');
defined('PERMISSION_USER_DELETE') OR define('PERMISSION_USER_DELETE', 'user-delete');

// Master department permission
defined('PERMISSION_DEPARTMENT_VIEW') OR define('PERMISSION_DEPARTMENT_VIEW', 'department-view');
defined('PERMISSION_DEPARTMENT_CREATE') OR define('PERMISSION_DEPARTMENT_CREATE', 'department-create');
defined('PERMISSION_DEPARTMENT_EDIT') OR define('PERMISSION_DEPARTMENT_EDIT', 'department-edit');
defined('PERMISSION_DEPARTMENT_DELETE') OR define('PERMISSION_DEPARTMENT_DELETE', 'department-delete');

// Master employee permission
defined('PERMISSION_EMPLOYEE_VIEW') OR define('PERMISSION_EMPLOYEE_VIEW', 'employee-view');
defined('PERMISSION_EMPLOYEE_CREATE') OR define('PERMISSION_EMPLOYEE_CREATE', 'employee-create');
defined('PERMISSION_EMPLOYEE_EDIT') OR define('PERMISSION_EMPLOYEE_EDIT', 'employee-edit');
defined('PERMISSION_EMPLOYEE_DELETE') OR define('PERMISSION_EMPLOYEE_DELETE', 'employee-delete');

// Master lecturer permission
defined('PERMISSION_LECTURER_VIEW') OR define('PERMISSION_LECTURER_VIEW', 'lecturer-view');
defined('PERMISSION_LECTURER_CREATE') OR define('PERMISSION_LECTURER_CREATE', 'lecturer-create');
defined('PERMISSION_LECTURER_EDIT') OR define('PERMISSION_LECTURER_EDIT', 'lecturer-edit');
defined('PERMISSION_LECTURER_DELETE') OR define('PERMISSION_LECTURER_DELETE', 'lecturer-delete');

// Master student permission
defined('PERMISSION_STUDENT_VIEW') OR define('PERMISSION_STUDENT_VIEW', 'student-view');
defined('PERMISSION_STUDENT_CREATE') OR define('PERMISSION_STUDENT_CREATE', 'student-create');
defined('PERMISSION_STUDENT_EDIT') OR define('PERMISSION_STUDENT_EDIT', 'student-edit');
defined('PERMISSION_STUDENT_DELETE') OR define('PERMISSION_STUDENT_DELETE', 'student-delete');

// Research  permission
defined('PERMISSION_RESEARCH_VIEW') OR define('PERMISSION_RESEARCH_VIEW', 'research-view');
defined('PERMISSION_RESEARCH_CREATE') OR define('PERMISSION_RESEARCH_CREATE', 'research-create');
defined('PERMISSION_RESEARCH_EDIT') OR define('PERMISSION_RESEARCH_EDIT', 'research-edit');
defined('PERMISSION_RESEARCH_DELETE') OR define('PERMISSION_RESEARCH_DELETE', 'research-delete');
defined('PERMISSION_RESEARCH_VALIDATE') OR define('PERMISSION_RESEARCH_VALIDATE', 'research-validate');

// Devotion  permission
defined('PERMISSION_DEVOTION_VIEW') OR define('PERMISSION_DEVOTION_VIEW', 'devotion-view');
defined('PERMISSION_DEVOTION_CREATE') OR define('PERMISSION_DEVOTION_CREATE', 'devotion-create');
defined('PERMISSION_DEVOTION_EDIT') OR define('PERMISSION_DEVOTION_EDIT', 'devotion-edit');
defined('PERMISSION_DEVOTION_DELETE') OR define('PERMISSION_DEVOTION_DELETE', 'devotion-delete');
defined('PERMISSION_DEVOTION_VALIDATE') OR define('PERMISSION_DEVOTION_VALIDATE', 'devotion-validate');

// Identity  permission
defined('PERMISSION_IDENTITY_VIEW') OR define('PERMISSION_IDENTITY_VIEW', 'identity-view');
defined('PERMISSION_IDENTITY_CREATE') OR define('PERMISSION_IDENTITY_CREATE', 'identity-create');
defined('PERMISSION_IDENTITY_EDIT') OR define('PERMISSION_IDENTITY_EDIT', 'identity-edit');
defined('PERMISSION_IDENTITY_DELETE') OR define('PERMISSION_IDENTITY_DELETE', 'identity-delete');

// Study permission
defined('PERMISSION_STUDY_VIEW') OR define('PERMISSION_STUDY_VIEW', 'study-view');
defined('PERMISSION_STUDY_CREATE') OR define('PERMISSION_STUDY_CREATE', 'study-create');
defined('PERMISSION_STUDY_EDIT') OR define('PERMISSION_STUDY_EDIT', 'study-edit');
defined('PERMISSION_STUDY_DELETE') OR define('PERMISSION_STUDY_DELETE', 'study-delete');

// Review_curriculum permission
defined('PERMISSION_REVIEW_CURRICULUM_VIEW') OR define('PERMISSION_REVIEW_CURRICULUM_VIEW', 'review-curriculum-view');
defined('PERMISSION_REVIEW_CURRICULUM_CREATE') OR define('PERMISSION_REVIEW_CURRICULUM_CREATE', 'review-curriculum-create');
defined('PERMISSION_REVIEW_CURRICULUM_EDIT') OR define('PERMISSION_REVIEW_CURRICULUM_EDIT', 'review-curriculum-edit');
defined('PERMISSION_REVIEW_CURRICULUM_DELETE') OR define('PERMISSION_REVIEW_CURRICULUM_DELETE', 'review-curriculum-delete');

// Content permission
defined('PERMISSION_CONTENT_VIEW') OR define('PERMISSION_CONTENT_VIEW', 'content-view');
defined('PERMISSION_CONTENT_CREATE') OR define('PERMISSION_CONTENT_CREATE', 'content-create');
defined('PERMISSION_CONTENT_EDIT') OR define('PERMISSION_CONTENT_EDIT', 'content-edit');
defined('PERMISSION_CONTENT_DELETE') OR define('PERMISSION_CONTENT_DELETE', 'content-delete');

// Alumni permission
defined('PERMISSION_ALUMNI_VIEW') OR define('PERMISSION_ALUMNI_VIEW', 'alumni-view');
defined('PERMISSION_ALUMNI_CREATE') OR define('PERMISSION_ALUMNI_CREATE', 'alumni-create');
defined('PERMISSION_ALUMNI_EDIT') OR define('PERMISSION_ALUMNI_EDIT', 'alumni-edit');
defined('PERMISSION_ALUMNI_DELETE') OR define('PERMISSION_ALUMNI_DELETE', 'alumni-delete');

// Menu permission
defined('PERMISSION_MENU_VIEW') OR define('PERMISSION_MENU_VIEW', 'menu-view');
defined('PERMISSION_MENU_CREATE') OR define('PERMISSION_MENU_CREATE', 'menu-create');
defined('PERMISSION_MENU_EDIT') OR define('PERMISSION_MENU_EDIT', 'menu-edit');
defined('PERMISSION_MENU_DELETE') OR define('PERMISSION_MENU_DELETE', 'menu-delete');

// Page permission
defined('PERMISSION_PAGE_VIEW') OR define('PERMISSION_PAGE_VIEW', 'page-view');
defined('PERMISSION_PAGE_CREATE') OR define('PERMISSION_PAGE_CREATE', 'page-create');
defined('PERMISSION_PAGE_EDIT') OR define('PERMISSION_PAGE_EDIT', 'page-edit');
defined('PERMISSION_PAGE_DELETE') OR define('PERMISSION_PAGE_DELETE', 'page-delete');
defined('PERMISSION_PAGE_MANAGE') OR define('PERMISSION_PAGE_MANAGE', 'page-manage');

// Blog permission
defined('PERMISSION_BLOG_VIEW') OR define('PERMISSION_BLOG_VIEW', 'blog-view');
defined('PERMISSION_BLOG_CREATE') OR define('PERMISSION_BLOG_CREATE', 'blog-create');
defined('PERMISSION_BLOG_EDIT') OR define('PERMISSION_BLOG_EDIT', 'blog-edit');
defined('PERMISSION_BLOG_DELETE') OR define('PERMISSION_BLOG_DELETE', 'blog-delete');
defined('PERMISSION_BLOG_MANAGE') OR define('PERMISSION_BLOG_MANAGE', 'blog-manage');

// Category permission
defined('PERMISSION_CATEGORY_VIEW') OR define('PERMISSION_CATEGORY_VIEW', 'category-view');
defined('PERMISSION_CATEGORY_CREATE') OR define('PERMISSION_CATEGORY_CREATE', 'category-create');
defined('PERMISSION_CATEGORY_EDIT') OR define('PERMISSION_CATEGORY_EDIT', 'category-edit');
defined('PERMISSION_CATEGORY_DELETE') OR define('PERMISSION_CATEGORY_DELETE', 'category-delete');
defined('PERMISSION_CATEGORY_MANAGE') OR define('PERMISSION_CATEGORY_MANAGE', 'category-manage');

// Training permission
defined('PERMISSION_TRAINING_MANAGE') OR define('PERMISSION_TRAINING_MANAGE', 'training-manage');
defined('PERMISSION_TRAINING_VIEW') OR define('PERMISSION_TRAINING_VIEW', 'training-view');
defined('PERMISSION_TRAINING_CREATE') OR define('PERMISSION_TRAINING_CREATE', 'training-create');
defined('PERMISSION_TRAINING_EDIT') OR define('PERMISSION_TRAINING_EDIT', 'training-edit');
defined('PERMISSION_TRAINING_DELETE') OR define('PERMISSION_TRAINING_DELETE', 'training-delete');

// Exam permission
defined('PERMISSION_EXAM_MANAGE') OR define('PERMISSION_EXAM_MANAGE', 'exam-manage');
defined('PERMISSION_EXAM_ASSESS') OR define('PERMISSION_EXAM_ASSESS', 'exam-assess');
defined('PERMISSION_EXAM_VIEW') OR define('PERMISSION_EXAM_VIEW', 'exam-view');
defined('PERMISSION_EXAM_CREATE') OR define('PERMISSION_EXAM_CREATE', 'exam-create');
defined('PERMISSION_EXAM_EDIT') OR define('PERMISSION_EXAM_EDIT', 'exam-edit');
defined('PERMISSION_EXAM_DELETE') OR define('PERMISSION_EXAM_DELETE', 'exam-delete');
