<?php

namespace framework\controller;

trait ControllerTraits
{
    /**
     * @param string $resource
     * @return bool
     */
    public static function isResource(string $resource): bool
    {
        return (is_file('modules' . DIRECTORY_SEPARATOR . $resource . DIRECTORY_SEPARATOR . 'Controller.php'));
    }

    /**
     * @param array $request
     * @param array $otherIdentifiers
     * @throws \framework\exceptions\URIException
     */
    public static function callController(array $request, array $otherIdentifiers= []): void
    {
        if (
            isset($request[0])
            && self::isResource($request[0])
        ) {
            $className = '\\modules\\' . $request[0] . '\\Controller';
            $controller = new $className(array_splice($request, 1), $otherIdentifiers);
        } else {
            throw \framework\exceptions\URIException::invalid();
        }
    }
}