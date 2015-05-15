<!DOCTYPE html>
<html ng-app="app" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta data-http-equiv="cache-control" content="max-age=0" />
	<meta data-http-equiv="cache-control" content="no-cache" />
	<meta data-http-equiv="expires" content="0" />
	<meta data-http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta data-http-equiv="pragma" content="no-cache" />

	<?php
        echo $title;
        echo $meta;
	?>

	<link rel="shortcut icon" data-href="/favicon.ico" type="image/x-icon">
	<link rel="icon" data-href="/favicon.ico" type="image/x-icon">

	<?php
	array_push($css,'/assets/styles/login.css');
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
<body style="background: none;">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">CakePHP-MarketPlace</a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<?php if(isset($userLogged)){ ?>
				<li class=""><a ng-href="/publish"><span class="glyphicon glyphicon-globe"></span> Publish</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-user"></span> Account <?php if(isset($userLogged)){ echo '( '.$userLogged['User']['name'].' )'; } ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li role="presentation" class="dropdown-header">PRODUCTS</li>
						<li><a ng-href="/published"><span class="glyphicon glyphicon-bullhorn"></span> Published</a></li>
						<li><a ng-href="/drafts"><span class="glyphicon glyphicon-pencil"></span> Drafts</a></li>
						<li><a ng-href="/stock/<?php echo $userLogged['User']['id']; ?>"><span class="glyphicon glyphicon-th"></span> Stock</a></li>
					</ul>
				</li>
			<?php } ?>
			<?php
			if(isset($userLogged)){
				echo '<li class=""><a ng-href="/logout" class="menu" ><span class="glyphicon glyphicon-off"></span>  Sign out</a></li>';
			}else{
				echo '<li class=""><a ng-href="/login" class="menu" ><span class="glyphicon glyphicon-off"></span> Log in</a></li>';
			}
			?>
		</ul>
	</div><!--/.nav-collapse -->
</div>

<?php echo $this->fetch('content'); ?>

<!-- footer -->
<div class="footer">
	<div style="text-align: center; margin-top: 20px; color: #ffffff;">
		Copyright &copy;2014 CakePHP-MarketPlace - All rights reserved.
		<a ng-href="/terms-of-service" target="_blank">Terms of Service</a> &
		<a ng-href="/privacy-policy" target="_blank">Privacy Policy</a>
	</div>
</div>

<?php
    echo $this->Html->script($scripts);
    echo $this->fetch('script');
?>

</body>
</html>
