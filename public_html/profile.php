<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Мой профиль</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<!-- Верхняя панель -->
		<nav class="nav navbar-nav nav-custom">
			<div class="container">			
				<div class="top-links">
					<a href="#" class="top-links-bg central-links">Мой профиль</a>
					<a href="#" class="central-links">Учиться</a>
					<a href="#" class="float-right rounded-tr">Выйти</a>
					<a href="#" class="float-right">Сережа</a>
				</div>
			</div>
		</nav>
		
		<div class="container mt-40">
			<div class="row">
				<div class="col-md-4">
					<h4 class="fat-title">Мой профиль</h4>
					<div class="profile-block mt-4">
						<img src="img/pic.PNG"> <br>
						<span class="name">Иванов Сергей</span>
					</div>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-6">			
				  <div class="form-group row" style="margin-top: 40px;">
				    <label class="col-sm-2 col-form-label">Имя</label>
				    <div class="col-sm-7">
				      <input class="form-control custom-input2">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Фамилия</label>
				    <div class="col-sm-7">
				      <input class="form-control custom-input2">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Логин</label>
				    <div class="col-sm-7">
				      <input class="form-control custom-input2">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Пароль</label>
				    <div class="col-sm-7">
				      <input class="form-control custom-input2" type="password">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Дата рождения</label>
				    <div class="col-sm-7 d-flex">
				      <select class="form-control custom-input" style="width: 55px">
				      	<option value="1">1</option>
				      	<option value="2">2</option>
				      	<option value="3">3</option>
				      	<option value="4">4</option>
				      	<option value="5">5</option>
				      	<option value="6">6</option>
				      	<option value="7">7</option>
				      	<option value="8">8</option>
				      	<option value="9">9</option>
				      	<option value="10">10</option>
				      	<option value="11">11</option>
				      	<option value="12">12</option>
				      	<option value="13">13</option>
				      	<option value="14">14</option>
				      	<option value="15">15</option>
				      	<option value="16">16</option>
				      	<option value="17">17</option>
				      	<option value="18">18</option>
				      	<option value="19">19</option>
				      	<option value="20">20</option>
				      	<option value="21">21</option>
				      	<option value="22">22</option>
				      	<option value="23">23</option>
				      	<option value="24">24</option>
				      	<option value="25">25</option>
				      	<option value="26">26</option>
				      	<option value="27">27</option>
				      	<option value="28">28</option>
				      	<option value="29">29</option>
				      	<option value="30">30</option>
				      	<option value="31">31</option>
				      </select>
				      <select class="form-control custom-input" style="width: 150px;">
				      	<option>Январь</option>
				      	<option>Февраль</option>
				      	<option>Март</option>
				      	<option>Май</option>
				      	<option>Июнь</option>
				      	<option>Июль</option>
				      	<option>Август</option>
				      	<option>Сентябрь</option>
				      	<option>Октябрь</option>
				      	<option>Ноябрь</option>
				      	<option>Декабрь</option>
				      </select>
				      <select class="form-control custom-input">
				      	<option>2000</option>
				      	<option>2001</option>
				      	<option>2002</option>
				      	<option>2003</option>
				      	<option>2004</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">Пол</label>
				    <div class="col-sm-7 d-flex genders">
				      <input class="form-control custom-input2" id="m" name="gender" type="radio">
				      <label for="m" class="new-radio"></label>
				      <span>Мужской</span>
				      <input class="form-control custom-input2" id="f" name="gender" type="radio">
				      <label for="f" class="new-radio"></label>
				      <span>Женский</span>
				    </div>
				  </div>
				</div>
			</div>
		</div>


		<!-- Подключение скриптов -->
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>