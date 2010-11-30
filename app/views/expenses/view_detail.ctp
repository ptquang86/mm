<?php //debug($listExpenses); ?>

<!-- EXPENSE DETAIL HERE -->
<div class="header">
	<h1>Account List</h1>
</div>
<div class="content">

	<ul class="table">
		<?php 
		foreach ($listExpenses as $expense) {
			
			$amount = $this->Util->formatAmount($expense['Expense']['amount']);
			
			echo '<li>';
				echo '<p>';
					echo $this->Html->tag('strong', $expense['Expense']['created'], array( 'class' => 'col_name' ));
					echo $this->Html->tag('span', $amount, array( 'class' => 'col_amount' ));
					echo $this->Html->tag('i', $expense['Expense']['note'], array( 'class' => 'col_desc' ));
				echo '</p>';
			echo '</li>';
			
		}
		?>
	</ul>

</div>
<!-- EXPENSE DETAIL HERE -->




