<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\FavoriteGames;
use App\Models\Game;
use App\Models\GameCase;
use App\Models\Page;
use App\Models\PointUse;
use App\Models\SpinWin;
use App\Models\UserPoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response; // Import the Response class


class WebController extends Controller
{
//    public function index(){
//        $slider = Blog::latest()->whereStatus(1)->wherePosition(0)->limit(4)->get();
//        $blogs = Blog::whereStatus(1)->latest()->limit(9)->wherePosition(1)->get();
//
//        return view('frontEnd.home.index',compact('slider','blogs'));
//    }

//
//    public function index()
//    {
//        $slider = Blog::latest()->whereStatus(1)->wherePosition(0)->limit(4)->get();
//        $blogs = Blog::whereStatus(1)->latest()->wherePosition(1)->get();
//
//        $featuredBlog = $blogs->splice(0, 1)->first(); // Extract the first post
//        $remainingBlogs = $blogs->take(8); // Take the next 8 posts for grid view
//
//        return view('frontEnd.home.index', compact('slider', 'featuredBlog', 'remainingBlogs'));
//    }

    public function spin()
    {
        $spins = GameCase::whereStatus(1)->get();
        if (auth()->check()) {
            $user = auth()->user()->id;
            $points = UserPoint::where('user_id', $user)->sum('point');
            $use_point = PointUse::where('user_id', $user)->sum('point');
            $left_point = $points - $use_point;
        } else {
            // Set $left_point to 0 or handle it accordingly if there's no authenticated user
            $left_point = 0;
        }
        return view('frontEnd.home.index', compact('spins', 'left_point'));
    }


    public function spinWin()
    {
        $profile = auth()->user()->id;

        $wins_skins = SpinWin::latest()->where('user_id', $profile)->get();

        return view('frontEnd.wins.wins', compact('wins_skins'));
    }



    public function blogDetails($slug){
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $comments = Comment::where('blog_id', $blog->id)->get();

        $wordCount = str_word_count(strip_tags($blog->main_content));
        $readingTime = ceil($wordCount / 200);
        return view('frontEnd.blog.details',compact('blog','comments','readingTime'));
    }

    public function category($slug) {
        $ct = Category::where('slug', $slug)->firstOrFail();

        // Fetch blog posts for the given category
        $blogs = Blog::where('category_id', 'LIKE', '%"'.$ct->id.'"%')->whereStatus(1)->get();

        // Decode the category IDs for each blog post
        $nextBlog = $blogs->map(function($blog) {
            $categoryIds = json_decode($blog->category_id, true);
            $categories = [];

            // Fetch category details for each category ID
            foreach ($categoryIds as $categoryId) {
                $category = Category::find($categoryId);
                if ($category) {
                    $categories[] = $category;
                }
            }

            // Add categories to the blog post object
            $blog->categories = $categories;
            return $blog;
        });

        // Pass the category and related blog posts to the view
        return view('frontEnd_old.blog.category', compact('ct', 'nextBlog'));
    }

    public function privacyPolicy(){
        $privacy = Page::find(1);
        return view('frontEnd_old.pages.privacy',compact('privacy'));
    }


    public function searchRecipe(Request $request){
        $search = '%' . $request->input('search') . '%';

        $cleanedSearch = str_replace('%', '', $search);

        $blog = Blog::where('name', 'like', $search)
            ->orWhere('description', 'like', $search)
            ->orWhere('main_content', 'like', $search)
            ->orWhere('ingredients', 'like', $search)
            ->get();

        return view('frontEnd_old.blog.search', compact('blog', 'cleanedSearch'));
    }

    public function siteMap(): Response // Update the type hint to Illuminate\Http\Response
    {
        $posts = Blog::latest()->get();

        return response()->view('sitemap', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }




}
