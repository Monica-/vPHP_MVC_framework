<?php

namespace framework\controller;

abstract class VerbController extends AbstractController
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
            else if (method_exists($this, $nextRequestData)) {
                $method = $nextRequestData;
                array_splice($request, 0, 1);
                $this->initializeOnce();
                $this->{$method}($request);
                return;
            }
            else{
                array_push($this->data, $nextRequestData);
            }
            array_splice($request, 0, 1);
        }
        $this->initializeOnce();
        $this->show();
    }

    protected function initializeOnce(){}
    public abstract function show();

}