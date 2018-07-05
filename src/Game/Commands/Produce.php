<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Gamer;
use BinaryStudioAcademy\Game\Resources\Metal;

class Produce extends MasterCommand {
	
	private $resource;
	private $producedResource;

	function __construct(string $resource, Gamer $gamer) {

		$this->resource = ucwords($resource);
		
		switch ($resource) {
            case 'metal' :
                $this->producedResource = new Metal($gamer);
                break;

            default : 
                $this->producedResource = "unknown";
                break;
        }

	}
	
	public function showInfo(): string {

		if ($this->producedResource == "unknown") {

            return "No such resource.";

        } elseif (!empty($this->producedResource->requiredResources)) {
            
            return "You need to mine: " . implode(",", $this->producedResource->requiredResources) . ".";

        } else {

			return "{$this->resource} added to inventory.";

		}
	}

}