<!DOCTYPE html>
<html lang="en" style="background: url(/resources/app/img/bg-city.jpg) no-repeat center center fixed; -webkit-background-size: cover;   -moz-background-size: cover;   -o-background-size: cover;   background-size: cover;">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<?php

	$data = $this->{'request'}->{'data'};

	// facebook
	if(isset($url_action)){
		if($url_action == 'product'){

			// Title URL -  lazy solution
			$foo    = trim($data['Product']['title']);
			$foo    = strtolower($foo);
			$foo    = str_replace('/', '',$foo);
			$foo    = preg_replace( '/\s+/', ' ', $foo);
			$title  = str_replace(' ', '-',$foo);

			// Description
			$text =  $data['Product']['body'];

			$description = '';
			$_description        =  strip_tags($text);     // remove html entities
			$_description        =  trim($_description);   // remove whitespaces
			$_descriptionLength  =  strlen($_description); // Get string length

			if($_descriptionLength > 200){
				$_description = substr($_description, 0, 140);      // Return part of a string
				$_description =  explode(" ",$_description);        // returns an array containing all the words found inside the string
				for($i = 0; $i < sizeof($_description)-1; $i++){
					$description .= ' '.(string)$_description[$i];
				}
				$description = ucfirst(trim($description)).' ...';
			}else{
				$description = ucfirst($_description);
			}


			echo '<title>CakePHP-MarketPlace - '.$data['Product']['title'].' - '.$data['User']['name'].' Stock</title>';

			echo '<meta property="og:title" content="'.$data['Product']['title'].'" />';
			echo '<meta property="og:url" content="http://www.mystock.la/producto/'.$data['Product']['id'].'/'.$title.'.html" />';
			echo '<meta property="og:type" content="website" />';
			echo '<meta property="og:site_name" content="MyStock.LA" />';
			echo '<meta property="og:description" content="'.$description.'" />';
			echo '<meta property="og:image" content="http://www.mystock.la/resources/app/img/products/'.$data['Image'][0]['facebook'].'" />';
			echo '<meta property="fb:app_id" content="338515926310582" />';


			echo '<meta name="twitter:card" content="summary_large_image" />';
			echo '<meta name="twitter:site" content="@mystockla" />';
			echo '<meta name="twitter:title" content="'.ucfirst($data['Product']['title']).'" />';
			echo '<meta name="twitter:description" content="'.$description.'">';
			echo '<meta name="twitter:image:src" content="http://www.mystock.la/resources/app/img/products/'.$data['Image'][0]['facebook'].'" />';
			echo '<meta name="twitter:url" content="http://www.mystock.la/stock/'.$data['Product']['user_id'].'" />';

		}

		if($url_action == 'stock'){

			if($data['User']['banner'] !== NULL){
				$banner = 'resources/app/img/banners/'.$data['User']['banner'];
			}else{
				$banner = 'resources/app/img/benjaminFranklin.jpg';
			}

			echo '<title>CakePHP-MarketPlace  - '.$data['User']['name'].' Stock</title>';

			echo '<meta property="og:title" content="'.$data['User']['name'].' Stock" />';
			echo '<meta property="og:url" content="http://www.mystock.la/stock/'.$data['User']['id'].'" />';
			echo '<meta property="og:type" content="website" />';
			echo '<meta property="og:site_name" content="MyStock.LA" />';
			echo '<meta property="og:description" content="Visita el stock de producto y/o servicios que tengo para ti" />';
			echo '<meta property="og:image" content="http://www.mystock.la/'.$banner.'" />';
			echo '<meta property="fb:app_id" content="338515926310582" />';

			echo '<meta name="twitter:card" content="summary_large_image" />';
			echo '<meta name="twitter:site" content="@mystockla" />';
			echo '<meta name="twitter:title" content="'.ucfirst($data['User']['name']).' Stock" />';
			echo '<meta name="twitter:description" content="Visita el stock de producto y/o servicios que tengo para ti">';
			echo '<meta name="twitter:image:src" content="http://www.mystock.la/'.$banner.'" />';
			echo '<meta name="twitter:url" content="http://www.mystock.la/stock/'.$data['User']['id'].'" />';
		}
	}else{
		echo '<title>CakePHP-MarketPlace</title>';
	}
	?>

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">



	<?php
	$css = array();

	//  Bootstrap
	//  array_push($scripts,'//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
	array_push($css,'/resources/library-vendor/bootstrap/css/bootstrap.css');

	//  font-awesome
	//  array_push($scripts,'//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
	array_push($css,'/resources/library-vendor/font-awesome/css/font-awesome.min.css');

	//  Pnotify https://github.com/sciactive/pnotify
	//  array_push($scripts,'https://cdnjs.cloudflare.com/ajax/libs/pnotify/2.0.0/pnotify.core.min.css');
	array_push($css,'/resources/library-vendor/pnotify/pnotify.custom.min.css');

	//  Redactor http://imperavi.com/redactor/
	//        array_push($css,'/resources/library-vendor/redactor/redactor.css');

	//  jqTree http://mbraak.github.io/jqTree/
	//        array_push($css,'/resources/library-vendor/jqtree/jqtree.css');

	//  lightbox https://github.com/ashleydw/lightbox
	//        array_push($css,'/resources/library-vendor/ekko-lightbox/ekko-lightbox.min.css');

	//        array_push($css,'/resources/app/css/base.css');

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

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: url(/resources/app/img/escheresque_ste.png); border-bottom: 1px solid black;" >
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

<!--    <div class="main-container">-->
<!--    </div>-->
<?php echo $this->fetch('content'); ?>




<!-- footer -->
<div class="footer" style="background: #222; background: url(/resources/app/img/escheresque_ste.png); border-top: 1px solid black;">
	<div style="text-align: center; margin-top: 20px; color: #ffffff;">
		Copyright &copy;2014 CakePHP-MarketPlace - All rights reserved.
		<a href="/terms-of-service" target="_blank">Terms of Service</a> &
		<a href="/privacy-policy" target="_blank">Privacy Policy</a>
	</div>
</div>

<?php

$scripts = array();

//  jQuery - https://github.com/jquery/jquery
//  array_push($scripts,'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
array_push($scripts,'/resources/library-vendor/jquery/jquery-1.11.1.js');

//  jQueryCookie - https://github.com/carhartl/jquery-cookie
//    array_push($scripts,'/resources/library-vendor/jquery-cookie/jquery.cookie.js');

//  jqTree - http://mbraak.github.io/jqTree/
//    array_push($scripts,'/resources/library-vendor/jqtree/tree.jquery.js');

//  Redactor - http://imperavi.com/redactor/
//    array_push($scripts,'/resources/library-vendor/redactor/redactor.min.js');
//    array_push($scripts,'/resources/library-vendor/redactor/langs/es.js');

//  Bootstrap - https://github.com/twbs/bootstrap
//  array_push($scripts,'//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
array_push($scripts,'/resources/library-vendor/bootstrap/js/bootstrap.js');

//  pnotify  - https://github.com/sciactive/pnotify
//  array_push($scripts,'https://cdnjs.cloudflare.com/ajax/libs/pnotify/2.0.0/pnotify.core.min.js');
array_push($scripts,'/resources/library-vendor/pnotify/pnotify.custom.min.js');

//  Ekko Lightbox  - https://github.com/ashleydw/lightbox
//    array_push($scripts,'/resources/library-vendor/ekko-lightbox/ekko-lightbox.min.js');

//  jQuery Validation Plugin - https://github.com/jzaefferer/jquery-validation
//  array_push($scripts,'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js');
//  array_push($scripts,'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js');
//    array_push($scripts,'/resources/library-vendor/jquery-validate/jquery.validate.js');
//    array_push($scripts,'/resources/library-vendor/jquery-validate/additional-methods.js');

//  Purl - https://github.com/allmarkedup/purl
//  array_push($scripts,'https://cdnjs.cloudflare.com/ajax/libs/purl/2.3.1/purl.min.js');
//    array_push($scripts,'/resources/library-vendor/purl/purl.js');

// App
array_push($scripts,'/resources/app/js/base.js');

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
