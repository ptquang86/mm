<?php
class User extends AppModel {
    var $name = 'User';
    
   	/*
   	var $hasMany = array(
        'Account' => array(
            'className'     => 'Account',
            'foreignKey'    => 'user_id',
            'dependent'		=> true
        )
    );  
    */
    
    function getAllUser(){
    	return $this->find('all');
    }
    
    function getUserInfo($email){
    	return $this->findByEmail( $email );
    }
}
?>
