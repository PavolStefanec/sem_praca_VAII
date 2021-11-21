<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Bands;
use App\Models\Bands_Imgs;
use App\Models\News;
use App\Models\Registration;
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