<!-- POPUP CREATE EXPENSE HERE -->
<div id="addSection" class="popup">
	<div class="header">
		<h1>Add Expense</h1>
	</div>
	<div class="content">
	
		<?php echo $this->Form->create('Expense', array('action' => 'add')); ?>
		<ul class="form">
			<li>
				<!--<label for="txtDate">Date</label>
				<input id="txtDate" type="text" />-->
				<?php  
				echo $this->Form->input( 'created', array('type' => 'text', 'id' => 'time') );
				?>
			</li>
			<li>
				<!--<label for="txtAmount">Amount</label>
				<input id="txtAmount" type="text" />-->
				<?php echo $this->Form->input( 'amount', array('id' => 'amount') ); ?>
			</li>
			<li>
				<!--<label for="txtDescription">Description</label>
				<textarea id="txtDescription"></textarea>-->
				<?php 
				echo $this->Form->label('Description');
				echo $this->Form->textarea( 'note', array('id' => 'note') ); 
				?>
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
<!-- END POPUP CREATE EXPENSE HERE -->