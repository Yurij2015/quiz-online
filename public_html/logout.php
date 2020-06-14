<?php
session_start();
require_once('includes/Session.php');

Session::destroy();

header('Location: index.php?msg=Вы вышли!');