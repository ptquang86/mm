<?php
class Account extends AppModel {
    var $name = 'Account';
    
    /*
    var $belongsTo = array(
        'User' => array(
            'className'    	=> 'User',
            'foreignKey'   	=> 'user_id'
        )
    );
    */
    
	var $validate = array(
        'name' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Alphabets and numbers only.'
            ),
            'minLength' => array(
                'rule' => array('minLength', 3),
                'message' => 'Usernames must be at least 3 characters long.'
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'This user name has already been taken.'
            )
        )
    );
    
    function get($userId = null){
    	return $this->find('all', array(
    		'conditions' => array( 'user_id' => $userId ),
    		'order' => 'Account.z_index DESC'
    	));
    }
    
	function getInfo($accountId = null){
    	return $this->findById($accountId);
    }
    
	function add($data, $valid = true){
    	return $this->save($data, $valid);
    }
    
	
    
}
?>
