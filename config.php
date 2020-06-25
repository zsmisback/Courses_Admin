<?php
ini_set( "display_errors", true );
date_default_timezone_set( "Australia/Sydney" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=courses_website" );
define( "DB_USERNAME", "root" );
define( "DB_PASSWORD", "" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define("CATEGORY_IMAGE_PATH" , "Profilepics/Courses");
define( "IMG_TYPE_FULLSIZE", "fullsize" );
define( "IMG_TYPE_THUMB", "thumb" );
define( "CATEGORY_THUMB_WIDTH", 120 );
define( "JPEG_QUALITY", 85 );
require( CLASS_PATH . "/courses.php" );
require( CLASS_PATH . "/lessons.php" );
require( CLASS_PATH . "/comments.php" );
require( CLASS_PATH . "/admins.php" );
function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>