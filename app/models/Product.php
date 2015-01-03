<?php

class Product extends Eloquent
{
	protected $table = 'products';

public function scopeEntity($query, $entity)
{
	return $query->whereEntity($entity);
}
	
}
