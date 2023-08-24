<?php
session_start();

include("./../Template/SettingApi.php");
include("./../Template/SettingAuth.php");
include("./../Template/SettingEncryption.php");
include("./../Template/SettingDatabase.php");

include("./LoginSetvice.php");

$http = new Http_Response();
$template = new Template();
$enc = new Encryption();
$cmd = new Database();

$loginService = new LoginService();

$users = $loginService->listUsers();
$http->Ok(
    [
        "data" => $users,
        "status" => 200
    ]
);
