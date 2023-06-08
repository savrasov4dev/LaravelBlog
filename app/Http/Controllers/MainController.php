<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): array
    {
        $mostActiveUsers = User::query()
            ->selectRaw('name, count(p.id) as count_posts')
            ->join('posts as p', 'users.id', '=', 'p.user_id')
            ->groupBy('name')
            ->latest('count_posts')
            ->take(5)
            ->get()
            ->map(fn ($user) => $user['name'])
            ->toArray();


        $latestPublications = Post::query()
            ->select(['title', 'excerpt', 'name', 'posts.created_at'])
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->latest('created_at')
            ->take(5)
            ->get()
            ->toArray();

        return compact('mostActiveUsers', 'latestPublications');
    }
}
