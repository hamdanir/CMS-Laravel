<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Helpers\Guzzle;
use GuzzleHttp\Client as GuzzleClient;

class ProductController extends Controller
{

    private $guzzle;

    public function __construct(Guzzle $guzzle)
    {
        $this->guzzle = $guzzle;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $dataproduct = Http::get('https://dummyjson.com/products', [
    //         'limit'=>'10',
    //     ]);
    //     $dataproduct = json_decode($dataproduct->body(), true);
    //     // dd($dataproduct);
        
    //     return view('Product.product', ['dataProduct' => $dataproduct['products'],
    //     'no' => 1,]);
    // }

    // public function index()
    // {
    //     $client = new GuzzleClient;
    //     $data = $client->get('https://dummyjson.com/products');
    //     $data = json_decode($data->getBody(), true);
    //     // dd($data['products']);
    //     return view('Product.product', ['dataProduct' => $data['products'],
    //     'no' => 1,]);
    // }

    public function index()
    {
        $data = $this->guzzle->get('https://dummyjson.com/products', 'limit=10');
        // $data = Guzzle::get('https://dummyjson.com/products', 'limit=10');
        // dd($data);
        return view('Product.product', ['dataProduct' => $data->products, 'no'=>1,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->guzzle->get('https://dummyjson.com/products/'.$id);
        // dd($product);
        return view('Product.updateProduk', ['dataProduct' => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $body = [
            'title' => $request->titleProduct,
            'price' => $request->price,
            'description' => $request->descriptionProduct,
        ];

        $data = $this->guzzle->put('https://dummyjson.com/products/'.$request->productId, $body);
        dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
