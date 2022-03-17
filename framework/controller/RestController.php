<?php

namespace framework\controller;

abstract class RestController extends AbstractController
{

    public function __construct(array $request, array $otherIdentifiers = [])
    {
        parent::__construct($request, $otherIdentifiers);

        while (isset($request[0])){
            $nextRequestData= $request[0];
            if (self::isResource($nextRequestData)) {
                $this->callOtherResource($request);
                return;
            }
            else{
                array_push($this->data, $nextRequestData);
            }
            array_splice($request, 0, 1);
        }
        $method = $_SERVER['REQUEST_METHOD'];
        if (method_exists($this, $method)) {
            $this->initializeOnce();
            $this->{$method}();
        }
    }

    protected function initializeOnce(){}
}