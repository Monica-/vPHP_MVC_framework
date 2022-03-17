<?php

namespace modules\article\model;

class Model
{
    public function getList($userId = null)
    {
        //find articles list in database
        $response = [];
        for ($i = 1; $i < 6; $i++) {
            array_push($response, [
                'id' => $i,
                'title' => "Article with title $i"
            ]);
        }
        return $response;
    }

    public function details($id)
    {
        //find article in database
        $article= $this->returnArticle($id);
        $article['author']= [
            'firstName' => 'John',
            'lastName' => 'Doe'
        ];
        return $article;
    }

    public function modify($id, $data= null)
    {
        //modify article in database and return it
        if ($id) {
            $response= $this->responseMessage("Modify article <b>$id</b> with data sent in POST (for example)");
        }
        else{
            $response= $this->responseMessage("What article must be modified?", true);
        }
        return $response;
    }

    public function delete($id)
    {
        //delete article in database
        if ($id) {
            $response= $this->responseMessage("Delete article <b>$id</b>");
        }
        else{
            $response= $this->responseMessage("What article must be deleted?", true);
        }
        return $response;
    }

    public function new($data)
    {
        //create article in database and return it
        $response= $this->responseMessage("Create a new article with data sent in POST (for example)");

        return $response;
    }

    public function attach($id, $userId)
    {
        //attach article to a user in database and return it
        if ($id && $userId) {
            $response= $this->responseMessage("Add user <b>$userId</b> as author of article <b>$id</b>");
        }
        else{
            $response= $this->responseMessage("Missing article or user to attach. Please review URL data.", true);
        }
        return $response;
    }

    public function detach($id, $userId)
    {
        //detach article from user in database and return it
        if ($id && $userId) {
            $response= $this->responseMessage("Remove user <b>$userId</b> as author of article <b>$id</b>");
        }
        else{
            $response= $this->responseMessage("Missing article or user to detach. Please review URL data.", true);
        }
        return $response;
    }

    protected function returnArticle($id,$userId=1)
    {
        return [
            'id' => $id,
            'title' => "Article with title $id",
            'body' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'author' => $userId
        ];
    }

    private function responseMessage($message, $error= false)
    {
        return [
            'error'=>$error,
            'message'=>$message
        ];
    }
}