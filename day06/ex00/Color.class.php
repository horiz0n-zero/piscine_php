<?php
class	Color {
	public $red = 0;
	public $green = 0;
	public $blue = 0;

	static $verbose = FALSE;

	function __construct(array $array) {
		if (array_key_exists('rgb', $array)) {
			$this->red = $array['rgb'] >> 16 & 0xFF;
			$this->green = $array['rgb'] >> 8 & 0xFF;
			$this->blue = $array['rgb'] & 0xFF;
		}
		else {
			if (array_key_exists('red', $array))
				$this->red = (int)$array['red'];
			if (array_key_exists('green', $array))
				$this->green = (int)$array['green'];
			if (array_key_exists('blue', $array))
				$this->blue = (int)$array['blue'];
		}
		if (self::$verbose == TRUE)
			print ($this . ' constructed.' . PHP_EOL);
	}
	function __destruct() {
		if (self::$verbose == TRUE)
			print ($this . ' destructed.' . PHP_EOL);
	}
	function __tostring() {
		$color = sprintf('red: %3d, green: %3d, blue: %3d', $this->red, $this->green, $this->blue);
		return "Color( $color )";
	}
	public static function doc() {
		echo file_get_contents('./Color.doc.txt');
	}
	public function add(Color $param) {
		$new_red = $this->red + $param->red;
		$new_green = $this->green + $param->green;
		$new_blue = $this->blue + $param->blue;
		return (new Color(array('red' => $new_red, 'green' => $new_green, 'blue'=> $new_blue)));
	}
	public function sub(Color $param) {
		$new_red = $this->red - $param->red;
		$new_green = $this->green - $param->green;
		$new_blue = $this->blue - $param->blue;
		return (new Color(array('red' => $new_red, 'green' => $new_green, 'blue'=> $new_blue)));
	}
	public function mult($f) {
		$new_red = $this->red * $f;
		$new_green = $this->green * $f;
		$new_blue = $this->blue * $f;
		return (new Color(array('red' => $new_red, 'green' => $new_green, 'blue'=> $new_blue)));
	}
	public function __get($att) {
		print ('Attempt to access \'' . $att . '\' attribute, this script should die.' . PHP_EOL);
		return;
	}
	public function __set($att, $value) {
		print ('Attempt to set \'' . $att . '\' attribute to \'' . $value . '\', this script should die.' . PHP_EOL);
		return;
	}
}
?>
