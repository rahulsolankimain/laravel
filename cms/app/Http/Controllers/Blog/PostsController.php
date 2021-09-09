<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;

use App\Post;

use App\Tag;

use App\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post',$post);
    }

    public function category(Category $category) //Route MOdel Binding
    {
       /* $search = request()->query('search');

        if($search)
        {
            $posts = $category->posts()->where('title','LIKE',"%{$search}%")->simplePaginate(3);
        }
        else
        {
            $posts = $category->posts()->simplePaginate(3);
        } */
        return view('blog.category')
        ->with('category',$category) //for retriving cat
        ->with('posts',$category->posts()->searched()->simplePaginate(3)) //retrive posts by relation and pagination
        ->with('categories',Category::all()) //retrive all category data
        ->with('tags',Tag::all()); //retrive all tags 
    }

    public function tag(Tag $tag) //Route MOdel Binding
    {
        return view('blog.tag')
        ->with('tag',$tag)
        ->with('posts',$tag->posts()->searched()->simplePaginate(3))
        ->with('categories',Category::all()) //retrive all category data
        ->with('tags',Tag::all()); //retrive all tags 
    }
}
