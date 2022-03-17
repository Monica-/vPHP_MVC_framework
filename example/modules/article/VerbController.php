<?php

namespace modules\article;

use framework\controller\VerbController;
use framework\views\ShowView;
use framework\views\CreateView;
use modules\article\model\Model;
use modules\article\views\ViewController;

class Controller extends VerbController
{
    protected Model $model;
    protected ViewController $viewController;


    public function __construct(array $request=[], array $otherIdentifiers = [])
    {
        parent::__construct($request, $otherIdentifiers);
    }

    protected function initializeOnce()
    {
        $this->model = new Model;
        $this->viewController = new ViewController();
    }

    public function show()
    {
        $viewName = 'show.';

        //there is an article identifier (article/id)
        if (count($this->data)) {
            $response = $this->model->details($this->data[0]);
            $viewName .= 'details';
        } else {
            $user = null;
            if (isset($this->otherIdentifiers['user'])) {
                $user = $this->otherIdentifiers['user'];
            }
            $response = $this->model->getList($user);
            $viewName .= 'list';
        }
        if ($response) {
            //ShowView::show('rawJson', $response);
            $this->viewController->sendView($viewName, $response);
        }
    }

    public function modify()
    {
        $data= null; //Get data from POST
        $response = $this->model->modify($this->data[0]??null, $data);

        $this->viewController->sendView('basic_info.messages', $response);
    }

    public function delete()
    {
        $response = $this->model->delete($this->data[0]??null);

        $this->viewController->sendView('basic_info.messages', $response);
    }

    public function new()
    {
        $data= null; //Get data from POST
        $response = $this->model->new($data);

        $this->viewController->sendView('basic_info.messages', $response);
    }

    public function attach()
    {
        $user = null;
        if (isset($this->otherIdentifiers['user'])) {
            $user = $this->otherIdentifiers['user'][0];
        }
        $response = $this->model->attach($this->data[0]??null, $user);

        $this->viewController->sendView('basic_info.messages', $response);
    }

    public function detach()
    {
        $user = null;
        if (isset($this->otherIdentifiers['user'])) {
            $user = $this->otherIdentifiers['user'][0];
        }
        $response = $this->model->detach($this->data[0]??null, $user);

        $this->viewController->sendView('basic_info.messages', $response);
    }


}