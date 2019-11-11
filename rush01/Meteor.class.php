<?php

class Meteor extends MapObject {

	const DEFAULT_BONUS = FALSE;
	const DEFAULT_MIN_R = 0;
	const DEFAULT_MAX_R = 10;

	public $bonus;

	public function __construct() {
		if (!random_int(self::DEFAULT_MIN_R, self::DEFAULT_MAX_R))
			$this->bonus = !self::DEFAULT_BONUS;
		else
			$this->bonus = self::DEFAULT_BONUS;
	}

	public static function meteors($count) {
		$arr = array();
		for ($i = 0; $i < $count; $i++) {
			array_push($arr, new Meteor());
		}
		return $arr;
	}

}

?>
