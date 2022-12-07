<?php

class Matches_guests_Controller
{
    public $baseName = 'matches_guests';

    public function main(array $vars)
    {
        $guestModel = new Guests_Model;

        $retData = $guestModel->get_data($vars);
        if ($retData['eredmeny'] == "ERROR")
            $this->baseName = "login";

        $view = new View_Loader($this->baseName);

        foreach ($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>