<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Resources\PrimaryResources;

class Gamer {

	public $gamerResources;
	public $gamerProducedResources;
	public $spaceshipParts;
	
	function __construct() {
		
		$this->gamerResources = (new PrimaryResources())->resources;
		$this->gamerProducedResources = [
			"metal" => 0,
			"wires" => 0,
			"ic" => 0
		];
		$this->spaceshipParts = [
			"engine" => false,
			"launcher" => false,
			"porthole" => false,
			"shell" => false,
			"tank" => false,
			"control_unit" => false
		];

	}

}