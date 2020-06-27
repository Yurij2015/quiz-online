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
                            <th>Дата</th>
                            <!--<th>Содержание</th>-->
                            <th>Вопрос</th>
                            <th>Ответ</th>
                            <th>Результат</th>
                            <th>Результат</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $userstats = new Userstat();
                        foreach ($userstats->getOne($_SESSION['id']) as $userstat) {
                            $id = $userstat['id'];
                            if ($userstats->getRеsult($userstat['answer']) === 1) {
                                $result = '<span class="text-success">Ответ верный!</span>';
                            } else {
                                $result = '<span class="text-danger">Ответ не верный!</span>';
                            }
                            echo "<tr>
                        <td>" . $userstat['date'] . "</td>
                        <td>" . $userstat['questionid'] . "</td>
                        <td>" . $userstat['answer'] . "</td>
                        <td>" . $userstats->getRеsult($userstat['answer']) . "</td>
                        <td>" . $result . "</td>
                      </tr>";
//                            var_dump($userstats->getRеsult($userstat['answer']));
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