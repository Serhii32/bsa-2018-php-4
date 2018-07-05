<?php

namespace BinaryStudioAcademy\Game\Resources;

use BinaryStudioAcademy\Game\Gamer;

class IC extends ComplexResource {

	public $requiredResources = [];

	function __construct(Gamer $gamer) {

		if ($gamer->gamerProducedResources["ic"] == 0) {

			if ($gamer->gamerProducedResources["metal"] < 1) {
				array_push($this->requiredResources, "metal");
			}

			if ($gamer->gamerResources["silicon"] < 1) {
				array_push($this->requiredResources, "silicon");
			}

			if (!empty($this->requiredResources)) {
				
				return $this->requiredResources;

			} else {

				$gamer->gamerProducedResources["metal"] --;
				$gamer->gamerResources["silicon"] --;
				$gamer->gamerProducedResources["ic"] ++;

			}

		} else {

			return $this->isReady = true;

		}

	}

}