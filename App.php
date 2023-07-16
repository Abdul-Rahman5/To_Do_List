<?php
// use TodoList\Request\Request;
require_once "inc/connection.php";
require_once "classes/Request.php";
require_once "classes/session.php";
require_once "classes/Validation/Rquired.php";
require_once "classes/Validation/Str.php";
require_once "classes/Validation/validateClass.php";

$request = new Request;
$session = new Session ;
$validation = new ValidationClass ;
