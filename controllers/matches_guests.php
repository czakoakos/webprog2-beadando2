<?php

class Matches_guests_Controller
{
    public $baseName = 'matches_guests';

    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName);
    }
}

?>