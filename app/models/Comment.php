<?php

class Comment extends Eloquent {

    protected $fillable = ['post_id', 'email', 'commenter', 'comment', 'approved', 'created_at', 'updated_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    public function post() {

        return $this->belongsTo('Post');
    }
    
    public function getApprovedAttribute($approved)
    {
        return (intval($approved) == 1) ? 'yes' : 'no';
    }

    public function setApprovedAttribute($approved)
    {
        $this->attributes['approved'] = ($approved === 'yes') ? 1 : 0;
    }

}
