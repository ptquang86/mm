<?php
class ExpensesController extends AppController {

	var $name = 'Expenses';
	var $layout = 'mm';
	
	function view($accountId, $year = null, $month = null) {
		if( !isset($accountId) ){
			return;
		}
		
		$this->Expense->bindModel(
	        array('belongsTo' => array(
	                'Category' => array(
	                    'className' => 'Category'
	                )
	            )
	        )
	    );
		
		if( is_null($year) ){
			$year = date('Y');
		}		
		if( is_null($month) ){
			$month = date('m');
		}
	    $startTime = date( "Y-m-d H:i:s", mktime(00, 00, 00, $month    , 01, $year) );
	    $endTime   = date( "Y-m-d H:i:s", mktime(23, 59, 59, $month + 1, 00, $year) );
		$result = $this->Expense->get( $accountId, null, $startTime, $endTime, array( 'Expense.category_id' ) );
		
		//total amount in month
		$totalAmount = 0;
		
		//group by category
		$listCategories = array();
		foreach ($result as $cate) {
			$cateId = $cate['Category']['id'];
			$amount = $cate['Expense']['amount'];
			
			if( !isset($listCategories[$cateId]) ){
				$listCategories[$cateId] = array(
					'amount'   	=> 0,
					'quantity' 	=> 0,
					'name'  	=> $cate['Category']['name'],
					'z_index'	=> $cate['Category']['z_index']
				);
			}			
			
			$listCategories[$cateId]['amount']   += $amount;
			$listCategories[$cateId]['quantity'] += 1;
			
			$totalAmount += $amount;
		}
		
		//sort by z-index
		uasort($listCategories, array($this, '_compareCategories'));
		
		$this->set('listCategories', $listCategories);
		$this->set('totalAmount', $totalAmount);
		$this->set('accountId', $accountId);
		$this->set('month', $month);
		$this->set('nextMonth', mktime(00, 00, 00, $month + 1 , 01, $year));
		$this->set('prevMonth', mktime(00, 00, 00, $month - 1 , 01, $year));
		$this->set('year', $year);
		
		$this->loadModel('Account');
		$report = $this->Account->getInfo( $accountId );
		$this->set('accountName', $report['Account']['name']);
	}
	
	function view_detail($accountId, $categoryId, $year = null, $month = null) {
		if( !isset($accountId) || !isset($categoryId) ){
			return;
		}
		
		$startTime = date( "Y-m-d H:i:s", mktime(00, 00, 00, $month    , 01, $year) );
	    $endTime   = date( "Y-m-d H:i:s", mktime(23, 59, 59, $month + 1, 00, $year) );
		$this->set('listExpenses', $this->Expense->get($accountId, $categoryId, $startTime, $endTime, array( 'time' )));
	}
	
	function viewByMonth() {
		
	}
	
	function viewByYear() {
		
	}
	
	function add() {
		//debug($_POST);
		if( !empty($_POST['data']) ){
			
			$this->Expense->set($_POST['data']);$this->log($_POST['data']);
			
			if($this->Expense->validates()){
				/*if(empty($data['time'])){
					$data['time'] = date('Y-m-d H:i:s');
				}*/
				
				$this->log($this->Expense->add($_POST['data'], false));
				
				if ( $this->Expense->add($_POST['data'], false) ) {
					$info = array(
						'success' => true,
						'data' => array(
							'Expense' => array(
								'id' => $this->Expense->id,
								'name' => $_POST['name']
							)
						)
					);
				} else {
					$info = array(
						'success' => false,
						'message' => 'Error: Add expense fail!'
					);
				}
			} else {
				$error = $this->Expense->invalidFields();		
				$info = array(
					'success' => false,
					'message' => $error
				);			
			}		
			
			$this->layout = 'ajax';
			$this->set('return', $info);
			$this->render('/elements/ajax');
		}		
	}
	
	
	
	/*
	 * -----------------------------------------------------------------------------------
	 * Support functions
	 * -----------------------------------------------------------------------------------
	 * */
	
	function _compareCategories($cateA, $cateB){
		if ($cateA['z_index'] == $cateB['z_index']) {
	        return 0;
	    }
	    return ($cateA['z_index'] > $cateB['z_index']) ? -1 : 1;
	}
	
}
?>
