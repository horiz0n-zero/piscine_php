<?php

class Jaime extends Lannister {

	public function sleepWith($date) {
		if ($date instanceof Cersei) {
			echo "With pleasure, but only in a tower in Winterfell, then.\n";
			return ;
		}
		parent::sleepWith($date);
	}

}

?>
