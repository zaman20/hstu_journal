<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function authorDashboard(){
        return view('author-dashboard');
    }

    public function authorSubmit(){
        return view('author-submit');
    }
}
