<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<h2 style="font-family: 'Lato', sans-serif; font-weight: 300;font-size: 40px;" >Welcome to CakePHP-MarketPlace </h2>
			<hr>
			<p class="lead">Here you can easily sharing your offer of products or services in the social networks.</p>

			<blockquote>
				<p>The best way to start your business is to start simple, and online.</p>
			</blockquote>

			<p class="lead">Free Unlimited Publications.</p>

			<hr>

			<p class="text-center"><a href="/publish" type="button" class="btn btn-primary" style="font-size: 15px;">Start publishing today!</a></p>

		</div>
		<div class="col-md-8">			<img src="/resources/app/img/laptop-blank.png" class="img-responsive"></div>
	</div>

</div>


<?php

    // CSS
    $css = array();

    array_push($css,'/resources/app/css/base.css');

    $this->Html->css($css, null, array('inline' => false));

    // JS
    $scripts = array();

    array_push($scripts,'/resources/app/js/base.index.js');

    echo $this->Html->script($scripts,array('inline' => false));

?>
