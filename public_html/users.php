<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Пользователи</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<!-- Верхняя панель -->
		<nav class="nav navbar-nav nav-custom">
			<div class="container">			
				<div class="" style="width:100%">
					<b class="center-block">Пользователи</b>
					<a href="#" class="float-right" style="color: #000">Выйти</a>
				</div>
			</div>
		</nav>
		
		<div class="container mt-40">
			<div class="row">
				<div class="col-md-4">
					<div class="aside">
						<a href="#">Мой профиль</a>
					</div>
					<div class="aside">
						<a href="#">Администраторы</a>
					</div>
					<div class="aside aside-active">
						<a href="#">Пользователи</a>
					</div>
					<div class="aside">
						<a href="#">Уроки</a>
					</div>
				</div>
				<div class="col-md-6">
				<h5 class="fat-title" style="margin-top:20px">Все администратора</h5>				
				  <div class="form-group row" style="margin-top: 40px;">
				    <label class="col-sm-4 col-form-label">1. Иванов Андрей</label>
				    <div class="col-sm-7 manage-admins">
				      <a href="#" class="del">Удалить</a>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-4 col-form-label">2. Сергеев Алексей</label>
				    <div class="col-sm-7 manage-admins">
				      <a href="#" class="del">Удалить</a>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-4 col-form-label">3. Молчанов Артем</label>
				    <div class="col-sm-7 manage-admins">
				      <a href="#" class="del">Удалить</a>
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