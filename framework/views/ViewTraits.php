<?php

namespace framework\views;

trait ViewTraits
{
    /**
     * @param string $view
     * @param string $module
     * @return mixed
     * @throws \framework\exceptions\ViewException
     *
     * Returns view's path and file name. First searches in commonViews\ and then in
     * modules\resource\views\
     */
    static function getViewFileName(string $view, string $module = ''): mixed
    {
        global $globalConfig;
        $pathArray = explode('.', $view);
        $path = implode(DIRECTORY_SEPARATOR, $pathArray) . '.php';

        if ($module && is_string($module)) {
            $basePath = implode(DIRECTORY_SEPARATOR, ['modules', $module, 'views']) . DIRECTORY_SEPARATOR;
            $file = $globalConfig['basePath'] . $basePath . $path;
            if (file_exists($file)) {
                return $file;
            }
        }
        $file = $globalConfig['basePath'] . 'commonViews' . DIRECTORY_SEPARATOR . $path;
        if (file_exists($file)) {
            return $file;
        }
        else{
            throw \framework\exceptions\ViewException::notFound($view);
        }
    }
}