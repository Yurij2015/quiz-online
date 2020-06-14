<?php
include_once('includes/header.php');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <h4 class="fat-title">Учиться</h4>
            <div class="aside aside-active">
                <a href="#">Все уроки</a>
            </div>
            <div class="aside">
                <a href="#">Прогресс</a>
            </div>
        </div>
        <div class="col-md-8 mt-40">
            <h4>Урок 1 - Lesson 1</h4>
            <div class="row lesson">
                <div class="lesson-imgs">
                    <div class="img-card">
                        <img src="img/cat.PNG">
                        <span>a cat</span>
                    </div>
                    <div class="img-card">
                        <img src="img/bat.PNG">
                        <span>a bat</span>
                    </div>
                    <div class="img-card">
                        <img src="img/rat.PNG">
                        <span>a rat</span>
                    </div>
                </div>
                <h4 class="fat-title mt-40">Слова</h4>
                <p>Прочитай слова с транскрипцией и переводом. Нажми на слово, чтобы услышать, как правильно его
                    произносить</p>
                <p class="ex">
                    <span>1. a cat [kæt] - кошка</span>
                    <span>2. a bat [bæt] - летучая мышь</span>
                    <span>3. a rat [ræt] - крыса</span>
                </p>
                <h4 class="fat-title mt-4">Задания</h4>
                <p>Слева ты видишь предложения на английском языке. Справа - перевод. Выбери правильный перевод между
                    левыми предложениями и правыми.</p>
                <!-- 						<div class="col-md-6 trans-card">
                                            <span>A rat, a bat, a cat.</span><br>
                                            <span>A bat, a cat, a rat.</span>
                                        </div>
                                        <div class="col-md-6 trans-card">
                                            <span>Крыса, летучая мышь, кошка</span> <br>
                                            <span>Летучая мышь, кошка, крыса</span>
                                        </div> -->
                <div class="trans-card">
                    <span>A rat, a bat, a cat.</span>
                    <span>Крыса, летучая мышь, кошка.</span>
                </div>
                <div class="trans-card mt-4">
                    <span>A bat, a cat, a rat..</span>
                    <span>Летучая мышь, кошка, крыса.</span>

                    <h4 class="fat-title mt-4">Запомни</h4>
                    <p>Запомни дополнительные слова. Нажми на слово, чтобы услышать, как правильно его произносить</p>
                    <div class="d-flex justify-content-between">
                        <p>one [wʌn] - один, одна, одно</p>
                        <p>lesson [lesn] - урок</p>
                    </div>
                    <div class="congrats mb-40">
                        <h4 class="fat-title">Поздравляю!</h4>
                        <p>Ты успешно прошел урок и правильно выполнил задание. Можешь приступать к следующему
                            уроку!</p>
                        <div class="congrats-buttons">
                            <a href="#" class="btn-cgt"><i class="fa fa-chevron-circle-left"> Предыдущий урок</i></a>
                            <a href="#" class="btn-cgt">Следующий урок <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once('includes/footer.php'); ?>