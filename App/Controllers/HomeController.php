<?php

namespace App\Controllers;

use App\Models\News;
use App\Models\Shop;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {
        $news = News::getAll();

        return $this->html(
            [
                'news' => $news
            ]);
    }

    public function shop()
    {
        $shop = Shop::getAll();

        return $this->html(
            [
                'shop' => $shop
            ]);
    }

    public function about()
    {
        return $this->html();
    }

    public function contact()
    {
        return $this->html();
    }
}