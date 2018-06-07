<?php
//===============================================
// Debug
//===============================================
ini_set('display_errors','On');
error_reporting(E_ALL);

//===============================================
// mod_rewrite
//===============================================
//Please configure via .htaccess or httpd.conf

//===============================================
// Madatory KISSMVC Settings (please configure)
//===============================================
//if ( !defined('ABSPATH') )
//define('ABSPATH', dirname(__FILE__) . '/');

define('APP_PATH','app/'); //with trailing slash pls
define('WEB_FOLDER','/catalog_v5/'); //with trailing slash pls

//===============================================
// Other Settings
//===============================================
define('WEB_DOMAIN','http://localhost'); //with http:// and NO trailing slash pls
define('VIEW_PATH','app/views/'); //with trailing slash pls

//===============================================
// Includes
//===============================================
require('kissmvc.php');
require(APP_PATH.'inc/functions.php');

//===============================================
// Session
//===============================================
ini_set('session.use_cookies', 1);
ini_set('session.use_only_cookies', 1);
session_start();

//===============================================
// Globals
//===============================================
$GLOBALS['sitename'] = 'Catalog clasele 9 -12';

//pagination config
$GLOBALS['pagination']['full_tag_open'] = '<span class="pagination">';
$GLOBALS['pagination']['full_tag_close'] = "</span><br />\n<br />\n";
$GLOBALS['pagination']['cur_tag_open'] = '&nbsp;<span>';
$GLOBALS['pagination']['cur_tag_close'] = '</span>';
$GLOBALS['pagination']['first_link'] = '&lt;&lt;';
$GLOBALS['pagination']['last_link'] = '&gt;&gt;';
$GLOBALS['pagination']['num_links'] = 2;
$GLOBALS['pagination']['per_page'] = 5;

//===============================================
// Uncaught Exception Handling
//===============================================s
set_exception_handler('uncaught_exception_handler');

function uncaught_exception_handler($e) {
  ob_end_clean(); //dump out remaining buffered text
  $vars['message']=$e;
  die(View::do_fetch(APP_PATH.'errors/exception_uncaught.php',$vars));
}

function custom_error($msg='') {
  $vars['msg']=$msg;
  die(View::do_fetch(APP_PATH.'errors/custom_error.php',$vars));
}

//===============================================
// Database
//===============================================
/*function getdbh() {
  if (!isset($GLOBALS['dbh']))
    try {
      $GLOBALS['dbh'] = new PDO('sqlite:'.APP_PATH.'db/kissmvc.sqlite'); //make sure folder is writable!
      //$GLOBALS['dbh'] = new PDO('mysql:host=localhost;dbname=dbname', 'username', 'password');
    } catch (PDOException $e) {
      die('Connection failed: '.$e->getMessage());
    }
  return $GLOBALS['dbh'];
}
	function getdbh() {
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "login_system";
			$charset = "utf8mb4";
			try {
				$data_source_name = "mysql:host = ".$servername.";dbname=".$dbname.";charset=".$charset;
				$pdo = new PDO($data_source_name, $username, $password);
				$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo "Connection successful to database!<br>";
				return $pdo;
				$pdo = null;
			}
			catch (PDOException $error) {
				echo "Connection failed: ".$error->getMessage();
			}
	}*/

	function getdbh() {
		if (!isset($GLOBALS['dbh']))
			try {
      //$GLOBALS['dbh'] = new PDO('sqlite:'.APP_PATH.'db/dbname.sqlite');
				$dbname = "login_system";
				$username = "root";
				$password = "";
				$GLOBALS['dbh'] = new PDO('mysql:host=localhost;dbname='.$dbname, $username, $password);
			} catch (PDOException $e) {
				die('Connection failed: '.$e->getMessage());
				}
		return $GLOBALS['dbh'];
	}


//===============================================
// Autoloading for Business Classes
//===============================================
// Assumes Model Classes start with capital letters and Helpers start with lower case letters
function __autoload($classname) {
  $a = $classname[0];
  if ($a >= 'A' && $a <='Z')
    require_once(APP_PATH.'models/'.$classname.'.php');
  else
    require_once(APP_PATH.'helpers/'.$classname.'.php');  
}

//===============================================
// Start the controller
//===============================================
$controller = new Controller(APP_PATH.'controllers/',WEB_FOLDER,'main','index');