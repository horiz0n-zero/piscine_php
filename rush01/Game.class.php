<?php

require_once 'Destiny.class.php';
require_once 'Nakai.class.php';
require_once 'Meteor.class.php';

class Game {

	public $isPlaying;
	public $isFinish;

	public $rships;
	public $lships;

	public $meteors;

	public $state;

	public function __construct() {
		$this->meteors = Meteor::meteors(10);
	}

	public function newPartie() {
		$this->isPlaying = true;
		$this->isFinish = false;
		$this->lships = array(new Nakai(10, 70, "l"), new Nakai(10, 30, "l"), new Destiny(20, 50, "l"));
		$this->rships = array(new Nakai(140, 70, "r"), new Nakai(140, 30, "r"), new Destiny(130, 50, "r"));
		
	}


}

?>
