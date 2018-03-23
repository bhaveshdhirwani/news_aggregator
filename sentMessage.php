<?php
include('sql_helper.php');

$name=$_REQUEST['senderName'];
$email=$_REQUEST['senderMail'];
$message=$_REQUEST['message'];

$obj->insert("messages","email,name,message","'$email','$name','$message'");		

header("Location: contactUs.php");
?>