<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog()
    {

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } // End Method
}
