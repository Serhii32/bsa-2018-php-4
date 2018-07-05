<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;

class Game
{

    private $username = "Guest";
    private $provider;
    private $gamer;

    function __construct() {

        $this->gamer = new Gamer();

    }


    public function start(Reader $reader, Writer $writer): void
    {
        
        $writer->writeln("Welcome to the Spaceship constructor. You can type your commands in terminal");
        $writer->write("Type your name:");
        $this->username = trim($reader->read());
        while (true) {
            $writer->write($this->username."> ");
            $this->run($reader, $writer);
        }

    }

    public function run(Reader $reader, Writer $writer): void
    {
        
        $input = trim($reader->read());
        $this->provider = new CommandProvider($this->gamer);
        $this->provider->executeCommand($input);
        $writer->writeln($this->provider->command->showInfo());
       
    }
}
