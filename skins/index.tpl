<!DOCTYPE html>
<html lang="<?php echo Core::$LANGUAGE['lang']; ?>">
<head>
<meta charset="UTF-8">
<?php foreach(Core::$META['dns-prefetch'] as $v) { ?>
<link rel="dns-prefetch" href="<?php echo $v; ?>">
<?php } ?>
<title><?php echo hc(Core::$META['title']); ?></title>
<meta name="apple-mobile-web-app-title" content="<?php echo hc(Core::$META['title']); ?>">
<meta name="description" content="<?php echo hc(Core::$META['description']); ?>">
<meta name="keywords" content="<?php echo hc(Core::$META['keywords']); ?>">
<meta name="author" content="Усков Станислав">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php if(Core::$LANGUAGE['status']) {foreach(Core::$LANGUAGE['allow'] as $v) { if($v != Core::$LANGUAGE['lang']) { ?>
<link rel="alternate" hreflang="<?php echo $v; ?>" href="<?php echo createUrl('this',false,$v); ?>">
<?php } } } ?>
<?php if(!empty(Core::$META['prev'])) { ?>
<link rel="prev" href="<?php echo Core::$META['prev']; ?>">
<?php } ?>
<?php if(!empty(Core::$META['next'])) { ?>
<link rel="next" href="<?php echo Core::$META['next']; ?>">
<?php } ?>
<?php if(!empty(Core::$META['canonical'])) { ?>
<link rel="canonical" href="<?php echo Core::$META['canonical']; ?>">
<?php } ?>
<?php if(!empty(Core::$META['shortlink'])) { ?>
<link rel="shortlink" href="<?php echo Core::$META['shortlink']; ?>">
<?php } ?>
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

<!--
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
-->

<link rel="apple-touch-icon" href="/touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="76x76" href="/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="120x120" href="/touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="152x152" href="/touch-icon-ipad-retina.png">
<style><?php include './skins/css/normalize.min.css'; include './skins/css/begin.min.css'; ?></style>
<?php echo Core::$META['head']; ?>
</head>
<body>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId            : '2335635723433028',
			autoLogAppEvents : true,
			xfbml            : true,
			version          : 'v5.0'
		});
	};
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
<script>
	function statusCallback(response) {
		console.log('Прилитело из ФБ: ' + JSON.stringify(response));
		if (response.authResponse.userID) {
			console.log('перенаправляемся на страницу, где получаем постоянный acсess token, достаем данные и проверяем их в базе данных');
			window.location.href = 'https://www.facebook.com/dialog/oauth?client_id=2335635723433028&redirect_uri=https://krihitki.com.ua/cab/fb_auth_in&response_type=code&scope=email';
		}
	}


	function fb_auth(){
		FB.getLoginStatus(function(response) {
			if (response.authResponse){
				console.log('пользователь был залогинен в facebook');
				statusCallback(response);
			} else {
				console.log('Юзер был не залогинен в самом ФБ, запускаем окно логинизирования');
				FB.login(function(response){
					if (response.authResponse) {
						console.log('пользователь залогинился в facebook');
						statusCallback(response);
						FB.api('/me', function(response) {
							console.log('Good to see you, ' + response.name + '.');
						});
					} else {
						console.log('Походу пользователь передумал логиниться через ФБ');
					}
				});
			}
		}, {
			scope: 'public_profile,email,id'
		});
	}
