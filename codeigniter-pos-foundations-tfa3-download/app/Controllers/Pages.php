<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home(): string
    {
        return view('pages/home', ['title' => 'Point of Sale Foundations']);
    }

    public function about(): string
    {
        return view('pages/about', ['title' => 'About the Project']);
    }
}
