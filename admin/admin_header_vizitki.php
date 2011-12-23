<?php

/* $Id: admin_header_vizitki.php 5 2009-01-11 06:01:16Z john $ */

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
defined('SE_PAGE') or exit();

// INCLUDE vizitkiS CLASS FILE
include "../include/class_vizitki.php";

// INCLUDE vizitkiS FUNCTION FILE
include "../include/functions_vizitki.php";


// SET HOOKS
SE_Hook::register("se_user_delete", 'deleteuser_vizitki');

SE_Hook::register("se_site_statistics", 'site_statistics_vizitki');

?>