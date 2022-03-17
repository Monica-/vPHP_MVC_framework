<?php

namespace framework\controller;

abstract class AbstractController
{
    use ControllerTraits;

    protected array $data, $otherIdentifiers;
    protected string $module;

    public function __construct(array $request, array $otherIdentifiers = [])
    {
        $this->data = [];
        $this->otherIdentifiers = $otherIdentifiers;
        $basePathArray = explode('\\', get_class(debug_backtrace()[0]['object']));
        $this->module = $basePathArray[1];
    }

    /**
     * @param array $request
     * @throws \framework\exceptions\URIException
     */
    protected function callOtherResource(array $request): void
    {
        $identifiers = $this->otherIdentifiers;
        $identifiers[$this->module]=$this->data;
        $this->callController($request, $identifiers);
    }
}