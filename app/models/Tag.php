<?php

class Tag extends Eloquent
{
	protected $table = 'tags';

	public function scopeEntity($query, $entity)
    {
        return $query->where('entity', '=', $entity);
    }

    public function scopeUserEntryDirty($query, $userId)
    {
    	$cond = ['user_id' => $userId, 'status' => 0];
    	return $query->where($cond);
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