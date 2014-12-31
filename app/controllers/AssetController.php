<?php

class AssetController extends \BaseController {

	public function __construct()
	{
		//$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::all()->lists('title','id');

		return View::make('admin.product')
			->with('categories', $categories);
	}

	public function attributes()
	{
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	public function products()
	{
		$catId = 1;
		$products = Product::where('category_id','=',$catId);		
		return Response::json($products);		
	}

	public function addProduct()
	{
		$prod = Input::get('prod');
		$category = Input::get('cat');

		$data = new Product;
		$data->title = $prod;
		$data->category_id = $category;
		$data->save();
	}

	public function uploadTest()
	{
		$file = Input::file('file'); // your file upload input field in the form should be named 'file'

		$destinationPath = 'uploads/'.str_random(8);
		$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		$uploadSuccess = Input::file('file')->move($destinationPath, $filename);
		 
		return View::make('uploadResponse')->with('status', $uploadSuccess);
	}

	public function upload()
	{
		return View::make('testUpload');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
