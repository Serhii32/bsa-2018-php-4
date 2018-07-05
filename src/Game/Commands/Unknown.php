<?php

namespace BinaryStudioAcademy\Game\Commands;

class Unknown extends MasterCommand {

	private $unknownCommand;

	function __construct(string $primaryAtr){

		$this->unknownCommand = $primaryAtr;

	}
	
	public function showInfo(): string {

		return "There is no command {$this->unknownCommand}";

	}

}