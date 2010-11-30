<?php
class UtilHelper extends AppHelper {
	var $helpers = array('Session');
	
    function formatAmount($amount, $twoLine = true) {
        return ( $amount > 0 ? '+ ' : '- ' ) .  number_format( abs($amount), 0, '.', ',' ) . ($twoLine ? '<br/>' : ' ') . $this->Session->read('currency');
    }
    
}
?>
