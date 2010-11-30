<!-- POPUP CREATE ACCOUNT HERE -->
<div id="addSection" class="popup">
	<div class="header">
		<h2>Add Account</h2>
	</div>
	<div class="content">
	
		<?php echo $this->Form->create('Account', array('action' => 'add')); ?>
		<ul class="form">
			<li>
				<!--<label for="txtAccountName">Account name</label>
				<input id="txtAccountName" type="text" />-->
				<?php echo $this->Form->input('name', array( 'label' => 'Account name' )); ?>
			</li>
			<li class="button_cont">
				<!--<input id="add" type="button" value="Add" />
				<input id="cancel" type="button" value="Cancel" />-->
				<?php echo $this->Form->submit( 'Add', array('id' => 'btnAdd', 'div' => false) ); ?>
				<?php echo $this->Form->submit( 'Cancel', array('id' => 'btnCancel', 'type'=>'button', 'div' => false) ); ?>
			</li>
		</ul>
		<?php echo $this->Form->end(); ?>
	
	</div>
</div>

<?php echo $this->Html->script('http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js'); ?>
<!-- END POPUP CREATE ACCOUNT HERE -->