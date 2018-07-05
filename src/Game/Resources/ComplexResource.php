<?php

namespace BinaryStudioAcademy\Game\Resources;

use BinaryStudioAcademy\Game\Gamer;

abstract class ComplexResource {

	abstract function __construct(Gamer $gamer);

}