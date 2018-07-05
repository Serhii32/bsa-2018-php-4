<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

class Tank extends MasterPart {

	public $requiredResources = [];
	public $isReady = false;
	public $allPartsReady = false;
	
	function __construct(Gamer $gamer) {

		if ($gamer->spaceshipParts["tank"] == false) {

			if ($gamer->gamerProducedResources["metal"] < 1) {
				array_push($this->requiredResources, "metal");
			}

			if ($gamer->gamerResources["fuel"] < 1) {
				array_push($this->requiredResources, "fuel");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {

				$gamer->gamerResources["fuel"] --;
				$gamer->gamerProducedResources["metal"] --;
				$gamer->spaceshipParts["tank"] = true;
				$this->allPartsReady = !in_array(false, $gamer->spaceshipParts);
				return $this->allPartsReady;

			} 

		} else {

			return $this->isReady = true;

		}
		
	}

}