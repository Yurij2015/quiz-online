<?php
session_start();
$title = "Авторизация в системе";
require_once("forms/LoginForm.php");
require_once('DBA.php');
require_once('includes/Password.php');
require_once('includes/Session.php');
require_once('Dbsettings.php');

$msg = '';

try {
    $db = new DBA($host, $user, $password, $db_name, $port);
} catch (Exception $e) {
}
$form = new LoginForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $username = $db->escape($form->getUsername());
        $password = new Password($db->escape($form->getPassword()));
        try {
            $res = $db->query("SELECT * FROM auth_user WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
        } catch (Exception $e) {
        }
        if (!$res) {
            $msg = 'Пользователя с таким учетными данными нет';
        } else {
            $username = $res[0]['username'];
            Session::set('username', $username);
            $userid = $res[0]['id'];
            Session::set('id', $userid);
            header('location: lessons.php?msg=Вы авторизированы на сайте');
        }
    } else {
        $msg = 'Пожалуйста, заполните все поля';
    }
}
include_once('includes/header.php');
?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="text-center">Учебные курсы </h1>
                    <p class="text-center">Обучение английскому языку</p>
                    <img src="images/LearningResearch.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
    <div class="row">
        <div class="text-center col-md-12 col-12">
            <div class="container page-middle">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="fat-title">Обучение английскому языку</h2>
                        <span class="h2-description">
						Методика быстрого и качественного освоения английского языка
            </span>
                    </div>
                    <div class="col-md-6">
                        <form class="custom-form" method="post">
                            <h4>Войти</h4>
                            <label>
                                <input type='text' placeholder='Login' class='form-control custom-input' name="username"
                                       value="<?= $form->getUsername(); ?>">
                            </label>
                            <label>
                                <input type="password" placeholder="Password" class="form-control custom-input"
                                       name="password">
                            </label>
                            <input type="submit" value="Войти" class="btn custom-btn">
                            <div class="bottom-link">
                                <a href="#">У меня нет аккаунта!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once('includes/footer.php'); ?>