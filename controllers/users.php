<?php

class Users_Controller
{
    public $baseName = 'users';

    public function main(array $vars)
    {

        $view = new View_Loader($this->baseName);
    }
}

?>