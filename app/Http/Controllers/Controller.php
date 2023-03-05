<?php

namespace App\Http\Controllers;

use App\Models\Article;
use core\Response;

class Controller
{
    /**
     * @return void
     */
    public function index()
    {
        echo "<h1 style='text-align: center'>Hello World </h1>";

        echo "<center><a href='https://github.com/andrei26916/macro'> GitHub </a></center>";
    }

}