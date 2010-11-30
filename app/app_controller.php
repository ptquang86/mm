<?php
class AppController extends Controller {
	var $helpers = array('Form', 'Html', 'Js', 'Session', 'Time', 'Util');
	
	function beforeFilter(){
		parent::beforeFilter();
		
		$id = $this->Session->read('id');
		if( empty($id) ){
			$this->loadModel('User');
			
			//TODO: load email from openid
			
			$info = $this->User->getUserInfo('ptquang86@gmail.com');
			$this->Session->write('id', $info['User']['id']);
			$this->Session->write('email', $info['User']['email']);
			$this->Session->write('currency', $info['User']['currency']);
		}
	}
	
}
?>
