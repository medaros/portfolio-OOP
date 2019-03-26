<?php
session_start();
require "Controller/controller.php";

$controller = new controller\Controller;

$controller->handler();