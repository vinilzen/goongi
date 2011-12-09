<?php

/* $Id: admin_header_history.php 5 2009-01-11 06:01:16Z john $ */

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
defined('SE_PAGE') or exit();

// INCLUDE historyS CLASS FILE
include "../include/class_history.php";

// INCLUDE historyS FUNCTION FILE
include "../include/functions_history.php";


// SET HOOKS
SE_Hook::register("se_user_delete", 'deleteuser_history');

SE_Hook::register("se_site_statistics", 'site_statistics_history');

?>