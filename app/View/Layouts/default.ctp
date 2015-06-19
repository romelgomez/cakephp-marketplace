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

$data = $this->{'request'}->data;

$urlAction = strstr($this->{'request'}->url, '/', true); // Desde PHP 5.3.0
if($urlAction === false){
    $urlAction = $this->{'request'}->url;
}
$this->{'set'}('urlAction',$urlAction);

$scripts = array();
$css = array();

//  Redactor - http://imperavi.com/redactor/
//  array_push($scripts,'/assets/redactor/redactor.min.js');
//  array_push($scripts,'/assets/redactor/langs/es.js');
//  array_push($css,'/assets/redactor/redactor.css');

array_push($scripts,'/bower_components/jquery/dist/jquery.js');
array_push($scripts,'/bower_components/bootstrap/dist/js/bootstrap.js');
array_push($scripts,'/bower_components/pnotify/pnotify.core.js');
array_push($scripts,'/bower_components/angular/angular.js');
array_push($scripts,'/bower_components/angular-busy/dist/angular-busy.js');
array_push($scripts,'/bower_components/angular-pnotify/src/angular-pnotify.js');
array_push($scripts,'/bower_components/angular-validation-match/dist/angular-input-match.js');
array_push($scripts,'/bower_components/angular-bootstrap/ui-bootstrap.js');
array_push($scripts,'/bower_components/angular-bootstrap/ui-bootstrap-tpls.js');
array_push($scripts,'/bower_components/angular-messages/angular-messages.js');
array_push($scripts,'/bower_components/uri.js/src/URI.js');
array_push($scripts,'/assets/scripts/app.js');

array_push($css,'/bower_components/bootstrap/dist/css/bootstrap.css');
array_push($css,'/bower_components/font-awesome/css/font-awesome.min.css');
array_push($css,'/bower_components/pnotify/pnotify.core.css');
array_push($css,'/bower_components/angular-busy/dist/angular-busy.css');
array_push($css,'/assets/styles/base.css');

if($urlAction == 'login'){
    array_push($css,'/assets/styles/login.css');
}

$title  = '<title>CakePHP-MarketPlace</title>';
$meta   = '<meta charset="utf-8">'.
    '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.
    '<meta name="viewport" content="width=device-width, initial-scale=1">'.
    '<meta http-equiv="cache-control" content="max-age=0" />'.
    '<meta data-http-equiv="cache-control" content="no-cache" />'.
    '<meta data-http-equiv="expires" content="0" />'.
    '<meta data-http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />'.
    '<meta data-http-equiv="pragma" content="no-cache" />';

