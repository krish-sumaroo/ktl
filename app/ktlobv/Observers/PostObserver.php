<?php namespace ktlobv\Observers;

use Log;
use Routines;

class PostObserver {
	public function created($model)
	{
		$directoryName = Routines::getHash($model->entity, $model->id);
		Log::info("direc => ".$model->entity.$model->id);
		$result = Routines::makeUploadDirectory($directoryName);
	}
}