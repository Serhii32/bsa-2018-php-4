<?php

namespace BinaryStudioAcademy\Game\Commands;

class Help extends MasterCommand {
	
	public function showInfo(): string {
		return PHP_EOL . "Command List:" . PHP_EOL . "help - shows a list of available commands." . PHP_EOL . 
		"status - shows information about the number of available resources and which parts of the ship are not yet assembled." . PHP_EOL . "build:<spaceship_module> - build a module of the ship." . PHP_EOL . "scheme:<spaceship_module> - output information/schema about what modules/resources are needed to build the module." . PHP_EOL . "mine:<resource_name> - add a resource unit to the inventory." . PHP_EOL . "produce:<combined_resource> - produce a combined resource." . PHP_EOL . "exit - leave the game." . PHP_EOL;
	}

}