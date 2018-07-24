<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::latest();
        
        if(request('q'))
        {
            $products = $products->where('html', 'like', '%' . request('q') . '%');
        }

        $products = $products->paginate(3);

    	return view('layouts.products.index', compact('products'));
    }

    public function create(){
    	return view('layouts.products.create');
    }

    public function show($id){
        return view('layouts.products.show',[
            'product' => Products::find($id)
        ]);
    }

    public function edit($id){
    	return view('layouts.products.create',[
    		'product' => Products::find($id)
    	]);
    }

    public function remove($id)
    {
        $result = false;

        if ((int) $id)
        {
            $product = Products::find((int) $id);
            $product->delete();

            $result = true;
        }

        return response()->json(['result' => $result]);
    }

    public function store()
    {
        // return request()->all();
    	$id = request('id');
    	
    	if ((int) $id)
    	{
    		$product = Products::find((int) $id);
    		$product->html = request('gjs-html', '');
    		$product->css = request('gjs-css', '');
    		$product->js = request('gjs-js', '');
    		$product->save();
    	}
    	else
    	{
	    	$product = Products::create([
	    		'html' => request('gjs-html', ''),
	    		'css' => request('gjs-css', ''),
	    		'js' => request('gjs-js', ''),
	    	]);
    	}

    	return $product;
    }

    public function upload(Request $request){
       $input = Input::file('images');
        return json_encode( ['$input' => $input]);
       // get the raw POST data
    $rawData = file_get_contents('php://input');

        // this returns null if not valid json
        // Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');
         return json_encode([request()->getContent()]);
        return json_encode( ['all_data' => $request->all(), 'request_files' => $request->file(), '$_FILES' => $_FILES, 'valid' => $request->hasFile('images'), 'rawData' => $rawData, '_REQUEST' => $_REQUEST]);
        $path = $request->file('avatar')->store('avatars');
    }
}
