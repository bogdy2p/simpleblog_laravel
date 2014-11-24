<?php

class PostCommentSeeder extends Seeder {

    public function run() {

        $content = 'asdj;f snfkjds falds fjkdhaslf kdsh
                afk hagf sdagf kdajfkaj sdjakfd safgk sjaf
                sdjfa kfh gdsakjf dsfkads kfds saf
                fdsfdsfawbghghdv ana are mere asdj; asfhsl s
                dumm text 11djfa kfh gdsakjf dsfkads kfds saf
                fdsfdsfawbghghdv ana are mere asdj; asfhsl s
                dumm text 11djfa kfh gdsakjf dsfkads kfds saf
                fdsfdsfawbghghdv ana are mere asdj; asfhsl s
                dumm text 11
                ';
        for ($i = 1; $i <= 20; $i++) {

            $post = new Post;
            $post->title = "Post no $i";
            $post->read_more = substr($content, 0, 120);
            $post->content = $content;
            $post->save();


            $maxComments = mt_rand(3, 15);
            for ($j = 1; $j <= $maxComments; $j++) {

                $comment = new Comment;
                $comment->commenter = 'xyz';
                $comment->comment = substr($content, 0, 120);
                $comment->email = 'asd@vasile.com';
                $comment->approved = 1;
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }
    }

}
