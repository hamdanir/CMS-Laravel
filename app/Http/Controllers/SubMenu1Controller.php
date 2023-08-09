<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use App\Helpers\Guzzle;

class SubMenu1Controller extends Controller
{
    private $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }
    //
    public function index(Request $request )
    {
        return view('SubMenu1/SubMenu1_List');
    }

    public function getList(Request $request)
    {
        $body = [
            "page" => 1,
            "filteredBy" => "",
            "sortBy" => "",
            "search" => ""
        ];
        $url = config('api.list');
        $Hasil = $this->guzzle->tes($url, $body);

        // dd($Hasilcmsaktif);

        return json_encode($Hasil);
    }
}
