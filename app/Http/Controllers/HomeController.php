<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $posts = Post::with('community')->where('votes',  '>',0)->orderBy('votes', 'desc')->take(10)->get();

       /* $posts = Post::with('community')->withCount(['postVotes' => function($query) {
            $query->where('post_votes.created_at', '>', now()->subDays(7))
                ->where('vote', 1);
        }])->orderBy('post_votes_count', 'desc')->take(10)->get();
       */
        return view('home')->withPosts($posts);
    }
}
