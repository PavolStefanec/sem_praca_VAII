<?php

namespace App\Controllers;

use App\Core\Responses\Response;

class ShopController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function shop()
    {
        return $this->html();
    }
}