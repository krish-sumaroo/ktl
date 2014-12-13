<?php

class UploadController extends \BaseController {

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

	public function upload()
	{
		$entity = Input::get('entity');
		$productId = Input::get('pid');
		$hash = Input::get('hash');
		$attr = Input::get('file');

		//check for attr between 1-5
		//Routines::getHash($entity,$productId) !== $hash

		if( 1 != 1){
			//attempt to hack

			Log::info('pos');

			/* stop upload and show error */
		} else {
			//everything fine proceed to save images

			/** lots of validation to be done here **/



		//$fileName = $_FILES['afile']['name'];
		//$fileType = $_FILES['afile']['type'];
		$fileContent = file_get_contents($_FILES['file'.$attr]['tmp_name']);	

		$destinationPath = 'uploads/'.$hash."/";

		Log::info('directory =>'.$destinationPath);

		$target_file = $destinationPath . basename($_FILES['file'.$attr]["name"]);
		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		//$uploadSuccess = Input::file('file')->move($destinationPath, $filename);

		move_uploaded_file($_FILES['file'.$attr]["tmp_name"], $target_file);
		}

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
