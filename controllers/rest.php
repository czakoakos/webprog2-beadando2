<?php

class Rest_Controller
{
    public $baseName = 'rest';

    public function main(array $vars)
    {

        $view = new View_Loader($this->baseName);
    }
}

?>