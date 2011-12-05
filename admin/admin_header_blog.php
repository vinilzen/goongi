<?php

/* $Id: admin_header_blog.php 5 2009-01-11 06:01:16Z john $ */

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
defined('SE_PAGE') or exit();

// INCLUDE BLOGS CLASS FILE
include "../include/class_blog.php";

// INCLUDE BLOGS FUNCTION FILE
include "../include/functions_blog.php";


// SET HOOKS
SE_Hook::register("se_user_delete", 'deleteuser_blog');

SE_Hook::register("se_site_statistics", 'site_statistics_blog');

?>