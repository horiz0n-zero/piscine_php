<?php

class MapObject {

	public $x;
	public $y;

	public $width;
	public $height;

	public function coordID() {
		return "$this->x-$this->y";
	}

}

?>
