<?php
session_start();
$title = "Тесты";
$msg = '';
include_once('includes/header.php');
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
                    include_once("lib/RedBeanPHP5_4_2/rb.php");
                    include_once("Dbsettings.php");
                    include_once("model/DB.php");
                    include_once("controller/Test.php");
                    include_once("controller/Discipline.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Наименование</th>
                            <th>Статус</th>
                            <th>Дисциплина</th>
                            <th>Иерархия</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tests = new Test();
                        $discipline = new Discipline();
                        foreach ($tests->get() as $test) {
                            switch ($test['status']) {
                                case 1:
                                    $value = "active";
                                    $style = "text-primary";
                                    break;
                                case 0:
                                    $value = "inactive";
                                    $style = "text-danger";
                                    break;
                            }
                            $id = $test['id'];
                            echo "<tr>
                        <td>" . $test['name'] . "</td>
                        <td>" . $value . "</td>
                        <td>" . $discipline->getDiscipline($test['disciplinesid']) . "</td>
                        <td>" . $tests->getParent($test['parent']) . "</td>
                        <td><a href='view-test-questions.php?id=$id' class='btn btn-info btn-sm'>Открыть</a></td>
                        <!--<td><a href='delete-test.php?id=$id' class='btn btn-warning btn-sm' onclick='return confirmDelete();'>Удалить</a></td>-->
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <a href="add-test.php" class="btn btn-warning">Добавить тест</a>
                    <a href="add-question.php" class="btn btn-warning">Добавить вопрос в тест</a>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>