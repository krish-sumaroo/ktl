<?php

class Post extends Eloquent
{
	public function scopeEntity($query, $entity)
	{
		return $query->whereEntity($entity);
	}

}