<?php

class BookController extends \BaseController {
	
	public function __construct()
	{
		$this->beforeFilter('auth');
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



		$book = new Book;
		$book->title = Input::get('title');
		$book->author = Input::get('author');
		$book->year = Input::get('year');
		$book->price = Input::get('price');
		$book->user_id = Auth::id();
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
