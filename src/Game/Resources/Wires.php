<?php

namespace BinaryStudioAcademy\Game\Resources;

use BinaryStudioAcademy\Game\Gamer;

class Wires extends ComplexResource {

	public $requiredResources = [];

	function __construct(Gamer $gamer) {

		if ($gamer->gamerResources["copper"] < 1) {
			array_push($this->requiredResources, "copper");
		}

		if ($gamer->gamerResources["fire"] < 1) {
			array_push($this->requiredResources, "fire");
		}

		if (!empty($this->requiredResources)) {
			
			return $this->requiredResources;

		} else {

			$gamer->gamerResources["copper"] --;
			$gamer->gamerResources["fire"] --;
			$gamer->gamerProducedResources["wires"] ++;

		}

	}

}