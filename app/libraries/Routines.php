<?php

class Routines {

	private static $pathImages = 'uploads/';

	public static function getHash($entity,$id)
	{
		return md5($entity.$id);
	}	

	public static function makeUploadDirectory($path)
	{
		return File::makeDirectory(self::$pathImages.$path, 0775);
	}

	public static function addCreatedToSession($array)
	{
		Session::push('created', $array);
	}
}