<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends \BaseController {
	private $entity = 'book';
	public $directory = 'uploads';
	private $maxImages = 5;
	
	public function __construct()
	{
		//$this->beforeFilter('auth');
		//$productDetails = Product::entity($this->entity)->first();
	}

	


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$this->entity;
		$books = Book::orderBy('created_at', 'desc')->get();

		//search components here
		// using only tags for now
		// means to define all ranges for sliders, generic search form

		$tags = Tag::entity('book')->validated()->orderBy('title')->lists('title','id');

		/* hadcoded for now */
		$userId = 3;

		//get list fav for the entity book for a user
		$cond = ['entity' => $this->entity, 'user_id' => $userId];
		$favs = Favourite::where($cond)->lists('item_id');

		return View::make('books.index')
			->with('books', $books)
			->with('entity', $this->entity)
			->with('tagsVals', $tags)
			->with('favs', $favs)
			->nest('search', 'search.page', ['tags' => $tags]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('books.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/* hadcoded for now */
		$catId = 1;
		$prodId = 2;
		$userId = 3;

		//transaction here -->

		$book = new Book;
		$book->entity = $this->entity;
		$book->title = Input::get('title');
		$book->author = Input::get('author');
		$book->year = Input::get('year');





		$book->price = Input::get('price');
		//$book->user_id = Auth::id();
		$book->user_id = $userId;
		$book->category_id = $catId;
		$book->product_id = $prodId;
		$book->save();

		$post = new Post;
		$post->user_id = $userId;
		$post->posting_id = $book->id;
		$post->entity = $this->entity;
		$post->save();
		return Redirect::to('book/details/'.$book->id);
	}

	public function show($id)
	{
		try
		{
			$book = Book::findOrFail($id);
			$hash = Routines::getHash($this->entity, $id);
			$directory = 'uploads/'.$hash;
			$files = File::files($directory);

			return View::make('posts.index')
				->nest('view', 'books.view',['book' => $book])
				->nest('gallery', 'upload.galleryView', ['url' => $directory, 'files' => $files]);


		} catch(ModelNotFoundException $e) {
			return Redirect::to('hello');
		}
	}


	public function details($id)
	{

		//need to check if owner or not.
		//if owner show edit else show view


		try
		{
			$book = Book::findOrFail($id);

			//get tags
			$tags = Tag::entity('book')->validated()->orderBy('title')->get();	

			$hash = Routines::getHash($this->entity, $id);
			$directory = 'uploads/'.$hash;

			//sessions value for updates
			Session::put('created.hash', $hash);
			Session::put('created.id', $id);
			Session::put('created.entity', $this->entity);

			print_r(Session::all());

			$files = File::files($directory);
			return View::make('books.attributes')
				->nest('view', 'books.view',['book' => $book])
				->nest('gallery', 'upload.gallery', ['url' => $directory, 'files' => $files])
				->nest('upload','upload.add',['count' => $this->maxImages - count($files), 'defImg' =>'uploads/default.png'])
				->nest('tag','tags.index2',['tags' => $tags,'savedTags' => $book->tags]);
		}
		catch(ModelNotFoundException $e)
		{
		    return Redirect::to('hello');
		}	
	}


//query to get all posts with tags/users/fav
	/*
	SELECT * FROM `books` b
left join tags_post t
on b.id = t.entity_id
and t.entity = 'book'
join users u on u.id = b.user_id
*/

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function attributesX($id)
	{
		$book = Book::find($id);


		/* this can be moved to a helper function */
		$directoryHash = Routines::getHash($this->entity, $id);
		$directory = 'uploads/'.$directoryHash;
		$files = File::files($directory);

	 	//Log::info('directory =>'.$directory);
		// Log::info('files =>'.print_r($files, true) );i

		Log::info('sessions =>'.print_r(Session::get('created', true)));

		return View::make('books.view')
			->with('books', $book)
			->nest('gallery', 'upload.gallery', ['url' => $directory, 'files' => $files])
			->nest('upload','upload.widget',['count' => $this->maxImages - count($files)]);			
	}




	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	public function upTest()
	{
		return View::make('upload.upTest');
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
