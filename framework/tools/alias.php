<?php

function includeView($const)
{
    \framework\views\CreateView::includeView($const);
}

//alias for a controller trait method
function callController(array $request){
    (new class { use \framework\controller\ControllerTraits; })::callController($request);
}

//only works when called from a method in a class in a module
function moduleName()
{
    if (is_callable('debug_backtrace')) {
        $basePathArray = explode('\\', debug_backtrace()[1]['class'] ?? '');
        if (isset($basePathArray[1])) {
            return $basePathArray[1];
        }
    }
    return null;
}