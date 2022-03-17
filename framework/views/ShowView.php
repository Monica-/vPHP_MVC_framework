<?php

namespace framework\views;

class ShowView
{
    use ViewTraits;

    /**
     * @param string $view
     * @param mixed $response
     * @param string $module
     * @throws \framework\exceptions\ViewException
     *
     * $response is not explicitly used here, but can be seen in the included view
     */
    public static function show(string $view, mixed $response, string $module = ''): void
    {
        if (!$module) {
            $module = moduleName() ?? '';
        }
        $file = self::getViewFileName($view, $module);
        if ($file !== null) {
            include $file;
        } else {
            throw \framework\exceptions\ViewException::notFound($view);
        }
    }
}