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

}
