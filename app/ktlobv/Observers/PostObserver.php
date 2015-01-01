<?php namespace ktlobv\Observers;

use Log;
use Routines;
use Session;

class PostObserver {
	public function created($model)
	{
		$directoryName = Routines::getHash($model->entity, $model->id);
		$result = Routines::makeUploadDirectory($directoryName);

		// Session::flush();
		// Session::put('created.entity', $model->entity);
		// Session::put('created.pid', $model->id);
		// Session::put('created.hash', $directoryName);
		//add everything to sessions.
	}
}