<?php
include_once("lib/RedBeanPHP5_4_2/rb.php");
include_once("Dbsettings.php");
include_once("model/DB.php");
include_once("controller/Translate.php");
new DB($host, $port, $db_name, $user, $password);
$checking = new Translate();

//echo "blat";
$text_english = $_POST['text_english'];
$translateid = $_POST['taskwordid'];
$lessonid = $_POST['lessonid'];
$text_russian = $_POST['text_russian'];
$username = $_POST['username'];
$answer = "ответ не верный";
//$date = "";
//$date = $date("Ymd");

foreach ($checking->checkAnswer($translateid, $text_english, $text_russian) as $checkin) {
    if (count($checkin) > 0) {
        echo 'ответ верный';
        $answer = "ответ верный";
    }
}

//include_once("lib/RedBeanPHP5_4_2/rb.php");
//include_once("Dbsettings.php");
//include_once("model/DB.php");
//include_once("controller/Lesson.php");
//new DB($host, $port, $db_name, $user, $password);
//$create = new Diary();
//$create->create($translateid, $lessonid, $username, $answer);



