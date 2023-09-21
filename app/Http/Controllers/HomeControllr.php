<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeControllr extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('home', [
            'featurePosts' => Post::published()->featured()->latest('publish_at')->take(3)->get(),
            'latestPosts' => Post::published()->latest('publish_at')->take(9)->get()
        ]);
    }
}
