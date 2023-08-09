<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\Helpers\Guzzle;

class HomeController extends Controller
{
    private $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }
    //
    public function index(Request $request )
    {
        return view('home');
    }

    public function invalid(Request $request)
    {
        return view('invalid_permission');
    }
}
