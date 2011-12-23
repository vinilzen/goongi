<?php

/* $Id: admin_header_album.php 2 2009-01-10 20:53:09Z john $ */

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
defined('SE_PAGE') or exit();

// INCLUDE ALBUM CLASS FILE
include "../include/class_album.php";

// INCLUDE ALBUM FUNCTION FILE
include "../include/functions_album.php";


// SET HOOKS
SE_Hook::register("se_user_delete", 'deleteuser_album');

SE_Hook::register("se_site_statistics", 'site_statistics_album');

?>