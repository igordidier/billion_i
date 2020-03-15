<?php
include_once("../../config/config.php");
include_once("../classes/user.php");
include_once("../classes/post.php");

$limit = 10; //Number of posts to be loaded per call

$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadAllPosts($_REQUEST, $limit);
?>
