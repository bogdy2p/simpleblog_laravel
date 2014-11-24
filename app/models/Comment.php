<?php

class Comment extends Eloquent {

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';
    
        
    
    
    
    public function post() {
        
        return $this->belongsTo('Post');
    }

}
