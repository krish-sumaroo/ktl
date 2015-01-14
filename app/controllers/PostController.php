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

public function listAll($entity)
{
	//hardcoded for now
	//$entity = 'book';

	$posts = Post::entity($entity)->orderBy('created_at', 'desc')->get();

	print_r($posts);
}

public function test()
{
	echo "here";
}

public function postsByUser()
{
	$userId = 3;
	$entity = Post::where(['user_id' => $userId])->distinct()->lists('entity');

	/* 1.retrieve each dataset from each entity
	   2.call the result page for each entity
	   3. a way to add up all the results
	*/

	$entityView = '';  
	foreach ($entity as $entityModel) {
	   	$cond = ['entity' => $entityModel, 'user_id' => $userId];
		$favs = Favourite::where($cond)->lists('item_id');

		$megaRstColl = $entityModel::where(['user_id' => $userId]);
		$count = $megaRstColl->count();
		$megaRst = $megaRstColl->orderBy('created_at','desc')->get();

		$entityView .= View::make('posts.container')
				->with('entity', $entityModel)
				->with('count', $count)
				->nest('results',$entityModel.'s'.'.results', ['results' => $megaRst, 'favs' => $favs, 'entity' => $entityModel,'owner'=> true])
				->render();

				//echo $entityView;
	   }   

	   return View::make('posts')->with('views', $entityView);

	   //$myViewData = View::make('hello')->render(); 
}


}
