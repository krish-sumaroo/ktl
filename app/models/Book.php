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

    public function scopeFilterRef($query)
    {
    	$query->where('title', 'LIKE', '%sh%');
    	$query->whereBetween('year', ['1981','2007']);
    	return $query;
    }

    public function scopeFilter($query, $filterArr, $filterDef)
    {
        foreach ($filterArr as $column => $value) {
            switch ($filterDef[$column]['type']) {
                case 'string':
                     $query->where($column,$filterDef[$column]['op'],'%'.$value.'%');
                    break;
                case 'range':
                    $query->whereBetween($column, $value);
                break;
                
                default:
                    
                break;
            }
        }
        return $query;
    }

    public function scopeTagFilter($query, $tags)
    {
        $query->whereIn('id',$tags);
        return $query;
    }
 }