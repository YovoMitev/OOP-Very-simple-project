<?php
require_once 'app.php';
/** @var  $city Data\City  */

$userService = new \Services\UserService($db);
$data = $userService->viewRegistData();


if(isset($_POST['reg'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cityId = intval($_POST['city_id']);
    $confirm = $_POST['confirm'];

    if($password != $confirm){
        throw new \Exception("Password must be same as confirm password!");
    }
    if($userService->usernameExist($username)){
       throw new Exception("Username already exist");
    }
    $userService->userRegistration($username,$cityId,$password);
    header("Location: login.php");
}

include "frontends/registration_frontend.php";