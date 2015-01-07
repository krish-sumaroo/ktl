<?php

class FavouriteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		/* hadcoded for now */
		$userId = 3;

		$favourite = new Favourite;
		$favourite->user_id = $userId;
		$favourite->entity = Input::get('entity');
		$favourite->item_id = Input::get('itemId');
		$favourite->save();
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
	 * @return Response
	 */
	public function destroy()
	{
		/* hadcoded for now */
		$userId = 3;

		$cond = ['entity' => Input::get('entity'), 'user_id' => $userId, 'item_id' => Input::get('itemId')];
		Favourite::where($cond)->delete();
	}

}
