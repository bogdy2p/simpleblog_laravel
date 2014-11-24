<?php

class Post extends Eloquent {

    
    
        protected $fillable = ['title', 'read_more', 'content','comment_count','created_at','updated_at'];
    
    
    
    
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';
        
        
    
    
    
    public function comments() {

        return $this->hasMany('Comment');
    }

}
