<?php
session_start();
$title = "Тесты";
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
                    include_once("../controller/Test.php");
                    include_once("../controller/Discipline.php");
                    include_once("../controller/Userstat.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <h4>Все тесты</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Наименование</th>
                            <th>Статус</th>
                            <th>Дисциплина</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tests = new Test();
                        $discipline = new Discipline();
                        foreach ($tests->getAcitveTests() as $test) {
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
                            $testname = $test['name'];
                            echo "<tr>
                        <td>" . $testname . "</td>
                        <td>" . $value . "</td>
                        <td>" . $discipline->getDiscipline($test['disciplinesid']) . "</td>

                        <td><a href='view-test-questions.php?id=$id&testname=$testname' class='btn btn-info btn-sm'>Открыть тест</a></td>
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <h4>Тесты в процессе прохождения</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Тест</th>
                            <th>Статус</th>
                            <th>Дисциплина</th>
                            <th>Текущий рейтинг</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $userstats = new Userstat();
                        $discipline = new Discipline();
                        foreach ($userstats->getStatistic($_SESSION['id']) as $userstat) {
                            switch ($userstat['status']) {
                                case 1:
                                    $value = "active";
                                    $style = "text-primary";
                                    break;
                                case 0:
                                    $value = "inactive";
                                    $style = "text-danger";
                                    break;
                            }
                            $id = $userstat['id'];
                            $testid = $userstat['testid'];
                            $testname = $userstat['name'];
                            echo "<tr>
                        <td>" . $userstat['name'] . "</td>
                        <td>" . $value . "</td>

                        <td>" . $discipline->getDiscipline($userstat['disciplinesid']) . "</td>

                        <td>" . $userstat['result'] . "</td>
                        <td><a href='view-test-questions.php?id=$testid&testname=$testname' class='btn btn-info btn-sm'>Открыть тест</a></td>


                      </tr>";
//                            var_dump($userstats->getRеsult($userstat['answer']));
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>