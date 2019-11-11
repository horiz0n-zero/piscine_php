<?php

require_once 'MapObject.class.php';
require_once 'Ability.class.php';
require_once 'Attack.class.php';

class Ship extends MapObject {

	public $width = 1;
	public $height = 1;

	public $pp = 1;
	public $pv = 1;
	public $shield = 1;
	public $atk = 1;

	private $side;

	public function __construct($x, $y, $side) {
		$this->x = $x;
		$this->y = $y;
		$this->side = $side;
	}

	public function __get($name) {
		
	}
	public function __set($name, $value) {
		
	}

}

?>
