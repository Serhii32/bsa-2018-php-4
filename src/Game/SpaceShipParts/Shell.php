<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

class Shell extends MasterPart {
	
	public $requiredResources = [];
	public $isReady = false;
	public $allPartsReady = false;

	function __construct(Gamer $gamer) {

		if ($gamer->spaceshipParts["shell"] == false) {

			if ($gamer->gamerProducedResources["metal"] < 1) {
				array_push($this->requiredResources, "metal");
			}

			if ($gamer->gamerResources["fire"] < 1) {
				array_push($this->requiredResources, "fire");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {

				$gamer->gamerResources["fire"] --;
				$gamer->gamerProducedResources["metal"] --;
				$gamer->spaceshipParts["shell"] = true;
				$this->allPartsReady = !in_array(false, $gamer->spaceshipParts);
				return $this->allPartsReady;

			}

		} else {

			return $this->isReady = true;

		}

	}

}