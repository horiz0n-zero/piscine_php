<?php

require_once 'MapObject.class.php';

class Ship extends MapObject {

	public $width = 1;
	public $height = 1;

	public $pp = 1;
	public $pv = 1;
	public $shield = 1;
	public $atk = 1;

	public $side;

	public function __construct($x, $y, $side) {
		$this->x = $x;
		$this->y = $y;
		$this->side = $side;
	}

}

?>
