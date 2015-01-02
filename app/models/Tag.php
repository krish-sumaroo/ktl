<?php

class Tag extends Eloquent
{
	protected $table = 'tags';

public function scopeEntity($query, $entity)
    {
        return $query->where('entity', '=', $entity);
    }

public function scopeValidated($query)
{
    return $query->whereStatus(1);
}

public function scopeTitle($query, $title)
{
	return $query->whereTitle($title);
}

public function scopeNotvalidated($query)
{
	return $query->whereStatus(0);
}
	
}