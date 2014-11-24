<?php

class PostControler extends BaseController {
    /* functii get */

    public function listPost() {
        $posts = Post::orderB('id', 'desc')->paginate(10);
        $this->layout->title = 'Post listings';
        $this->layout->main = View::make('dash')->nest('content', 'posts.list', compact('posts'));
    }

    public function showPost(Post $post) {
        $comments = $post->comments()->where('approved', '=', 1)->get();
        $this->layout->title = $post->title;
        $this->layout->main = View::make('home')->nest('content', 'posts.single', compact('post', 'comments'));
    }

    public function newPost() {
        $this->layout->title = 'New Post';
        $this->layout->main = View::make('dash')->nest('content', 'posts.new');
    }

    public function editPost(Post $post) {
        $this->layout->title = 'Edit Post';
        $this->layout->main = View::make('dash')->nest('content', 'posts.edit', compact('post'));
    }

    public function deletePost(Post $post) {
        $post->delete();
        return Redirect::route('post.list')->with('success', 'Post is deleted!');
    }

    /* functii post */

    public function savePost() {
        $post = [];
        $rules = [];
        $valid = Validator::make($post,$rules);
        
        if ($valid->passes()){
            $post = new Post($post);
            $post->comment_count = 0;
            $post->read_more = (strlen($post->content) > 120) ? substr($post->content, 0, 120) : $post->content;
            $post->save();
            return Redirect::to('admin/dash-board')->with('success','Post is saved!');
        }
        else{
            return Redirect::back()->withErrors($valid)->withInput();
        }
    }

    public function updatePost(Post $post) {
        
    }

}
