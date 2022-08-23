<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Doctrine\DBAL\Cache\ArrayResult;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function postBlog(){
        return view('post');
    }
    public function viewBlog(){
        return view('blogs', ['blogs' => Blog::all()]);
    }

    public function post(Request $request){
        $request->validate([
            'blogGenre' => 'required',
            'blogTitle' => 'max:30',
            'blogContent' => 'min:30',
            'blogImage' => 'image|nullable',
        ]);


//        handle file upload
        if($request->hasFile('blogImage')){
//            get filename with extension
            $filenameWithExt = $request->file('blogImage')->getClientOriginalName();
//            get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//            get just the extension
            $extension = $request->file('blogImage')->getClientOriginalExtension();
//            filename to store
            $filenameToStore = $filename.'_'.time().'_'.$extension;
                //upload the image
            $path = $request->file('blogImage')->storeAs('public/blogImages', $filenameToStore);
        }else{
            $fileNameToStore = 'noImage.jpg';
        }

            $newBlogItem = new Blog();
            $newBlogItem->postedBy = auth()->user()->id;
            auth()->user()->posts = auth()->user()->posts + 1;
//            dd($newBlogItem);
//            auth()->user()->posts->push();

            $newBlogItem->blogTitle = $request->blogTitle;
            $newBlogItem->blogImage = $filenameToStore;
            $newBlogItem->blogGenre = $request->blogGenre;
            $newBlogItem->blogContent = $request->blogContent;
            $newBlogItem->save();
//            dd(auth()->user()->posts);
            return view('blogs', ['blogs' => Blog::all()]);
    }


    public function readBlog($id){
        $newBlogItem = Blog::find($id);
        $newBlogItem->readsCounts = $newBlogItem->readsCounts + 1;
        $newBlogItem->save();
//        $newBlogItem = Blog::find($id);
        return view('read',compact('newBlogItem'));
    }

    public function likeBlog($id){
        $newLikedBlog = Blog::find($id);
        $newLikedBlog->no_of_likes = $newLikedBlog->no_of_likes + 1;
        $newLikedBlog->save();
        return redirect()->back();
//        return view('read',compact('newBlogItem'));
    }

    public function deleteBlog($id){
        $blogItem = Blog::find($id);
        $blogItem->delete();
        return view('blogs', ['blogs' => Blog::all()]);
    }

    public function followBlogger($id){
        $newFollowItem = Blog::find($id);
        $newFollowItem->user->followers = $newFollowItem->user->followers + 1;
        $newFollowItem->push();
        $currentlyLoggedIn = auth()->user()->id;
        $printThis = User::where('id', $currentlyLoggedIn)->first();
        $printThis->following = $printThis->following + 1;
        $printThis->save();
        return redirect()->back();
    }

    public function addComment(Request $request, $id){
        $request->validate([
            'commentContent' => 'min:1',
        ]);
        $helperVariable = Blog::find($id);
        $newComment = new Comment();
        $newComment->blog_id = $helperVariable -> id;
        $newComment->user_id = auth()->user()->id;
        $newComment->commentContent = $request->commentSection;
        $newComment->save();
        return redirect()->back();
    }

    public function commentSection($id){
//        $newCommentSection = Blog::find($id);
//        dd($newCommentSection->comment->comments_id);

        $newCommentSection = Comment::where("blog_id",$id)->get();
//        dd($newCommentSection);
//        $newCommentSection = Blog::find($id);
//        $newCommentSection = $newCommentSection->comment;
        return view('comments', compact('newCommentSection'));
    }

    public function likeComment($id){
        $newLikedComment = Comment::find($id);
        $newLikedComment->commentLikes = $newLikedComment->commentLikes + 1;
        $newLikedComment->isLiked = true;
        $newLikedComment->save();
//        dd($newLikedComment->commentLikes);
        return redirect()->back();
    }

    public function dislikeComment($id){
        $newDislikedComment = Comment::find($id);
        $newDislikedComment->commentDislikes = $newDislikedComment->commentDislikes + 1;
        $newDislikedComment->isDisliked = true;
        $newDislikedComment->save();
//        dd($newDislikedComment->commentDislikes);
        return redirect()->back();
    }
}
