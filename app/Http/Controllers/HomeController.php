<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Demo;
use App\Hosting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $totalUser = User::count();
        $totalRole = Role::count();
        $totalHosting = Hosting::count();
        $totalDemo = Demo::count();
        return view('admin.index', compact('totalUser', 'totalRole', 'totalHosting', 'totalDemo'));
    }
}
