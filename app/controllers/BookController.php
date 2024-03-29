<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends \BaseController {
	private $entity = 'book';
	public $directory = 'uploads';
	private $maxImages = 5;
	protected $book;
	private $filters = array('title' => array('type' => 'string', 'op' => 'LIKE'),
						 'author' => array('type' => 'string', 'op' => 'LIKE'),
						 'year' => array('type' => 'range', 'op' => 'BETWEEN', 'start' => 'pubStart', 'end' => 'pubEnd'),
						 'price' => array('type' => 'range', 'op' => 'BETWEEN', 'start' => 'prStart', 'end' => 'prEnd')	
	);
	
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
		$userId = 3;

		//search module
		$ranges = DB::table('books')
                     ->select(DB::raw('max(`year`) as maxYr, min(`year`) as minYr, max(price) as maxPrice'))
                     ->get();

		$tags = Tag::entity('book')->validated()->orderBy('title')->get('title','id');

		//get list fav for the entity book for a user
		$cond = ['entity' => $this->entity, 'user_id' => $userId];
		$favs = Favourite::where($cond)->lists('item_id');

		$books = Book::orderBy('created_at', 'desc')->get();
		// to add pagination and sorting

		return View::make('books.index')
			->with('entity', $this->entity)
			->with('tagsVals', $tags)
			->nest('results','books.results',['results' => $books, 'favs' => $favs, 'entity' => $this->entity, 'owner' => false])
			->nest('search', 'search.page', ['tags' => $tags, 'ranges' => $ranges[0]]);
	}

	public function search()
	{
		$searchArr = ['title' => 'or', 'year' => ['1900','2000']];
		$searchTags = ['16','6','9'];			

		$data = Book::filter($searchArr, $this->filters)->tagFilter($searchTags)->orderBy('created_at', 'desc')->get();

		//query post_tag with entity, tagsId to retrieve book id then pass to tagFilter to use as in(id1, id2, id3)		

		//filter again for tags ie  Book::filter($searchArr, $this->filters)->filterTags(tagsIdArray)
		print_r($data);
	}

	public function searchTst()
	{

		$searchArr = array();
		//compile search criteria

		//validation for valid inputs !!!!important

		if(Input::get('sh_title') != '')
		{
			$searchArr['title'] = Input::get('sh_title');
		}

		if(Input::get('sh_author') != '')
		{
			$searchArr['author'] = Input::get('sh_author');
		}

		if(Input::get('pub_range') != '')
		{
			$searchArr['year'] = explode('|', Input::get('pub_range'));
		}

		if(Input::get('pr_range') != '')
		{
			$searchArr['price'] = explode('|', Input::get('pr_range'));
		}

		//$searchQry = Book::filter($searchArr, $this->filters);->tagFilter($searchTags)->orderBy('created_at', 'desc')->get();

		if(Input::get('schTags') != '')
		{
			$searchTags = explode('|', Input::get('pr_range'));
			$entityWithTags = Tagpost::itemIdByTag($searchTags);
			$searchQry->tagFilter($entityWithTags);
		}

		$searchRst = $searchQry->orderBy('created_at', 'desc')->get();

		//Favourites
		$cond = ['entity' => $this->entity, 'user_id' => $userId];
		$favs = Favourite::where($cond)->lists('item_id');


		return View::make('books.search')
			->with('books', $books)
			->with('favs', $favs);	
	}

	private function _getData()
	{
		

		//search module
		

		/* hadcoded for now */
		


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

		/* need to check if owner or not.
		   if owner show edit else show view
		   -- transfered to posts view
		*/

		   $userId = 3;

		try
		{
			$book = Book::findOrFail($id);

			//get tags
			$tags = Tag::entity('book')->validated()->userEntryDirty($userId)->orderBy('title')->get();	

			//get registered tags if any
			$savedTagsColl = Tagpost::tagsByItemId($id);

			$savedTags = $savedTagsColl->count() > 0 ? $savedTagsColl->lists('tag_id') : [];

			

			$hash = Routines::getHash($this->entity, $id);
			$directory = 'uploads/'.$hash;

			//sessions value for updates
			Session::put('created.hash', $hash);
			Session::put('created.id', $id);
			Session::put('created.entity', $this->entity);

			$files = File::files($directory);
			return View::make('books.attributes')
				->nest('view', 'books.edit',['book' => $book, 'entity' => $this->entity])
				->nest('gallery', 'upload.gallery', ['url' => $directory, 'files' => $files])
				->nest('upload','upload.add',['count' => $this->maxImages - count($files), 'defImg' =>'uploads/default.png'])
				->nest('tag','tags.index2',['tags' => $tags,'savedTags' => array_flip($savedTags)]);
		}
		catch(ModelNotFoundException $e)
		{
		    return Redirect::to('hello');
		}	
	}


	public function saveEdit()
	{
		Log::info('posts =>'.print_r($_POST,true));

		$userLoggedIn = 3;
		/*  check if owner */
		$bookObj = Book::find(Input::get('object'));
		if($bookObj->user_id != $userLoggedIn)
		{
			'fuck off';
			return false;
		} else {
			$bookObj->title = Input::get('title');
			$bookObj->author = Input::get('author');
			$bookObj->year = Input::get('year');
			$bookObj->price = Input::get('price');
			$bookObj->save();
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

	public function listFav()
	{
		$userId = 3;
		$cond = ['favourites.user_id' => $userId];

		//get list book for a user
		$listFavBook = DB::table('books')
            ->join('favourites', 'books.id', '=', 'favourites.item_id')
            ->where($cond)
            ->select('books.id', 'books.title', 'books.author' , 'books.year', 'books.price')
            ->get();

        //get list fav for the entity book for a user
		$condFav = ['entity' => $this->entity, 'user_id' => $userId];
		$favs = Favourite::where($condFav)->lists('item_id');

		return View::make('books.favList')
			->with('listFavBook', $listFavBook)
			->with('favs', $favs);
	}

}
