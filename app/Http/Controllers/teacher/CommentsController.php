<?php

namespace App\Http\Controllers\teacher;

use App\Models\Comment;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->where('teacher_id', '=', Auth::guard('teacher')->user()->id)->get();

        return view('teacher.comments.index', [
            'comments' => $comments
        ]);
    }

    public function storeView()
    {
        $students = Student::all();

        return view('teacher.comments.create', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:255'
        ]);

        Comment::create([
            'title' => $request->title,
            'description' => $request->description,
            'teacher_id' => Auth::guard('teacher')->user()->id,
            'student_id' => $request->student_id
        ]);

        return redirect()->route('teacher.comments.index')
            ->with('store', 'Komentaras pridėtas!');
    }

    public function updateView(Comment $comment)
    {
        return view('teacher.comments.update', [
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

        return redirect()->route('teacher.comments.index')
            ->with('update', 'Komentaras atnaujintas!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('teacher.comments.index')
            ->with('destroy', 'Komentaras pašalintas');
    }
}
