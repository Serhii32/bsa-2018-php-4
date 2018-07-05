<?php

namespace BinaryStudioAcademy\Game\Resources;

use BinaryStudioAcademy\Game\Gamer;

class Metal extends ComplexResource {

	public $requiredResources = [];

	public function __construct(Gamer $gamer) {

		if ($gamer->gamerResources["iron"] < 1) {
			array_push($this->requiredResources, "iron");
		}

		if ($gamer->gamerResources["fire"] < 1) {
			array_push($this->requiredResources, "fire");
		}

		if (!empty($this->requiredResources)) {
			
			return $this->requiredResources;

		} else {

			$gamer->gamerResources["fire"] --;
			$gamer->gamerResources["iron"] --;
			$gamer->gamerProducedResources["metal"] ++;

		}

	}

}