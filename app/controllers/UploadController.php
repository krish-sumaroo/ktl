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



		$hash = Session::get('created.hash');
		//$fileName = $_FILES['afile']['name'];
		//$fileType = $_FILES['afile']['type'];
		$fileContent = file_get_contents($_FILES['file']['tmp_name']);
		$actualFile = $_FILES['file']['name'];

		$destinationPath = 'uploads/'.$hash."/";

		//$image = Image::create($fileContent);
		//$image->resize(400, 300, 1);
		

		//Log::info('directory =>'.$destinationPath);
		Log::info('extension =>'.pathinfo($actualFile, PATHINFO_EXTENSION));

		//$target_file = $destinationPath . basename($_FILES['file'.$attr]["name"]);
		$target_file = $destinationPath.str_random(10).'.'.pathinfo($actualFile, PATHINFO_EXTENSION);
		//$image->save($target_file);
		//str_random(10) ->generates a random string


		//$filename = $file->getClientOriginalName();
		//$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		//$uploadSuccess = Input::file('file')->move($destinationPath, $filename);

		move_uploaded_file($_FILES['file'.$attr]["tmp_name"], $target_file);

		//resize image
		//resizingImage;
		


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
