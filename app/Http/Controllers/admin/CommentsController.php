<?php

namespace App\Http\Controllers\admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with('teacher', 'student')->get();

        return view('admin.comments.index', [
            'comments' => $comments
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.update', [
            'comment' => $comment
        ]);
    }

    public function update(Comment $comment, Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $comment->title = $request->title;
        $comment->description = $request->description;

        $comment->save();

        return redirect()->route('admin.comments.index')
            ->with('update', 'Komentaras atnaujintas!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')
            ->with('destroy', 'Komentaras pašalintas');
    }
}
