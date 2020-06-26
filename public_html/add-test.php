<?php
if ($_POST) {
    $name = trim(htmlspecialchars($_POST['name']));
    $disciplinesid = trim(htmlspecialchars($_POST['disciplinesid']));
    $status = htmlspecialchars($_POST['status']);
    if (!empty($name)) {
        include_once("lib/RedBeanPHP5_4_2/rb.php");
        include_once("Dbsettings.php");
        include_once("model/DB.php");
        include_once("controller/Test.php");
        new DB($host, $port, $db_name, $user, $password);
        $create = new Test();
        $create->create($name, $disciplinesid, $status);
        header('location: tests.php?msg=Запись успешно добавлена!');
    }
}
?>
<?php
session_start();
$title = "Добавить тест";
$msg = '';
include_once('includes/header.php');
?>
    <div class="banner padd">
        <div class="container mt-5 ">
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
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Наименовение</label>
                            <input type="text" class="form-control" id="name" placeholder="Название теста"
                                   name="name"
                                   value="">
                        </div>
                        <?php
                        include_once("lib/RedBeanPHP5_4_2/rb.php");
                        include_once("Dbsettings.php");
                        include_once("model/DB.php");
                        include_once("controller/Discipline.php");
                        new DB($host, $port, $db_name, $user, $password);
                        ?>
                        <div class="form-group">
                            <label for="category_id">Дисциплина (тема)</label>
                            <select type="text" class="form-control" name="disciplinesid"
                                    id="category_id">
                                <?php
                                $categories = new Discipline();
                                foreach ($categories->get() as $category) { ?>
                                    <option value="<?php echo $category['id']; ?>">
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Статус</label>
                            <select type="text" class="form-control" name="status"
                                    id="category_id">
                                <option value="1"> активный</option>
                                <option value="0"> не активный</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Сохранить</button>
                        <a href="lesson.php" class="btn btn-primary mb-5">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- / Inner Page Content End -->
<?php include_once('includes/footer.php'); ?>