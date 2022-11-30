<?php

class Matches_Controller
{
    public $baseName = 'matches';

    public function main(array $vars)
    {

        $view = new View_Loader($this->baseName);
    }
}

?>