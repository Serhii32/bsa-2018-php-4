<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Gamer;

class Mine extends MasterCommand {

	private $resource;

	function __construct(string $resource, Gamer $gamer) {

		if (array_key_exists($resource, $gamer->gamerResources)) {
			$this->resource = ucwords($resource);
			$gamer->gamerResources[$resource]++;
		} else {
			$this->resource = false;
		}

	}
	
	public function showInfo(): string {

		if ($this->resource == false) {
			return "No such resource.";
		} else {
			return "{$this->resource} added to inventory.";
		}
	}

}