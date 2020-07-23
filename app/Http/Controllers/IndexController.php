<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    //Login Index
    public function Index(){
        return view('login');
    }


    //Clear
    public function Clear(){

            Artisan::call('cache:clear');
            // \Artisan::call('cache:clear');
            // \Artisan::call('config:clear');
            // \Artisan::call('config:cache');
            // \Artisan::call('view:clear');
            // \Artisan::call('clear-compiled');
            // \Artisan::call('optimize');
            // \Artisan::call('route:clear');

            return "Cleared!";
    }
}
