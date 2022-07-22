<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
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
            $fileNameToStore = 'noimage.jpg';
        }

            $newBlogItem = new Blog();
//            $newUserItem = new User();
            $newBlogItem->blogTitle = $request->blogTitle;
            $newBlogItem->postedBy = auth()->user()->id;
//            $newUserItem->user = $newUserItem->user + 1;
            $newBlogItem->blogImage = $filenameToStore;
            $newBlogItem->blogGenre = $request->blogGenre;
            $newBlogItem->blogContent = $request->blogContent;
            $newBlogItem->save();
            return view('blogs', ['blogs' => Blog::all()]);
    }

    public function readBlog($id){
        $newBlogItem = Blog::find($id);
        $newBlogItem->readsCounts = $newBlogItem->readsCounts + 1;
        $newBlogItem->save();
        $newBlogItem = Blog::find($id);
        return view('read',compact('newBlogItem'));
    }

    public function deleteBlog($id){
        $blogItem = Blog::find($id);
        $blogItem->delete();
        return view('blogs', ['blogs' => Blog::all()]);
    }

    public function addComment(Request $request, $id){
        $request->validate([
            'commentContent' => 'min:1',
        ]);
        $newComment = Blog::find($id);
        $newComment->commentContent = $request->commentSection;
        $newComment->save();
        return redirect()->back();
    }
}
