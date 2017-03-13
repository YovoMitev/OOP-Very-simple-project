<?php
require_once "app.php";
/** @var $user Data\User */

$userService = new \Services\UserService($db);
$user = $userService->getUserInfo($_SESSION['userId']);

if(isset($_POST["logout"])){

    $success = $userService->logout();
    if(!$success){
        throw new Exception("Something went wrong with logout.Try again!");
    }

    header("Location: welcome.php");

}

if(isset($_POST['EditUser'])){
    $username = $_POST['newUsername'];
    $password = $_POST['newPassword'];

    if($username == "" || $password == ""){
        throw new \Exception("Invalid username or password.Must be non-empty string!");
    }

    if(!$userService->editUserInfo($username,$password,$_SESSION['userId'])){
        throw new \Exception("Something went wrong.Try again!");
    }

    header("Location: welcome_user.php");
}

include "frontends/welcomeUser_frontend.php";

