<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


// General
define('TITLE', 						'Workedin');
define('YES', 									1);
define('NO', 									0);
define('ACTIVE', 								1);
define('INACTIVE', 								2);

// Users status
define('USER_ADMIN', 							1);
define('USER_EMPLOYEE', 						2);
define('USER_COMPANY', 							3);
define('USER_ACTIVE', 							1);
define('USER_NOT_ACTIVE', 						2);

// Recruitment status
define('RECRUITMENT_OPEN', 						1);
define('RECRUITMENT_POSITIVE', 					2);
define('RECRUITMENT_NEGATIVE', 					3);
define('RECRUITMENT_CLOSE', 					4);
define('RECRUITMENT_HIRED',						5);
define('RECRUITMENT_DENIED', 					6);

// Notification
define('START_WORKEDIN', 						1);
define('APPLY_VANCAY', 							2);
define('COMPANY_LIKE', 							3);
define('CANDIDATE_SELECTED', 					4);
define('CANDIDATE_NOT_SELECTED', 				5);


// Vacancy status
define('VACANCY_PRIVATE', 						1);






/* End of file constants.php */
/* Location: ./application/config/constants.php */