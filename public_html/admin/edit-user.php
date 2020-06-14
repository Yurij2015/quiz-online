<?php
if ($_POST) {
    $username = trim(htmlspecialchars($_POST['username']));
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $last_name = trim(htmlspecialchars($_POST['last_name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $is_staff = ($_POST['is_staff']);
    $id = $_POST['id'];
    if (!empty($username)) {
        include_once("../lib/RedBeanPHP5_4_2/rb.php");
        include_once("../Dbsettings.php");
        include_once("../model/DB.php");
        include_once("../controller/User.php");
        new DB($host, $port, $db_name, $user, $password);
        $update = new User();
        $update->updateAdmin($username, $first_name, $last_name, $email, $is_staff, $id);
        header('location: index.php?msg=Запись успешно обновлена!');
    }
}
?>
<?php
session_start();
$title = "Редактирование";
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
                <div class="col-md-3">
                    <div class="aside">
                        <a href="#" onclick="alert('Страница в разработке')">Мой профиль</a>
                    </div>
                    <div class="aside aside-active">
                        <a href="../admin">Пользователи</a>
                    </div>
                    <div class="aside">
                        <a href="../subjects.php">Темы (курсы) </a>
                    </div>
                    <div class="aside">
                        <a href="../lessons.php">Уроки</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php
                    include_once("../lib/RedBeanPHP5_4_2/rb.php");
                    include_once("../Dbsettings.php");
                    include_once("../model/DB.php");
                    include_once("../controller/User.php");
                    new DB($host, $port, $db_name, $user, $password);
                    ?>
                    <?php
                    $id = $_GET['id'];
                    $categories = new User();
                    foreach ($categories->getUser($id) as $category) {
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Логин пользователя</label>
                                <input type="text" class="form-control" id="username"
                                       placeholder="Логин пользователя"
                                       name="username"
                                       value="<?= $category['username'] ?>">
                                <input name="id" hidden value="<?= $category['id'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="first_name">Имя пользователя </label>
                                <input type="text" class="form-control" id="first_name"
                                       placeholder="Имя пользователя"
                                       name="first_name"
                                       value="<?= $category['first_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Фамилия пользователя</label>
                                <input type="text" class="form-control" id="last_name"
                                       placeholder="Фамилия пользователя"
                                       name="last_name"
                                       value="<?= $category['last_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Электронный адрес</label>
                                <input type="text" class="form-control" id="email"
                                       placeholder="Электронный адрес"
                                       name="email"
                                       value="<?= $category['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="is_staff">Роль</label>
                                <select type="text" class="form-control" id="is_staff"
                                        name="is_staff">
                                    <option value="3">Student</option>
                                    <option value="2">Tutor</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a href="index.php" class="btn btn-primary">Отмена</a>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('../includes/footer.php'); ?>