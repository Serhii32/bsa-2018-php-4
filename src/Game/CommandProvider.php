<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\{Status, Build, Scheme, Unknown, Mine, Help, Produce};

class CommandProvider {

    public $command;
    public $gamer;
	
	function __construct(Gamer $gamer) {
        $this->gamer = $gamer;
	}

    public function executeCommand(string $input): void {

        $atr = explode(":", $input);
        $primaryAtr = $atr[0];
        $secondaryAtr = array_key_exists(1, $atr) ? $atr[1]: "unknown";

        switch ($primaryAtr) {
            case 'status' :
                $this->command = new Status($this->gamer);
                break;

            case 'build' :
                $this->command = new Build($secondaryAtr, $this->gamer);
                break;

            case 'scheme' :
                $this->command = new Scheme($secondaryAtr);
                break;

            case 'mine' :
                $this->command = new Mine($secondaryAtr, $this->gamer);
                break;

            case 'help' :
                $this->command = new Help();
                break;

            case 'produce' :
                $this->command = new Produce($secondaryAtr, $this->gamer);
                break;

            case 'exit' :
                exit();
                break;

            default :
                $this->command = new Unknown($primaryAtr);
                break;
        }

    }
}