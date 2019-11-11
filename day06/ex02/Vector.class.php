<?php

require_once 'Vertex.class.php';

class Vector {
	private $_x;
	private $_y;
	private $_z;
	private $_w;

	public function __construct(array $array) {
		if ($array['dest'] instanceof Vertex) {
			if (!($array['orig'] instanceof Vertex))
				$array['orig'] = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, w => '1.0'));
			$this->_x = sqrt(pow($array['orig']->_x - $array['dest']->_x, 2));
			$this->_y = sqrt(pow($array['orig']->_y - $array['dest']->_y, 2));
			$this->_z = sqrt(pow($array['orig']->_z - $array['dest']->_z, 2));
			$this->_w = sqrt(pow($array['orig']->_w - $array['dest']->_w, 2));
		}
		else {
			$this->_x = 0.0;
			$this->_y = 0.0;
			$this->_z = 0.0;
			$this->_w = 0.0;
		}
	}
	public function __toString() {
		return "";
	}
	public function __get($name) {
		if ($name[0] != '_')
			$name = '_' . $name;
		return $this->$name;
	}

	public static function doc() {
		return file_get_contents("Vector.doc.txt");
	}
	public static $verbose = false;

	public function magnitude() {
		return 0.0;
	}
	public function normalize() {

	}
	public function add(Vector $rhs) {

	}
	public function sub(Vector $rhs) {

	}
	public function opposite() {

	}
	public function scalarProduct($k) {

	}
	public function dotProduct() {

	}
	public function cos(Vector $) {
		
	}
	public function crossProduct(Vector $rhs) {
		
	}
}
?>






