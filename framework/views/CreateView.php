<?php

namespace framework\views;

use framework\views\viewResponseData;

class CreateView
{
    use ViewTraits;

    protected string $view;
    protected string $module;

    /**
     * @param string $view
     * @param string $module
     * @param mixed|null $response
     * @throws \framework\exceptions\ViewException\
     */
    public function __construct(string $view, string $module = '', mixed $response = null)
    {
        $this->module = $module;
        self::getViewFileName($view, $this->module);
        if ($response) {
            viewResponseData::addData($view, $response);
        }
        $this->view = $view;
    }

    /**
     * @param string $viewId
     * @param string $view
     * @param mixed|null $response
     * @throws \framework\exceptions\ViewException
     *
     * Assigns a viewId to a view.
     */
    public function addView(string $viewId,string $view,mixed $response = null): void
    {
        $file = self::getViewFileName($view, $this->module);
        if ($response) {
            viewResponseData::addData($file, $response);
        }
        define($viewId, $file);
    }

    /**
     * @param string $viewId
     *
     * Adds a viewId in a view. This viewId will be assigned to a view that will be included.
     */
    public static function includeView(string $viewId = ''): void
    {
        if (defined($viewId)) {
            $response = viewResponseData::getData(constant($viewId));
            include constant($viewId);
        }
    }

    /**
     * @throws \framework\exceptions\ViewException
     */
    public function show(): void
    {
        $response = viewResponseData::getData($this->view);
        ShowView::show($this->view, $response, $this->module);
    }
}