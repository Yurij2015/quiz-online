<?php
session_start();
$title = "Регистрация в системе";
require_once("forms/RegistrationForm.php");
require_once('DBA.php');
require_once('includes/Password.php');
require_once('includes/Session.php');
require_once('Dbsettings.php');
$msg = '';
try {
    $db = new DBA($host, $user, $password, $db_name, $port);
} catch (Exception $e) {
}
$form = new RegistrationForm($_POST);
if ($_POST) {
    if ($form->validate()) {
        $username = $db->escape($form->getUsername());
        $password = new Password($db->escape($form->getPassword()));
        $passwordConfirm = new Password($db->escape($form->getPasswordConfirm()));
        $res = $db->query("SELECT * FROM `auth_user` WHERE username = '{$username}'");
        if ($res) {
            $msg = 'Пользователь с таким эл. адресом уже существует!';
        } else {
            $db->query("INSERT INTO `auth_user` (username, password) VALUES ('{$username}', '{$password}')");
            $msg = "Регистрация прошла успешно, можете войти на сайт";
            header('location: login.php?msg=Вы зарегистрированы на сайте');
        }
    } else {
        $msg = $form->passwordsMatch() ? 'Пожалуйста, заполните все поля' : 'Пароли не совпадают';
    }
}
include_once('includes/header.php');
?>
    <div class="container mt-2 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="text-center">QuizService</h1>
                    <p class="text-center">Система тестирования</p>
                    <img src="images/Quiz.jpg" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
    <div class="row">
        <div class="text-center col-md-12 col-12">
            <div class="container page-middle">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                            <h4>Регистрация</h4>
                            <label>
                                <input type='text' name="username" placeholder='Login'
                                       class='form-control' value="<?= $form->getUsername() ?>">
                            </label>
                            <label>
                                <input type="password" name="password" placeholder="Password"
                                       class="form-control">
                            </label>
                            <label>
                                <input type="password" class="form-control" id="passwordConfirm"
                                       placeholder="Проверка пароля"
                                       name="passwordConfirm">
                            </label>
                            <label>
                                <select name="role" id="role" class="form-control">
                                    <option value="1">Student</option>
                                    <option value="2">Tutor</option>
                                </select>
                            </label>
                            <input type="submit" value="Регистрация" class="btn btn-primary">
                            <div class="bottom-link">
                                <a href="#">У меня есть аккаунт!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Подключение скриптов -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/main.js"></script>
<?php include_once('includes/footer.php'); ?>