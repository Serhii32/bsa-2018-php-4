<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

class Engine extends MasterPart {

	public $requiredResources = [];
	public $isReady = false;
	public $allPartsReady = false;
	
	function __construct(Gamer $gamer) {

		if ($gamer->spaceshipParts["engine"] == false) {

			if ($gamer->gamerProducedResources["metal"] < 1) {
				array_push($this->requiredResources, "metal");
			}

			if ($gamer->gamerResources["carbon"] < 1) {
				array_push($this->requiredResources, "carbon");
			}

			if ($gamer->gamerResources["fire"] < 1) {
				array_push($this->requiredResources, "fire");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {

				$gamer->gamerResources["fire"] --;
				$gamer->gamerResources["carbon"] --;
				$gamer->gamerProducedResources["metal"] --;
				$gamer->spaceshipParts["engine"] = true;
				$this->allPartsReady = !in_array(false, $gamer->spaceshipParts);
				return $this->allPartsReady;

			} 

		} else {

			return $this->isReady = true;

		}

	}

}