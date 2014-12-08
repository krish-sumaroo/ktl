<?php namespace ktlobv\Observers;

use Log;
use File;

class PostObserver {
	public function created($model)
	{
		$directoryName = md5($model->entity.$model->id);
		Log::info("direc => ".$model->entity.$model->id);
		$result = File::makeDirectory('uploads/'.$directoryName, 0775);
	}
}