<?php
include_once("../../config/config.php");
include_once("../classes/User.php");
include_once("../classes/Post.php");

$limit = 10; //Number of posts to be loaded per call

$posts = new Post($con, $_user['userLoggedIn']); 
$posts->loadPostsFriends($_user, $limit);
?>