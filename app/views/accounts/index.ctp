<?php //debug($listAccount);?>

<!-- ACCOUNT LIST HERE -->
<div id="listSection">
	<div class="header">
		<h1>Account List</h1>
	</div>
	<div class="content">
	
		<ul class="table">
			<?php 
			foreach ($listAccount as $account) {
			
				$amount = $this->Util->formatAmount($account['Account']['amount']);
				
				echo '<li>';
					echo '<a href="' . $this->Html->url( array( 'controller' => 'expenses', 'action' => 'view', $account['Account']['id'] ) ) . '">';
						echo $this->Html->tag('strong', $account['Account']['name'], array( 'class' => 'col_name' ));
						echo $this->Html->tag('span', $amount, array( 'class' => 'col_amount' ));
					echo '</a>';
				echo '</li>';
				
			}
			?>		
		</ul>
	
	</div>
</div>
<!-- END ACCOUNT LIST HERE -->

<style type="text/css">.popup{display: none;}</style>
<?php require_once 'add.ctp';?>

<?php echo $this->Html->script('account'); ?>