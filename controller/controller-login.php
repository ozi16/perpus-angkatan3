<?php
session_start();
session_regenerate_id(true);

if (isset($_POST['login'])) {
    $users = [[
        "name" => "Fahrurozi",
        "email" => "fahrurozi@gmail.com",
        "password" => "1234",
    ], [
        "name" => "Tasya",
        "email" => "tasya@gmail.com",
        "password" => "5678",
    ], [
        "name" => "Nina",
        "email" => "nina@gmail.com",
        "password" => "9012",
    ]];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkLogin = false;

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['nama'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $checkLogin = true;
            break;
        }
    }
    if ($checkLogin) {
        header('location:../index.php');
        exit;
    } else {
        header('location:../index.php?error=login-gagal');
        exit;
    }
}
