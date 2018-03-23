<?php

session_start();

include("sql_helper.php");

$commentText=$_POST['commentText'];
$username=$_SESSION['user_name'];
$postId=$_SESSION['postid'];

$obj->insert("comments","post_id,username,comment","$postId,'$username','$commentText'");

die(header("location:newsArticleSlider.php?id=$postId"));
?>