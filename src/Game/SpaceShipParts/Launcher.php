<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

class Launcher extends MasterPart {

	public $requiredResources = [];
	public $isReady = false;
	public $allPartsReady = false;
	
	function __construct(Gamer $gamer) {

		if ($gamer->spaceshipParts["launcher"] == false) {

			if ($gamer->gamerResources["water"] < 1) {
				array_push($this->requiredResources, "water");
			}

			if ($gamer->gamerResources["fire"] < 1) {
				array_push($this->requiredResources, "fire");
			}

			if ($gamer->gamerResources["fuel"] < 1) {
				array_push($this->requiredResources, "fuel");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {

				$gamer->gamerResources["fire"] --;
				$gamer->gamerResources["water"] --;
				$gamer->gamerResources["fuel"] --;
				$gamer->spaceshipParts["launcher"] = true;
				$this->allPartsReady = !in_array(false, $gamer->spaceshipParts);
				return $this->allPartsReady;

			} 

		} else {

			return $this->isReady = true;

		}
		
	}

}