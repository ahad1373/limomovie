<?php

namespace App\Http\Controllers\Admin\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index()
    {
        return view('Admin.Update.index');
    }

    public function update_film()
    {
        return view('Admin.Update.film.index');
    }

    public function update_serial()
    {
        return view('Admin.Update.serial.index');
    }
}
