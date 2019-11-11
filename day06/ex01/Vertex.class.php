<?php

require_once 'Color.class.php';

class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	public static $verbose = false;
	public static function doc() {
		return file_get_contents('./Vertex.doc.txt');
	}

	public function __construct($array) {
		if (is_array($array)) {
			if ($array['x'])
				$this->_x = $array['x'];
			else
				$this->_x = 0.0;
			if ($array['y'])
				$this->_y = $array['y'];
			else
				$this->_y = 0.0;
			if ($array['z'])
				$this->_z = $array['z'];
			else
				$this->_z = 0.0;
			if ($array['w'])
				$this->_w = $array['w'];
			else
				$this->_w = 1.0;
			if ($array['color'] instanceof Color)
				$this->_color = $array['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			if (Vertex::$verbose)
				echo "Vertex( " . $this->formatXYZW() . ", $this->_color ) constructed\n";
		}
		else {
			$this->_x = 0.0;
			$this->_y = 0.0;
			$this->_z = 0.0;
			$this->_w = 1.0;
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			if (Vertex::$verbose)
				echo "Vertex( " . $this->formatXYZW() . " ) constructed\n";
		}
	}
	public function __destruct() {
		if (self::$verbose)
			echo "Vertex( " . $this->formatXYZW() . ", $this->_color ) destructed\n";
	}
	private function formatXYZW() {
		$x = number_format($this->_x, 2);
		$y = number_format($this->_y, 2);
		$z = number_format($this->_z, 2);
		$w = number_format($this->_w, 2);
		return "x: $x, y: $y, z:$z, w:$w";
	}
	public function __toString() {
		$xyzw = $this->formatXYZW();
		if (self::$verbose)
			return "Vertex( $xyzw, $this->_color )";
		else
			return "Vertex( $xyzw )";
	}
	public function __get($name) {
		if ($name[0] != '_')
			$name = '_' . $name;
		return $this->$name;
	}
	public function __set($name, $value) {	
		if ($name[0] != '_')
			$name = '_' . $name;
		$this->$name = $value;
	}
}
