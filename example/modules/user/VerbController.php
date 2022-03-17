<?php

namespace modules\user;

use framework\controller\VerbController;

class Controller extends VerbController
{
    public function show()
    {
        $this->echoData();
    }

    public function modify()
    {
        $this->echoData();
    }

    public function delete()
    {
        $this->echoData();
    }

    public function new()
    {
        $this->echoData();
    }

    public function attach()
    {
        $this->echoData();
    }

    public function detach()
    {
        $this->echoData();
    }

    private function echoData()
    {
        echo '<br><br>';
        echo '<br>module: <strong>'. $this->module. '</strong>';
        echo '<br>method_called: '.$this->module.'\Controller: '.debug_backtrace()[1]['function'] . '<br>';
        echo '<br><br>data_attribute: <pre>',print_r($this->data),'</pre>';
        echo '<br><br>otherIdentifiers_attribute: <pre>',print_r($this->otherIdentifiers),'</pre>';
    }
}