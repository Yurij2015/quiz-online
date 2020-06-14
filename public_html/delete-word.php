<?php
include_once("lib/RedBeanPHP5_4_2/rb.php");
include_once("Dbsettings.php");
include_once("model/DB.php");
new DB($host, $port, $db_name, $user, $password);
$lessonid = $_GET['lessonid'];
try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $taskword = R::load('taskword', $id);
        R::trash($taskword);
        header("location: add-word-to-lesson.php?lesson-id=$lessonid&msg=Запись успешно удалена!");
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'add-word-to-lesson.php?lesson-id=$lessonid'>Назад</a>";
}