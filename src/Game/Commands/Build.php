<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Gamer;
use BinaryStudioAcademy\Game\SpaceShipParts\{Shell, ControlUnit, Engine, Launcher, Porthole, Tank};
use BinaryStudioAcademy\Game\Resources\{IC, Wires};

class Build extends MasterCommand {

	private $spaceshipPart;
	private $producedSpaceshipPart;

	function __construct(string $spaceshipPart, Gamer $gamer) {

		$this->spaceshipPart = ucwords($spaceshipPart);
		
		switch ($spaceshipPart) {
            case 'shell' :
                $this->producedSpaceshipPart = new Shell($gamer);
                break;

            case 'control_unit' :
                $this->producedSpaceshipPart = new ControlUnit($gamer);
                break;

            case 'engine' :
                $this->producedSpaceshipPart = new Engine($gamer);
                break;

            case 'ic' :
                $this->producedSpaceshipPart = new IC($gamer);
                break;

            case 'wires' :
                $this->producedSpaceshipPart = new Wires($gamer);
                break;

            case 'launcher' :
                $this->producedSpaceshipPart = new Launcher($gamer);
                break;

            case 'porthole' :
                $this->producedSpaceshipPart = new Porthole($gamer);
                break;

            case 'tank' :
                $this->producedSpaceshipPart = new Tank($gamer);
                break;

            default : 
                $this->producedSpaceshipPart = "unknown";
                break;
        }

	}
	
	public function showInfo(): string {

        if ($this->producedSpaceshipPart == "unknown") {

            return "There is no such spaceship module.";

        } elseif (!empty($this->producedSpaceshipPart->requiredResources)) {
            
            return "Inventory should have: " . implode(",", $this->producedSpaceshipPart->requiredResources) . ".";

        } elseif (isset($this->producedSpaceshipPart->isReady) && $this->producedSpaceshipPart->isReady == true) {
            
            return "Attention! {$this->spaceshipPart} is ready.";;

        } elseif (isset($this->producedSpaceshipPart->allPartsReady) && $this->producedSpaceshipPart->allPartsReady == true) {

            return "{$this->spaceshipPart} is ready! => You won!";
            exit();

        } else {

            return "{$this->spaceshipPart} is ready!";

        }

    }

}