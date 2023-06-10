<?php
//use Lab1\User;
require "vendor/autoload.php";
require_once "User.php";
require_once "Comment.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

$correctUser = new User(123, "Yana", "yana0219@gmail.com", "st8l320vfd");
$incorrectUser1 = new User(101, "tanya" , "tatyana@mail.ru", "drkuaeo9");
$incorrectUser2 = new User(195, "Kolya", "kolyaEmail", "12d3");

$comm = new Comment($correctUser , "I'm correct user!");
$comm2 = new Comment($incorrectUser1, "Hi! My name is not correct");
$comm3 = new Comment($incorrectUser1, "1234567");
$comm4 = new Comment($incorrectUser2, "I'm glad to see you again! :D");
$dictionary = [$comm, $comm2, $comm3, $comm4];

$datetime = new DateTime('2019-03-21 21:01:54');
foreach ($dictionary as $item){
    if($datetime >  $item->user->dateTimeCreation()){
        echo "$item->message".'<br>';
    }
}

?>