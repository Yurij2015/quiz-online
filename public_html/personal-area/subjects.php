<?php
session_start();
$title = "Темы (курсы)";
$msg = '';
include_once('../includes/header.php');
?>
    <div class="banner padd mt-5">
        <div class="container">
            <h2 class="white"><?= $title ?></h2>
            <ol class="breadcrumb">
                <li class="mr-1"><a href="index.php">Главная</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="inner-page padd">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="aside">
                        <a href="admin">Пользователи</a>
                    </div>
                    <div class="aside aside-active">
                        <a href="subjects.php">Темы (курсы) </a>
                    </div>
                    <div class="aside">
                        <a href="lessons.php">Уроки</a>
                    </div>
                </div>
                <div class="col-md-9">                    <?php
                    include_once("../lib/RedBeanPHP5_4_2/rb.php");
                    include_once("../Dbsettings.php");
                    include_once("../model/DB.php");
                    include_once("../controller/Subject.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $categories = new Subject();
                        foreach ($categories->get() as $category) {
                            $id = $category['id'];
                            echo "<tr>
                        <td>" . $id . "</td>
                        <td>" . $category['name'] . "</td>
                        <td><a href='/lesson-in-subject.php?id-subject=$id' class='btn btn-info btn-sm float-right'>Учебные материалы темы (курса)</a></td>
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>