switch($urlAction){
    case 'product':

        // Title URL - lazy solution
        $foo    = trim($data['Product']['title']);
        $foo    = strtolower($foo);
        $foo    = str_replace('/', '',$foo);
        $foo    = preg_replace( '/\s+/', ' ', $foo);
        $titleUrl  = str_replace(' ', '-',$foo);

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

        $title = '<title>CakePHP-MarketPlace - '.$data['Product']['title'].' - '.$data['User']['name'].' Stock</title>';

        $meta .= '<meta property="og:title" content="'.$data['Product']['title'].'" />'
            .'<meta property="og:url" content="http://www.cakephp-marketplace.com/producto/'.$data['Product']['id'].'/'.$titleUrl.'.html" />'
            .'<meta property="og:type" content="website" />'
            .'<meta property="og:site_name" content="CakePHP MarketPlace" />'
            .'<meta property="og:description" content="'.$description.'" />'
            .'<meta property="og:image" content="http://www.cakephp-marketplace.com/resources/app/img/products/'.$data['Image'][0]['facebook'].'" />'
            .'<meta property="fb:app_id" content="338515926310582" />'
            .'<meta name="twitter:card" content="summary_large_image" />'
            .'<meta name="twitter:site" content="@romelgomez07" />'
            .'<meta name="twitter:title" content="'.ucfirst($data['Product']['title']).'" />'
            .'<meta name="twitter:description" content="'.$description.'">'
            .'<meta name="twitter:image:src" content="http://www.cakephp-marketplace.com/resources/app/img/products/'.$data['Image'][0]['facebook'].'" />'
            .'<meta name="twitter:url" content="http://www.cakephp-marketplace.com/stock/'.$data['Product']['user_id'].'" />';

        break;
    case "stock":
        if($data['User']['banner'] !== NULL){
            $banner = 'resources/app/img/banners/'.$data['User']['banner'];
        }else{
            $banner = 'resources/app/img/benjaminFranklin.jpg';
        }

        $title = '<title>CakePHP-MarketPlace  - '.$data['User']['name'].' Stock</title>';
        $meta .= '<meta property="og:title" content="'.$data['User']['name'].' Stock" />'
            .'<meta property="og:url" content="http://www.cakephp-marketplace.com/stock/'.$data['User']['id'].'" />'
            .'<meta property="og:type" content="website" />'
            .'<meta property="og:site_name" content="CakePHP MarketPlace" />'
            .'<meta property="og:description" content="Visita el stock de producto y/o servicios que tengo para ti" />'
            .'<meta property="og:image" content="http://www.cakephp-marketplace.com/'.$banner.'" />'
            .'<meta property="fb:app_id" content="338515926310582" />'
            .'<meta name="twitter:card" content="summary_large_image" />'
            .'<meta name="twitter:site" content="@romelgomez07" />'
            .'<meta name="twitter:title" content="'.ucfirst($data['User']['name']).' Stock" />'
            .'<meta name="twitter:description" content="Visita el stock de producto y/o servicios que tengo para ti">'
            .'<meta name="twitter:image:src" content="http://www.cakephp-marketplace.com/'.$banner.'" />'
            .'<meta name="twitter:url" content="http://www.cakephp-marketplace.com/stock/'.$data['User']['id'].'" />';
        break;
}
?>
<!DOCTYPE html>
<html ng-app="app" lang="en">
<head>
    <?php
    echo $title;
    echo $meta;
    echo $this->Html->css($css);
    echo $this->fetch('css');
    ?>
    <link rel="shortcut icon" data-href="/favicon.ico" type="image/x-icon">
    <link rel="icon" data-href="/favicon.ico" type="image/x-icon">
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
                <li><a ng-href="/publish"><span class="glyphicon glyphicon-globe"></span> Publish</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Account <?php if(isset($userLogged)){ echo '( '.$userLogged['User']['name'].' )'; } ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a ng-href="/publications"><span class="glyphicon glyphicon-bullhorn"></span> publications</a></li>
                        <li><a ng-href="/stock/<?php echo $userLogged['User']['id']; ?>"><span class="glyphicon glyphicon-th"></span>  Stock</a></li>
                    </ul>
                </li>
                <li><a ng-href="/logout"><span class="menu glyphicon glyphicon-off"></span> Sign out</a></li>
            <?php }else{ ?>
                <li><a ng-href="/login"><span class="menu glyphicon glyphicon-off"></span> Log in</a></li>
            <?php } ?>
        </ul>
    </div><!--/.nav-collapse -->
</div>

<?php echo $this->fetch('content'); ?>

<!-- footer -->
<div class="footer">
    Copyright &copy;2014 CakePHP-MarketPlace - All rights reserved.
    <a ng-href="/terms-of-service" target="_blank">Terms of Service</a> &
    <a ng-href="/privacy-policy" target="_blank">Privacy Policy</a>
</div>

<?php
echo $this->Html->script($scripts);
echo $this->fetch('script');
?>

<!--<script type="text/javascript">-->
<!--    $(document).ready(function ($) {-->
<!--        // delegate calls to data-toggle="lightbox"-->
<!--        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {-->
<!--            event.preventDefault();-->
<!--            return $(this).ekkoLightbox();-->
<!--        });-->
<!--    });-->
<!--</script>-->

</body>
</html>
