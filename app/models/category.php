<?php
class Category extends AppModel {
    var $name = 'Category';
    
    var $belongsTo = array(
        'User' => array(
            'className'    	=> 'User',
            'foreignKey'   	=> 'user_id'
        )
    );  
    
}
?>
