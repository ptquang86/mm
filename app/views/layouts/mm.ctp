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
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('style');
	?>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
	
	<script type="text/javascript">
		<?php Configure::load('config'); ?>
		var context = '<?php echo Configure::read("ContextPath"); ?>';
		var controller = '<?php echo $this->params['controller']; ?>';
	</script>
	
</head>
<body>

	<div id="container">
		<?php echo $this->Session->flash(); ?>

		<?php echo $content_for_layout; ?>
		
		<!-- FOOTER HERE -->
		<div id="footer" class="footer cf">
			<a class="page_back" href="javascript: history.go(-1);">Back</a>
			<a class="page_forward" href="javascript: history.go(+1);">Forward</a>
			<span class="page_menu">Menu</span>
		</div>
		<!-- END FOOTER HERE -->
		
		<ul id="quick_link" class="quick_link cf" style="display: none;">
			<li class="insert"><?php echo $this->Html->link('Insert', '/expenses/create', array( 'id' => 'insert' )); ?></li>
			<li class="report"><?php echo $this->Html->link('Report', '/expenses/report', array( 'id' => 'report' )); ?></li>
			<li class="edit"><?php echo $this->Html->link('Edit', '/expenses/edit', array( 'id' => 'edit' )); ?></li>
			<li class="delete"><?php echo $this->Html->link('Delete', '/expenses/delete', array( 'id' => 'delete' )); ?></li>
			<li class="home"><?php echo $this->Html->link('Go Home', '/accounts/', array( 'id' => 'home' )); ?></li>
		</ul>
		
	</div>
	
	<?php 
	echo $this->Html->script('common'); 
	echo $scripts_for_layout;
	?>
	
	<?php echo $this->element('sql_dump'); ?>
	
</body>
</html>