<?php
	if ($success == 1) {
		if ($permitted == 1) {
			echo $this->Html->link('<i class="fa fa-check text-green"></i>', 'javascript:void(0)',array('class' => 'permission-toggle', 'data-aco_id' => $acoId, 'data-aro_id' => $aroId,'escape'=>false));
		} else {
			echo $this->Html->link('<i class="fa fa-times text-red"></i>', 'javascript:void(0)', array('class' => 'permission-toggle', 'data-aco_id' => $acoId, 'data-aro_id' => $aroId,'escape'=>false));
		}
	} else {
		__('error');
	}

	Configure::write('debug', 0);
?>