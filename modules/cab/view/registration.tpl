<div class="body-page">
	<div class="reg">Регистрация на сайте</div><br>
	<form action="" method="post" class="reg-form">
		<table class="reg-table">
			<tr>
				<td>Логин *</td>
				<td><input id="regist-login" type="text" name="login" value="<?php if(isset($_POST['login'])) echo hc($_POST['login']); ?>"></td>
				<td><?php if(isset($errors['login'])) echo $errors['login']; ?></td>
			</tr>
			<tr>
				<td>Пароль *</td>
				<td><input type="password" name="password" value="<?php if(isset($_POST['password'])) echo hc($_POST['password']); ?>"></td>
				<td><?php if(isset($errors['password'])) echo $errors['password']; ?></td>
			</tr>
		</table>
		<p>* поля, обязательные для заполнения</p><br>
			<input type="submit" name="sendreg" value="Зарегистрироваться">
	</form>
</div>

