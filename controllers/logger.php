<?php

class Logger_Controller
{
    public $baseName = 'logger';

    public function main(array $vars)
    {
        $loggerModel = new Logger_Model;

        $retData = $loggerModel->get_data($vars);
        if ($retData['eredmeny'] == "ERROR")
            $this->baseName = "login";

        $view = new View_Loader($this->baseName);

        foreach ($retData as $name => $value)
            $view->assign($name, $value);
    }
}

?>