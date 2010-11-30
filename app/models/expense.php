<?php
class Expense extends AppModel {
    var $name = 'Expense';
    
    /*
    var $belongsTo = array(
        'User' => array(
            'className'    	=> 'User',
            'foreignKey'   	=> 'user_id'
        ),
        'Account' => array(
            'className'    	=> 'Account',
            'foreignKey'   	=> 'account_id'
        ),
        'Category' => array(
            'className'    	=> 'Category',
            'foreignKey'   	=> 'category_id'
        )
    ); 
	*/
    
    var $validate = array(
        'amount' => array(
    		'notEmpty' => array(
                'rule' => 'notEmpty',
                'required' => true,
                'message' => 'This field cannot be left blank',
    			'last' => true
            ),
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Numbers only.',
            	'last' => true
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 7),
                'message' => 'Max length is 7 characters.',
            	'last' => true
            )
        ),
        'created' => array(
        	'date' => array(
        		'rule' => 'date',
        		'allowEmpty' => true,
        		'message' => 'Enter a valid date in YYYY-MM-DD format.',
        		'last' => true
        	)
        ),
        'note' => array(
            'alphaNumeric' => array(
                'rule' => 'numeric',
                'message' => 'Alphabets and numbers only.',
        		'allowEmpty' => true,
        		'last' => true
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 1000),
                'message' => 'Max length is 1000 characters.',
            	'last' => true
            )
        )
    );
    
    function get($accountId, $categoryId = null, $startTime = null, $endTime = null, $order = null){
    	$conditon = array( 'account_id' => $accountId );    	
    	if( isset($categoryId) ) 
    		$conditon['category_id'] = $categoryId;
    	if( isset($startTime) ) 
    		$conditon['created >='] = $startTime;
    	if( isset($endTime) ) 
    		$conditon['created <='] = $endTime;
    		
    	if( !isset($order) )
    		$order = 'created';
    	
    	return $this->find('all', array(
    		'conditions' => $conditon,
    		'order' => $order
    	));
    }
    
	function add($data, $valid = true){
    	return $this->save($data, $valid);
    }
    
}
?>
