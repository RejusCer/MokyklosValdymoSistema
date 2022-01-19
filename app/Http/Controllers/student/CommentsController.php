<?php

namespace App\Http\Controllers\student;

use App\Models\Comment;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->where('student_id', '=', Auth::guard('student')->user()->id)->get();

        return view('student.comments.index', [
            'comments' => $comments
        ]);
    }

    public function storeView()
    {
        $teachers = Teacher::all();

        return view('student.comments.create', [
            'student_id' => Auth::guard('student')->user()->id,
            'teachers' => $teachers
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
            'teacher_id' => $request->teacher_id,
            'student_id' => Auth::guard('student')->user()->id
        ]);

        return redirect()->route('student.comments.index')
            ->with('store', 'Komentaras pridėtas!');
    }

    // public function updateView(Comment $comment)
    // {
    //     return view('student.comments.update', [
    //         'comment' => $comment
    //     ]);
    // }

    // public function update(Comment $comment, Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|max:255',
    //         'description' => 'required|max:255'
    //     ]);

    //     $comment->title = $request->title;
    //     $comment->description = $request->description;

    //     $comment->save();

    //     return redirect()->route('student.comments')
    //         ->with('update', 'Komentaras atnaujintas!');
    // }

    // public function destroy(Comment $comment)
    // {
    //     $comment->delete();

    //     return redirect()->route('student.comments')
    //         ->with('destroy', 'Komentaras pašalintas');
    // }
}
