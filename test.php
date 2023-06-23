<?php

require_once('vendor/autoload.php');

use Classes\User as User;
use Classes\Comment as Comment;


$wrong1 = new User(-5,"Egor","es@ya.ru","PrivetikPrivetik");
$wrong2 = new User(1,"","es@ya.ru","PrivetikPrivetik");
$wrong3 = new User(1,"Egor","esyaru","PrivetikPrivetik");
$wrong4 = new User(1,"Egor","es@ya.ru","Pr");

$user1 = new User(2,"Egor","es@ya.ru","SnovaPrivet");
$user2 = new User(3,"Vasya","vas@ya.ru","NePrivet");
$user3 = new User(3,"Gena","gens@ya.ru","Ne2Privet");
$user4 = new User(3,"Volodya","vol@ya.ru","Ne3Privet");


echo $user1-> getDateCreate();
echo $user2-> getDateCreate();

$comments = [new Comment($user1,'Comment1'),new Comment($user2,'Comment2'),
    new Comment($user3,'Comment3'),new Comment($user4,'Comment4')];


foreach($comments as $com){
    if ($com->getUserDate() < '13/08/2002'){
        echo $com->text;
    }
}
