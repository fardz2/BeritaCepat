<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, String $slug)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }
        $validated = $validator->validated();
        $news = News::where("title_slug", $slug)->firstOrFail();
        $user = User::findOrFail($request->user()->id);
        $news->comments()->attach($user->id, [
            'comment' => $validated['comment'],
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Comment added successfully'
        ], 200);
    }
    public function destroy(Request $request, string $comment_id)
    {

        $commentPivot = Comment::findOrFail($comment_id);
        if ($request->user()->id == $commentPivot->user_id) {
            $commentPivot->delete();
        }
        return response()->json([
            'status' => 200,
            'message' => 'Comment deleted successfully'
        ], 200);
    }
}
