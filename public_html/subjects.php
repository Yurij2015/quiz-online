<?php
session_start();
$title = "Дисциплины (темы) тестов";
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include_once("lib/RedBeanPHP5_4_2/rb.php");
                    include_once("Dbsettings.php");
                    include_once("model/DB.php");
                    include_once("controller/Subject.php");
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
                        <!--<td><a href='lesson-in-subject.php?id-subject=$id' class='btn btn-info btn-sm float-right'>Тесты по предмету</a>
                        <a href='edit-category.php?id=$id' class='btn btn-info btn-sm float-right mr-1'>Редактировать</a>
                        <a href='delete-test.php?id=$id' class='btn btn-warning btn-sm float-right mr-1' onclick='return confirmDelete();'>Удалить</a></td>-->
                      </tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <a href="add-subject.php" class="btn btn-primary">Добавить дисцплину</a>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>