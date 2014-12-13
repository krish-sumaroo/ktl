<?php

class PostController extends \BaseController {

public function index()
{
	$categories = Category::all()->lists('title','id');
	return View::make('posts.layout')
			->with('categories', $categories);
}

public function products()
{
	$catId = Input::get('catId');
	$products = Product::where('category_id','=',$catId)->lists('entity','title');
	//$products = Product::where('category_id','=',$catId)->get();
	return Response::json($products);
}


}
