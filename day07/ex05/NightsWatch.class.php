<?php

class NightsWatch implements IFighter {

	private $troops = array();

	public function recruit($whomever) {
		if ($whomever instanceof IFighter)
			array_push($this->troops, $whomever);
	}

	public function fight() {
		foreach ($this->troops as $troop) {
			$troop->fight();
		}
	}

}

?>
