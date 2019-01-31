<?php
/**
 * Created by PhpStorm.
 * User: SUMUKHA SHARMA
 * Date: 27-11-2018
 * Time: 14:37
 */
session_start();
unset($_SESSION['username']);
session_destroy();
header('location:login.php');