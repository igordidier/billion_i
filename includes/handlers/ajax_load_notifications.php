<?php
include_once("../../config/config.php");
include_once("../classes/user.php");
include("../classes/notification.php");

$limit = 7;

$notification = new Notification($con, $_REQUEST['userLoggedIn']);
echo $notification->getNotifications($_REQUEST, $limit);
?>
