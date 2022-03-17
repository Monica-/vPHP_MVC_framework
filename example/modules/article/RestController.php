<?php

namespace modules\article;

use framework\controller\RestController;
use framework\views\ShowView;

class Controller extends RestController
{
    public function __construct(array $request, array $otherIdentifiers = [])
    {
        parent::__construct($request, $otherIdentifiers);
    }

    public function GET()
    {
        $response= $this->responseMessage();
        ShowView::show('rawJson', $response);
    }

    public function PATCH()
    {
        $response= $this->responseMessage();
        ShowView::show('rawJson', $response);
    }

    public function PUT()
    {
        $response= $this->responseMessage();
        ShowView::show('rawJson', $response);
    }

    public function DELETE()
    {
        $response= $this->responseMessage();
        ShowView::show('rawJson', $response);
    }

    public function POST()
    {
        $response= $this->responseMessage();
        ShowView::show('rawJson', $response);
    }

    private function responseMessage()
    {
        return [
            'module'=>$this->module,
            'method_called'=>$this->module.'\Controller: '.debug_backtrace()[1]['function'],
            'data_attribute'=>$this->data,
            'otherIdentifiers_attribute'=>$this->otherIdentifiers
        ];
    }
}