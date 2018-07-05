<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Gamer;

class Status extends MasterCommand {

	private $gamerResources;
	private $gamerProducedResources;
	private $gamerSpaceshipParts;

	function __construct(Gamer $gamer) {

		$this->gamerResources = $gamer->gamerResources;
		$this->gamerProducedResources = $gamer->gamerProducedResources;
		$this->gamerSpaceshipParts = $gamer->spaceshipParts;

	}
	
	public function showInfo(): string {

		$status = PHP_EOL . "You have:" . PHP_EOL . PHP_EOL;

		foreach ($this->gamerResources as $key => $value) {
			$status .= $key . " - " . $value . ";" . PHP_EOL;
		}

		foreach ($this->gamerProducedResources as $key => $value) {
			$status .= $key . " - " . $value . ";" . PHP_EOL;
		}

		$readyParts = array_keys($this->gamerSpaceshipParts, true);

		$status .= PHP_EOL . "Parts ready:" . PHP_EOL . PHP_EOL;

		foreach ($readyParts as $value) {
			$status .= $value . ";" . PHP_EOL;
		}

		$notReadyParts = array_keys($this->gamerSpaceshipParts, false);

		$status .= PHP_EOL . "Parts to build:" . PHP_EOL . PHP_EOL;

		foreach ($notReadyParts as $value) {
			$status .= $value . ";" . PHP_EOL;
		}

		return $status;
	}

}