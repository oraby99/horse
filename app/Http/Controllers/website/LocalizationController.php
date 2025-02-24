<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLang($local)
    {
        App::setlocale($local);
        Session::put("locale",$local);
        return redirect()->back();
    }
}
