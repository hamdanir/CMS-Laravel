<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Nullix\CryptoJsAes;
use App\Helpers\Guzzle;

class LoginController extends Controller
{
    private $guzzle;
    public function __construct(CryptoJsAes $cryptoJsAes,Guzzle $guzzle)
    {
        $this->cryptoJsAes = $cryptoJsAes;
        $this->guzzle = $guzzle;
    }
    public function index(Request $request)
    {
        // return view('login/login');
        return view('login.login');

    }


    public function login(Request $request)
    {
        $email = $this->cryptoJsAes->decrypt(request()->email, '+H1yGCRVl1E63rJ7T3zH/98a0dYaVKcu6PIH65vZjrQ=');
        $password = $this->cryptoJsAes->decrypt(request()->password, '+H1yGCRVl1E63rJ7T3zH/98a0dYaVKcu6PIH65vZjrQ=');

        $data = [
            "email" => $email,
            "password" => $password,
        ];
        
        $url = config('api.login');
        $Hasil = $this->guzzle->tes($url, $data); // for testing only
        // $Hasil = $this->guzzle->post($url, $data); // use get/post/put/delete method

        if ($Hasil->status == "200") {
            $request->session()->put('LoginSession', $Hasil->data->tokenSession);
            $request->session()->put('UUID', $Hasil->data->uuid);
            $request->session()->put('Profile_Picture', $Hasil->data->pfp);
            $request->session()->put('Name', $Hasil->data->nameUser);
            $request->session()->put('Email', $Hasil->data->email);
            $request->session()->put('Role', $Hasil->data->roleName);
            return redirect('/');
        } else {
            return redirect('/h4l4m4nl0g1nR4m4Y4n4')->with('error', 'Email/Password Salah, Silahkan coba lagi');        }
        // dd($request);
    }

    public function logout(Request $request)
    {
        // $request->session()->forget('LoginSession');
        // return redirect('login');
        $request->session()->flush();
        return redirect('/h4l4m4nl0g1nR4m4Y4n4');
    }

}
