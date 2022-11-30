<?php

class Matches_arrivals_Controller
{
    public $baseName = 'matches_arrivals';

    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName);
    }
}

?>