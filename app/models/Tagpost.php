<?php

class Tagpost extends Eloquent
{
	protected $table = 'tags_post';
	public $timestamps = false;

	public function scopeItemIdByTag($query, $tags)
    {
        $query->where('tag_id',$tags);
        return $query->distinct()->lists('entity_id');
    }

    public function scopeTagsByItemId($query, $itemId)
    {
    	$query->where('entity_id', $itemId);
     	return $query;
    }
	
}