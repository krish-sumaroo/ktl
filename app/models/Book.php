<?php
use ktlobv\Observers\PostObserver;

class Book extends Eloquent
{
	
	public $entity;
	private $filters = array('title' => array('type' => 'string', 'op' => 'LIKE'),
						 'author' => array('type' => 'string', 'op' => 'LIKE'),
						 'published' => array('type' => 'range', 'op' => 'BETWEEN', 'start' => 'pubStart', 'end' => 'pubEnd'),
						 'price' => array('type' => 'range', 'op' => 'BETWEEN', 'start' => 'prStart', 'end' => 'prEnd')	
	);

	public static function boot()
    {
        parent::boot();

        Book::observe(new PostObserver);
    }

    public function scopeFilter($query)
    {
    	$query->where('title', 'LIKE', '%sh%');
    	$query->whereBetween('year', ['1981','2007']);
    	return $query;
    }

    public static function filterXXX($filtersArr)
    {
    	$model = $this;

    	foreach ($filtersArr as $column => $value) {
    		switch ($this->filters[$column]['type']) {
    			case 'string':
    				$model->where($column, 'LIKE', "%$value%");
    				break;
    			case 'range':
    				$model->whereBetween($column, explode('|', $value));    			
    			default:
    				# code...
    				break;
    		}
    	}

    	return $model->get();
    }
}