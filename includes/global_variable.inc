<?php
session_start();

global $auth_token;
$auth_token='auth_token';

global $expires_token;
$expires_token = 3600;

global $success_msg;
$success_msg = (String)'success_msg';

global $maxClient;
$maxClient = 7;

global $hideClientCounter;
$hideClientCounter = 1;
