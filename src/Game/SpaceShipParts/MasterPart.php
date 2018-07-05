<?php

namespace BinaryStudioAcademy\Game\SpaceShipParts;

use BinaryStudioAcademy\Game\Gamer;

abstract class MasterPart {

	abstract function __construct(Gamer $gamer);

}