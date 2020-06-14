<?php
session_start();
$title = "Личный кабинет";
$msg = '';
include_once('../includes/header.php');
?>
    <div class="banner padd">
        <div class="container">
            <img class="img-responsive" src="" alt=""/>
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
                    <div class="col-md-12">
                        <?php
                        include_once("../lib/RedBeanPHP5_4_2/rb.php");
                        include_once("../Dbsettings.php");
                        include_once("../model/DB.php");
                        include_once("../controller/User.php");
                        new DB($host, $port, $db_name, $user, $password);
                        ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Логин</th>
                                <th>Имя пользователя</th>
                                <th>Фамилия пользователя</th>
                                <th>Электронная почта</th>
                                <th>Роль</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $users = new User();
                            $username = $_SESSION['username'];
                            foreach ($users->getOne($username) as $user) {
                                $id = $user['id']; ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['first_name'] ?></td>
                                    <td><?= $user['last_name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td>
                                        <?php
                                        switch ($user['is_staff']) {
                                            case 1:
                                                echo "Admin";
                                                break;
                                            case 2:
                                                echo "Tutor";
                                                break;
                                            case 3:
                                                echo "Student";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td><a href='edit-user.php?id=<?= $id ?>'
                                           class='btn btn-info btn-sm float-right mr-1'>Редактировать</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="userlessons.php" class="btn btn-outline-warning">Мои тесты</a>

                    <a href="userstat.php" class="btn btn-outline-warning">Статистика</a>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>