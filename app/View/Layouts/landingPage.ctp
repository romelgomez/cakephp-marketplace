<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />


	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

	<?php
	echo $this->Html->css($css);
	echo $this->fetch('css');
	?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!--<div id="fb-root"></div>-->
<!--<script>-->
<!--	window.fbAsyncInit = function() {-->
<!--		FB.init({-->
<!--			appId      : '338515926310582',-->
<!--			xfbml      : true,-->
<!--			version    : 'v2.1'-->
<!--		});-->
<!--	};-->
<!---->
<!--	(function(d, s, id){-->
<!--		var js, fjs = d.getElementsByTagName(s)[0];-->
<!--		if (d.getElementById(id)) {return;}-->
<!--		js = d.createElement(s); js.id = id;-->
<!--		js.src = "//connect.facebook.net/en_US/sdk.js";-->
<!--		fjs.parentNode.insertBefore(js, fjs);-->
<!--	}(document, 'script', 'facebook-jssdk'));-->
<!--</script>-->


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: url(/resources/app/img/escheresque_ste.png); border-bottom: 1px solid black;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand a-gold" href="/" >CakePHP-MarketPlace</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">

			<?php if(isset($userLogged)){ ?>
				<li class=""><a href="/publish"><span class="glyphicon glyphicon-globe"></span> Publish</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> Account <?php if(isset($userLogged)){ echo '( '.$userLogged['User']['name'].' )'; } ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li role="presentation" class="dropdown-header">PRODUCTS</li>
						<li><a href="/published"><span class="glyphicon glyphicon-bullhorn"></span> Published</a></li>
						<li><a href="/drafts"><span class="glyphicon glyphicon-pencil"></span> Drafts</a></li>
						<li><a href="/stock/<?php echo $userLogged['User']['id']; ?>"><span class="glyphicon glyphicon-th"></span> Stock</a></li>
						<!--                                <li class="divider"></li>-->
						<!--                                <li><a href="#"><span class="glyphicon glyphicon-wrench"></span> <del>Configuración</del></a></li>-->
					</ul>
				</li>
			<?php } ?>
			<?php
			if(isset($userLogged)){
				echo '<li class=""><a href="/logout" class="menu" ><span class="glyphicon glyphicon-off"></span>  Sign out</a></li>';
			}else{
				echo '<li class=""><a href="/login" class="menu" ><span class="glyphicon glyphicon-off"></span> Log in</a></li>';
			}
			?>
		</ul>
	</div><!--/.nav-collapse -->
</div>

<div class="main-container">
	<?php echo $this->fetch('content'); ?>
</div>



<!-- footer -->
<div class="footer" style="background: #222; background: url(/resources/app/img/escheresque_ste.png); border-top: 1px solid black;">
	<div style="text-align: center; margin-top: 20px; color: #ffffff;">
		Copyright &copy;2014 CakePHP-MarketPlace - All rights reserved.
		<a href="/terms-of-service" target="_blank" class="a-gold">Terms of Service</a> &
		<a href="/privacy-policy" target="_blank" class="a-gold">Privacy Policy</a>.
	</div>
</div>

<?php
echo $this->Html->script($scripts);
echo $this->fetch('script');
?>

<script type="text/javascript">
	$(document).ready(function ($) {
		// delegate calls to data-toggle="lightbox"
		$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
			event.preventDefault();
			return $(this).ekkoLightbox();
		});
	});
</script>

</body>
</html>
