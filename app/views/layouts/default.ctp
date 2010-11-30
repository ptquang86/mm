<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Money Manager - '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	
	<!--<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.2.0/build/cssreset/reset-min.css" />-->	
	
	<?php
		//echo $this->Html->meta('icon');

		echo $this->Html->css('reset-min');
		echo $this->Html->css('style');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div class="header" style="height: 59px;font-size: 25px;line-height: 59px;">
			<h1>Money Manager</h1>
		</div>
		<div class="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div class="footer" style="height: 19px;font-size: 12px;line-height: 19px;text-align: center;">
			<span>&copy; 2010 by <a href="mailto:quangpham86@gmail.com">Quang Pham</a></span>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>