<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        } else {
            echo "Учебные курсы";
        }
        ?>
    </title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <script src="../lib/tinymce/js/tinymce/tinymce.js" referrerpolicy="origin"></script>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">

    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script>
        tinymce.init({
            selector: '#content',
            plugins: "print",
            // toolbar: "print",
            language: 'ru',
            height: "480",
        });
    </script>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand text-black-50 font-weight-bold" href="/">QuizService</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/"><strong>Главная </strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../tests.php">Тесты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../subjects.php">Дисциплины</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../personal-area">Личный кабинет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../personal-area/userstat.php">Статистика</a>
                </li>
                <?php
                if (!isset($_SESSION['username'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../register.php">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../index.php">Авторизация</a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../logout.php">Выйти <?php echo $_SESSION['username']; ?> <?php echo $_SESSION['id']; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr>