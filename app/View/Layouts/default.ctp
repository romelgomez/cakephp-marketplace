<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
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

	<?php
	echo $title;
	echo $meta;
	?>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

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
<div class="footer">
    <div style="text-align: center; margin-top: 20px; color: #ffffff;">
        Copyright &copy;2014 CakePHP-MarketPlace - All rights reserved.
        <a href="/terms-of-service" target="_blank">Terms of Service</a> &
        <a href="/privacy-policy" target="_blank">Privacy Policy</a>
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
