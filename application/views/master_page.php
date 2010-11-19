<!doctype html>
<html lang="en" class="no-js" dir="ltr">
<head>
	<meta charset="utf-8" />
      	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title ?></title>
	<?php echo implode("\n\t", array_map('HTML::style', $styles)), "\n";?>
	<link rel="shortcut icon" href="<?php echo URL::site('img/favicon.ico')?>" />
	<!--[if IE]>
	<?php echo HTML::script('js/html5.js'), "\n"?>
	<![endif]-->
	<?php echo implode("\n\t", array_map('HTML::script', $scripts)) ?>
</head>
	<!--[if lt IE 7 ]> <body class="ie6"> <![endif]-->
	<!--[if IE 7 ]>    <body class="ie7"> <![endif]-->
	<!--[if IE 8 ]>    <body class="ie8"> <![endif]-->
	<!--[if IE 9 ]>    <body class="ie9"> <![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->

	<?php echo View::factory('page/fragments/header') ?>

	<div id="content">	
		<?php echo $content ?>
	</div>

	<?php echo View::factory('page/fragments/footer') ?>

	<!-- {execution_time} -->
</body>
</html>
