<?php

class TagController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		$tags = Tag::where('entity', '=', 'book')
		->orderBy('title')
        ->get();

		return View::make('tags.index')
			->with('tags', $tags);
			*/
	}

	public function all()
	{
		$tags = Tag::where('entity', '=', 'book')
		->orderBy('title')
        ->get();

echo "s";
		return View::make('tags.index')
			->with('tags', $tags);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tags.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$tag = new Tag();
		$tag->entity = 'book';
		$tag->title = Input::get('title');
		//$tag->title = 'wgat';
		$tag->save();
		return Redirect::to('tags');
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
