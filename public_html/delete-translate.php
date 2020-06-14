<?php
include_once("lib/RedBeanPHP5_4_2/rb.php");
include_once("Dbsettings.php");
include_once("model/DB.php");
new DB($host, $port, $db_name, $user, $password);
$lessonid = $_GET['lessonid'];
try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $tasktranslate = R::load('tasktranslate', $id);
        R::trash($tasktranslate);
        header("location: add-task-translate.php?lesson-id=$lessonid&msg=Запись успешно удалена!");
    }
} catch (exception $e) {
    echo "Запись нельзя удалить. Есть связанные данные!";
    echo "<br><a href = 'add-task-translate.php?lesson-id=$lessonid'>Назад</a>";
}