</script>
<header>
	<div class="header">
		<div class="col1">
			<div class="adress">28 Jackson Blvd Ste 1020 Chicago IL 60604-2340</div><br>
			<div class="tel">(800)2345-6789</div>
		</div>
		<div class="col2">
			<img src="/skins/img/logo.png" alt="logo">
		</div>
		<div class="col3">
				<div class="currencylogin">
					<div class="currency">
						<?php if(!isset($_SESSION['regok']) && !isset($_SESSION['user'])) {
							echo '<a href = "/cab/registration" > Регистрация</a >';
						} ?>
					</div>
					<div class="login">
						<?php if(!isset($_SESSION['user'])) {
							echo '<a href="/cab/auth">Авторизация</a>';
						} else {
							echo '<a href="/cab/user">Ваш аккаунт</a>';
						} ?>
					</div>
				</div>
				<div class="spritekorzina">
				</div>
		</div>
	</div>

	<div class="menusearch">
		<nav class="main-menu">
			<a href="/" class="active">home</a>
			<div>
				catalog
				<img src="/skins/img/strmenu.jpg">
				<div class="drop-menu">
					<div class="dropwomens">
						<div class="womensspan">WOMEN'S</div>
						<div class="clmenu">
							<div class="drop-menu-choise">
								<a href="/"><h2 class="h2-text">HOODIES & SWEATSHIRTS</h2></a>
								<a href="/"><h2 class="h2-text">ACCESSORIES</h2></a>
								<a href="/"><h2 class="h2-text">COATS & JACKETS</h2></a>
								<a href="/"><h2 class="h2-text">DRESSES</h2></a>
								<a href="/"><h2 class="h2-text">DENIM</h2></a>
								<a href="/"><h2 class="h2-text">JEWELLERY & WATCHES</h2></a>
								<a href="/"><h2 class="h2-text">GIFTS</h2></a>
							</div>
							<div class="drop-menu-choise">
								<a href="/"><h2 class="h2-text">SKIRTS</h2></a>
								<a href="/"><h2 class="h2-text">SHOES</h2></a>
								<a href="/"><h2 class="h2-text">SHORTS</h2></a>
								<a href="/"><h2 class="h2-text">JUMPERS & CARDIGANS</h2></a>
								<a href="/"><h2 class="h2-text">MATERNITY</h2></a>
								<a href="/"><h2 class="h2-text">SHIRTS & BLOUSES</h2></a>
								<a href="/"><h2 class="h2-text">PETITE</h2></a>
							</div>
						</div>
					</div>
					<div class="dropmens">
						<div class="mensspan">MEN'S</div>
						<div class="clmenu">
							<div class="drop-menu-choise">
								<a href="/">ACCESSORIES</a><br>
								<a href="/">COATS & JACKETS</a><br>
								<a href="/">HOODIES & SWEATSHIRTS</a><br>
								<a href="/">DENIM</a><br>
								<a href="/">SHIRTS & BLOUSES</a><br>
								<a href="/">JEWELLERY & WATCHES</a><br>
								<a href="/">TROUSERS</a><br>
							</div>
							<div class="drop-menu-choise">
								<a href="/">SHORTS</a><br>
								<a href="/">SOCKS & TIGHTS</a><br>
								<a href="/">SHOES</a><br>
								<a href="/">SUITS & SEPARATES</a><br>
								<a href="/">SWIMWEAR</a><br>
								<a href="/">SLEEPWEAR</a><br>
								<a href="/">UNDERWEAR</a><br>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($_SESSION['userfb'])){
				echo '<a href="/cab/exit">ВЫХОД</a>';
			}
			?>
		</nav>
	</div>



</header>
<main>
	<?=$content;?>
</main>

<footer class="footer">
	Подвал сайта
</footer>
<link href="/skins/components/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="/skins/css/end.min.css" rel="stylesheet">
<link href="/skins/components/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
<script>
	var antixsrf = '<?php echo (isset($_SESSION['antixsrf']) ? $_SESSION['antixsrf'] : 'no'); ?>';
</script>
<script src="/skins/components/node_modules/jquery/dist/jquery.min.js"></script>
<script src="/skins/components/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="/skins/components/bootstrap/bootstrap.min.js"></script>
<script src="/vendor/schoolphp/library/Core/fw.min.js"></script>
<script src="/skins<?php echo Core::$SKIN;?>/js/scripts.js"></script>
<?php echo Core::$END; ?>
</body>
</html>
