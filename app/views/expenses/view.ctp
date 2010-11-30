<?php //debug($listCategories); ?>

<!-- EXPENSE LIST HERE -->
<div id="listSection">
	<div class="header">
		<h1><?php echo $accountName . ' (' . $this->Util->formatAmount($totalAmount, false) . ')'; ?></h1>
	</div>
	<div class="content">
	
		<h2 class="sub_header cf">
			<?php 
			echo $this->Html->link( date('m/Y', $prevMonth), '/expenses/view/'. $accountId . '/' . date('Y/m', $prevMonth) );
			echo $this->Html->tag('strong', $month . '/' . $year);
			echo $this->Html->link( date('m/Y', $nextMonth), '/expenses/view/'. $accountId . '/' . date('Y/m', $nextMonth) );
			?>			
		</h2>
		
		<ul class="table">
			<?php 
			foreach ($listCategories as $key => $val) {
				
				$amount = $this->Util->formatAmount($val['amount']);
				$name = $val['name'] . ' (' . $val['quantity'] . ')';
				
				echo '<li>';
					echo '<a href="' . $this->Html->url( array( 'controller' => 'expenses', 'action' => 'view_detail', $accountId, $key, $year, $month ) ) . '">';
						echo $this->Html->tag('strong', $name, array( 'class' => 'col_name' ));
						echo $this->Html->tag('span', $amount, array( 'class' => 'col_amount' ));
					echo '</a>';
				echo '</li>';
				
			}
			?>
		</ul>
		
	</div>
</div>
<!-- END EXPENSE LIST HERE -->

<style type="text/css">.popup{display: none;}</style>
<?php require_once 'add.ctp'; ?>

<?php echo $this->Html->script('expense'); ?>