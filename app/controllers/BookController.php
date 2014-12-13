<?php

class BookController extends \BaseController {
	private $entity = 'book';
	public $directory = 'uploads';
	private $maxImages = 5;
	
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
		$books = Book::all();

		return View::make('books.index')
			->with('books', $books);
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
		return Redirect::to('books');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::find($id);

		$directoryHash = Routines::getHash($this->entity, $id);

		$directory = 'uploads/'.$directoryHash;
		$files = File::files($directory);

		// Log::info('directory =>'.$directory);
		// Log::info('files =>'.print_r($files, true) );

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
