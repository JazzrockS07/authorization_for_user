<div class="body-page">
	<div class="auth">Авторизация на сайте</div><br>

	<div class="auth-form">
		<?php if (isset($block) && $block != 'NO') {
			echo $block;
		} elseif(!isset($status) || $status != 'OK') { ?>
		<form action="" method="post">
			<table class="auth-table">
				<tr>
					<td>Логин </td>
					<td><input type="text" name="login"></td>
				</tr>
				<tr>
					<td>Пароль </td>
					<td><input type="password" name="pass"></td>
				</tr>
			</table>
			<?php if (isset($errors)) echo $errors; ?>
			<br><br>
			<input type="submit" name="submit" value="Вход">
		</form>
		<?php } ?>
	</div>

</div>