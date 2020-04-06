<?php

namespace App\Http\Controllers;

use App\Socio;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $total = 1;
        $coleccion = Socio::orderBy('created_at')->paginate(10);
        return view('home', compact('coleccion','total'));
    }
}
