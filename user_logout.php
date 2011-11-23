<?php

/* $Id: user_logout.php 239 2009-11-14 00:04:15Z john $ */

$page = "user_logout";
include "header.php";

//print_r($_SESSION);

//echo $_GET['token'] . ' = ' . $session->get('token') . ' = ' . $_SERVER['REQUEST_METHOD'] ;

if( @$_GET['token'] == $session->get('token') || strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' ) {
  $user->user_logout();
}

// FORWARD TO USER LOGIN PAGE
cheader("home.php");
exit();
?>