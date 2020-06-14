<?php
include_once("lib/RedBeanPHP5_4_2/rb.php");
include_once("Dbsettings.php");
include_once("model/DB.php");
$lessonid = $_GET['lessonid'];
try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $markers= R::load('taskword', $id);
        R::trash($markers);
        header("location: add-word-to-lesson.php?lesson-id=$lessonid&msg=Запись успешно удалена!");
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'add-word-to-lesson.php?lesson-id=$lessonid'>Назад</a>";
}