<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

class Porthole extends MasterPart {

	public $requiredResources = [];
	public $isReady = false;
	public $allPartsReady = false;
	
	function __construct(Gamer $gamer) {

		if ($gamer->spaceshipParts["porthole"] == false) {

			if ($gamer->gamerResources["sand"] < 1) {
				array_push($this->requiredResources, "sand");
			}

			if ($gamer->gamerResources["fire"] < 1) {
				array_push($this->requiredResources, "fire");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {

				$gamer->gamerResources["sand"] --;
				$gamer->gamerResources["fire"] --;
				$gamer->spaceshipParts["porthole"] = true;
				$this->allPartsReady = !in_array(false, $gamer->spaceshipParts);
				return $this->allPartsReady;
			}

		} else {

			return $this->isReady = true;

		}

	}

}