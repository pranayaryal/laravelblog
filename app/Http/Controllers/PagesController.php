<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    
	public function __construct()
    {
        //authorization only for the create method
        //$this->middleware('auth', ['only' => 'create']);

        //authorization for full website;
        $this->middleware('guest');
    }

	public function index()
	{
		return view('articles.welcome');
	}

    public function about()
    {
    	$first = 'Pranay';

        return view('pages.about', compact('first'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
