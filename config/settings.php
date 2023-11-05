<?php
session_start();
if (empty($_SESSION['message']))
    $_SESSION['message'] = [];





require_once("config/database.php");
require_once("config/class/GenderClass.php");
require_once("config/class/MovieClass.php");
require_once("config/functions.php");
require_once("config/core.php");
