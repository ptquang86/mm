<?php
class AccountsController extends AppController {

	var $name = 'Accounts';
	var $layout = 'mm';
	
	function index() {
		$this->set('listAccount', $this->Account->get( $this->Session->read('id') ));
	}
	
	function add() {
		
	}
	
}
?>
