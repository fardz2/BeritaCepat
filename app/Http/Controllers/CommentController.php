<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string'
        ]);

        $news = News::findOrFail($id);
        $user = User::findOrFail($validated['user_id']);

        $news->comments()->attach($user->id, [
            'comment' => $validated['comment'],

        ]);
        return redirect()->route('news.show', $news->title_slug);
    }

    public function destroy(string $comment_id, string $id)
    {
        $news = News::findOrFail($id);
        $commentPivot = Comment::findOrFail($comment_id);
        $commentPivot->delete();
        return redirect()->route('news.show', $news->title_slug);
    }
}
