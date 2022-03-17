<?php

namespace modules\article\views;

use framework\views\CreateView;

class ViewController
{
    protected string $module;
    protected CreateView $view;

    public function __construct()
    {
        $this->module = moduleName();
        $this->view = new CreateView('main.main', $this->module);
        $this->view->addView('FOOTER', 'main.footer');
    }

    public function sendView(string $view, array $response = []): void
    {
        $this->view->addView('MAIN', $view, $response);
        $this->view->show();
    }

}