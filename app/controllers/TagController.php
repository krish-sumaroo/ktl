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
		/*
		$tags = Tag::where('entity', '=', 'book')
		->orderBy('title')
        ->get();
        */

        $tags = Tag::entity('book')->validated()->orderBy('title')->get();

        //$users = User::popular()->women()->orderBy('created_at')->get();
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



	public function add()
	{
		$response = array();

		$tgExist = Tag::entity(Session::get('created.entity'))->title(Input::get('title'))->first();
		
		
		if (!$tgExist){
		 	$tag = new Tag();
			$tag->entity = Session::get('created.entity');
			$tag->title = Input::get('title');
			$tag->save();
			$response['status'] = 0;
			$response['id'] = $tag->id;
		} else {
			$response['status'] = 1;
			$response['msg'] = 'Already exists';
		}

		return Response::json($response);		
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

	public function testView()
	{
		$tgExist = Tag::entity('book')->title('testX')->first();

		if($tgExist)
		{
			echo "value";
		} else {
			echo "no value";
		}

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
