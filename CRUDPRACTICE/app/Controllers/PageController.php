<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PageController extends BaseController
{
    public function index()
    {
        //
    }

    public function landing()
    {
        return view('landing');
    }
}
