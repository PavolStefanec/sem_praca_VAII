<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\Responses\Response;
use App\Models\News;

class NewsController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function news()
    {
        $bands = News::getAll();

        return $this->html(
            [
                'bands' => $bands,
                'message' => 'band successfully deleted'
            ]);
    }

    public function newsForm()
    {
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function addNews()
    {
        $title = $this->request()->getValue('title');
        $content = $this->request()->getValue('content');


        $newNews = new News();
        $newNews->setTitle($title);
        $newNews->setContent($content);
//        $newNews->setAuthor(Auth::getName());

        $newNews->save();

        $this->redirect('home', '', ['message'=>'news successfully added']);
    }

    public function modifyForm()
    {
        $id = $this->request()->getValue('id');
        $news = News::getOne($id);
        return $this->html(
            [
                'news' => $news,
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function modifyNews()
    {
        $id = $this->request()->getValue('id');
        if ($id != null) {
            $title = $this->request()->getValue('title');
            $content = $this->request()->getValue('content');

            $news = News::getOne($id);

            if ($title != null)
                $news->setTitle($title);
            if ($content != null)
                $news->setContent($content);

            $news->save();
        }

        $this->redirect('home', '', ['message'=>'news successfully modified']);
    }

    public function deleteNews()
    {
        News::getOne($this->request()->getValue('id'))->delete();
        $this->redirect('home', '', ['message'=>'news successfully deleted']);
    }

}