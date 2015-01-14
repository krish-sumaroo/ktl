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

	public function validate()
	{
		$tags = Tag::notvalidated()->orderBy('title')->get();
		return View::make('tags.admin')->with('tagsAdmin', $tags);
	}

	public function validateSave()
	{
		$tag = Tag::find(Input::get('id'));
		$tag->status = 1;
		$tag->save();

		//need to add to all posts also
	}

	public function decline()
	{
		$tag = Tag::find(Input::get('id'));
		$tag->delete();
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


	public function saveToPost()
	{
		$response = array();

		$newId = $this->_saveToPost(Input::get('element'));
		$response['id'] = $newId;

		$tagName = Tag::find(Input::get('element'));

		$entity = ucfirst(Session::get('created.entity'));
		$entityDetails = $entity::find(Session::get('created.id'));
		$entityDetails->tags = $entityDetails->tags.','.$tagName->title;
		$entityDetails->save();	

		return Response::json($response);		
	}

	private function _saveToPost($tagId)
	{
		$tagPost = new Tagpost;
		$tagPost->entity = Session::get('created.entity');
		$tagPost->entity_id = Session::get('created.id');
		$tagPost->tag_id = $tagId;
		$tagPost->save();
		return $tagPost->id;
	}

	public function removeFromPost()
	{
		$this->_deleteFromPost(Input::get('element'));

		$tagName = Tag::find(Input::get('element'));

		$entity = ucfirst(Session::get('created.entity'));
		$entityDetails = $entity::find(Session::get('created.id'));
		$newTag = str_replace(','.$tagName->title, '', $entityDetails->tags);
		$entityDetails->tags = $newTag;
		$entityDetails->save();
	}

	private function _deleteFromPost($tagId)
	{
		$cond = ['entity' => Session::get('created.entity'), 'entity_id' => Session::get('created.id'), 'tag_id' => $tagId];
		Tagpost::where($cond)->delete();
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

			$post = $this->_saveToPost($tag->id);
			$response['status'] = 0;
			$response['id'] = $tag->id;
			$reponse['postId'] = $post;


			//decouple the function to add to tag_post and call here
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
