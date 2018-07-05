<?php

namespace BinaryStudioAcademy\Game\Commands;

class Scheme extends MasterCommand {

	private $requiredResources;

	function __construct(string $secondaryAtr) {

		switch ($secondaryAtr) {
            case 'shell' :
                $this->requiredResources = "Shell => metal|fire";
                break;

            case 'control_unit' :
                $this->requiredResources = "Control unit => ic|wires";
                break;

            case 'engine' :
                $this->requiredResources = "Engine => metal|carbon|fire";
                break;

            case 'launcher' :
                $this->requiredResources = "Launcher => water|fire|fuel";
                break;

            case 'porthole' :
                $this->requiredResources = "Porthole => sand|fire";
                break;

            case 'tank' :
                $this->requiredResources = "Tank => metal|fuel";
                break;

            default : 
                $this->requiredResources = "There is no such spaceship module.";
                break;
        }

	}
	
	public function showInfo(): string {

		return $this->requiredResources;

	}

}