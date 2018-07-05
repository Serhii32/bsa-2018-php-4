<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

class ControlUnit extends MasterPart {

	public $requiredResources = [];
	public $isReady = false;
	public $allPartsReady = false;
	
	function __construct(Gamer $gamer) {

		if ($gamer->spaceshipParts["control_unit"] == false) {

			if ($gamer->gamerProducedResources["ic"] < 1) {
				array_push($this->requiredResources, "ic");
			}

			if ($gamer->gamerProducedResources["wires"] < 1) {
				array_push($this->requiredResources, "wires");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {
			
				$gamer->gamerProducedResources["ic"] --;
				$gamer->gamerProducedResources["wires"] --;
				$gamer->spaceshipParts["control_unit"] = true;
				$this->allPartsReady = !in_array(false, $gamer->spaceshipParts);
				return $this->allPartsReady;

			}

		} else {

			return $this->isReady = true;

		}

	}

}