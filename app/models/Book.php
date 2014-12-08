<?php
use ktlobv\Observers\PostObserver;

class Book extends Eloquent
{
	
	public $entity;

	public static function boot()
    {
        parent::boot();

        Book::observe(new PostObserver);
    }
}