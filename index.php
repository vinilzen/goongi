<?php

/* $Id: index.php 8 2009-01-11 06:02:53Z john $ */
if( $user->user_exists)
header("Location: home.php");
else
header("Location: login.php");
exit();
?>