<?php

class UnholyFactory {

	public $exemplaires = array();

	public function absorb($fighter) {
		$contain = false;
		foreach($this->exemplaires as $exemplaire) {
			if (get_class($exemplaire) == get_class($fighter)) {
				$contain = true;
				break ;
			}
		}
		if (!$contain) {
			if (!($fighter instanceof Fighter))
				echo "(Factory can't absorb this, it's not a fighter)\n";
			else {
				echo "(Factory absorbed a fighter of type $fighter->name)\n";
				array_push($this->exemplaires, $fighter);
			}
		}
		else {
			echo "(Factory already absorbed a fighter of type $fighter->name)\n";
		}
	}

	public function fabricate($name) {
		$value = null;
		foreach ($this->exemplaires as $exemplaire) {
			if ($exemplaire->name == $name) {
				$value = $exemplaire;
				break ;
			}
		}
		if ($value) {
			$fighter = new $value;
			echo "(Factory fabricates a fighter of type $name)\n";
			return $fighter;
		}
		else
			echo "(Factory hasn't absorbed any fighter of type $name)\n";
		return null;
	}

}

?>
