<?php
session_start();
$title = "Уроки";
$msg = '';
include_once('../includes/header.php');
?>
    <div class="banner padd mt-5">
        <div class="container">
            <img class="img-responsive" src="img/crown-white.png" alt=""/>
            <h2 class="white"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="inner-page padd">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="aside">
                        <a href="index.php">Мой профиль</a>
                    </div>
                    <div class="aside">
                        <a href="subjects.php">Темы (курсы) </a>
                    </div>
                    <div class="aside aside-active">
                        <a href="lessons.php">Уроки</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php
                    include_once("../lib/RedBeanPHP5_4_2/rb.php");
                    include_once("../Dbsettings.php");
                    include_once("../model/DB.php");
                    include_once("../controller/Lesson.php");
                    include_once("../controller/Tutor.php");
                    include_once("../controller/Subject.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Описание</th>
                            <!--<th>Содержание</th>-->
                            <th>Автор</th>
                            <th>Категория</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tutor = new Tutor();
                        $lessons = new Test();
                        $category = new Subject();
                        foreach ($lessons->get() as $lesson) {
                            $id = $lesson['id'];
                            echo "<tr>
                        <td>" . $id . "</td>
                        <td>" . $lesson['title'] . "</td>
                        <td>" . $lesson['summary'] . "</td>
                        <td>" . $tutor->getTutor($lesson['tutor_id']) . "</td>
                        <td>" . $category->getCategory($lesson['subject_id']) . "</td>
                        <td><a href='view-lesson.php?id=$id' class='btn btn-info btn-sm'>Открыть</a></td>
                        <td><a href='delete-lesson.php?id=$id' class='btn btn-warning btn-sm' onclick='return confirmDelete();'>Удалить</a></td>
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!--                    <a href="add-lesson.php" class="btn btn-warning">Добавить урок</a>-->
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>