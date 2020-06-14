<?php
session_start();
$title = "Статистика";
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
                <div class="col-md-12">
                    <?php
                    include_once("../lib/RedBeanPHP5_4_2/rb.php");
                    include_once("../Dbsettings.php");
                    include_once("../model/DB.php");
                    include_once("../controller/Userstat.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Имя пользователя</th>
                            <th>Дата</th>
                            <!--<th>Содержание</th>-->
                            <th>Дисциплина</th>
                            <th>Тест</th>
                            <th>Результат</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $userstats = new Userstat();
                        foreach ($userstats->get() as $userstat) {
                            $id = $userstat['id'];
                            echo "<tr>
                        <td>" . $userstat['username'] . "</td>
                        <td>" . $userstat['data'] . "</td>
                        <td>" . $userstat['lesson'] . "</td>
                        <td>" . $userstat['rating'] . "</td>

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