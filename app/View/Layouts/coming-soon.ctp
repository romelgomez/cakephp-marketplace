<!DOCTYPE html>
<html class="full" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">


	<title>MarketPlace</title>

	<?php
	$css = array();

	//  Bootstrap
//	array_push($css,'//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
	array_push($css,'/resources/bower_components/bootstrap/dist/css/bootstrap.css');

	echo $this->Html->css($css);

	echo $this->fetch('css');
	?>

	<!-- Custom styles for this template -->
	<link href="/resources/theme-vendor/cover/cover.css" rel="stylesheet">

	<!-- Web Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background: none;">

<div class="site-wrapper">

	<div class="site-wrapper-inner">

		<div class="cover-container">

			<div class="masthead clearfix">
				<div class="inner">
					<h3 class="masthead-brand" style="font-family: 'Lato', sans-serif; font-weight: 300;">MarketPlace</h3>
				</div>
			</div>

			<div class="inner cover">
				<h1 class="cover-heading" style="font-family: 'Roboto', sans-serif;text-shadow: 0 1px 2px rgba(0, 0, 0, 0.66);">Coming Soon</h1>
			</div>

			<div class="mastfoot">
				<div class="inner">
					<p>Copyright &copy;2014 MarketPlace - All rights reserved.</p>
				</div>
			</div>

		</div>

	</div>

</div>

<?php
$scripts = array();

//  jQuery - https://github.com/jquery/jquery
//array_push($scripts,'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
array_push($scripts,'/resources/bower_components/jquery/dist/jquery.js');

//  Bootstrap - https://github.com/twbs/bootstrap
//array_push($scripts,'//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
array_push($scripts,'/resources/bower_components/bootstrap/dist/js/bootstrap.js');

echo $this->Html->script($scripts);

echo $this->fetch('script');

?>
</body>
</html>
