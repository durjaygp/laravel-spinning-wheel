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
use App\Models\Skin;
use App\Models\SpinWin;
use App\Models\UserPoint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response; // Import the Response class


class WebController extends Controller
{
    public function spin()
    {
        $spins = GameCase::whereStatus(1)->get();
        if (auth()->check()) {
            $user = auth()->user()->id;
            $points = UserPoint::where('user_id', $user)->sum('point');
            $use_point = PointUse::where('user_id', $user)->sum('point');
            $left_point = $points - $use_point;
        } else {
            $left_point = 0;
        }

        $cases = Skin::whereStatus(1)->latest()->get();

        return view('frontEnd.home.index', compact('cases','spins', 'left_point'));
    }

    public function caseCategory($id)
    {
        try {
            // Retrieve spins related to the specified game case skin ID
            $spins = GameCase::where('skin_id', $id)->get();

            // Calculate left points if the user is authenticated
            if (auth()->check()) {
                $user = auth()->user()->id;
                $points = UserPoint::where('user_id', $user)->sum('point');
                $use_point = PointUse::where('user_id', $user)->sum('point');
                $left_point = $points - $use_point;
            } else {
                // If the user is not authenticated, set left_point to 0
                $left_point = 0;
            }

            // Retrieve details of the skin with the provided ID
            $case = Skin::findOrFail($id);

            // Retrieve all game cases related to the provided skin ID
            $skinss = GameCase::where('skin_id', $id)->get();

            // Return the view with the retrieved data
            return view('frontEnd.wheel.category_wheel', compact('skinss', 'case', 'spins', 'left_point'));
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., if the skin ID is not found)
            // You can customize the error response or log the error as needed
            return response()->json(['error' => 'Failed to load category data'], 500);
        }
    }


    public function spinWin()
    {
        $profile = auth()->user()->id;

        $wins_skins = SpinWin::latest()->where('user_id', $profile)->get();

        return view('frontEnd.wins.wins', compact('wins_skins'));
    }

    public function spinWheel()
    {
        $spins = GameCase::whereStatus(1)->get();
        if (auth()->check()) {
            $user = auth()->user()->id;
            $points = UserPoint::where('user_id', $user)->sum('point');
            $use_point = PointUse::where('user_id', $user)->sum('point');
            $left_point = $points - $use_point;
        } else {
            $left_point = 0;
        }
        return view('frontEnd.wheel.wheel', compact('spins', 'left_point'));
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
