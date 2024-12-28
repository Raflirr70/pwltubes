<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showAdminPage()
    {
        return view('user.admin');
    }

}
