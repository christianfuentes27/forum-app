<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentCreateRequest;

class CommentController extends Controller
{
    public function store(CommentCreateRequest $request)
    {
        try {
            $comment = new Comment($request->all());
            $comment->iduser = $request->session()->get('user')->id;
            $comment->save();
            return redirect('post');
        } catch(\Exception $e) {
            return back()->withInput($request->all())->withErrors(
                ['default' => 'Something went wrong']);
        }
        
    }

    public function edit(Comment $comment)
    {
        if(!session()->has('user') || !$comment->post->getMinutes($comment)) {
            session()->flash('message', 'Sorry but you cannot do this');
            return redirect('post');
        }
        return view('comment.edit', ['comment' => $comment]);
    }

    public function update(CommentCreateRequest $request, Comment $comment)
    {
        try {
            if(session()->get('user')->id != $comment->user->id) {
                session()->flash('message', 'You cannot access to foreign data');
            } else if(!$comment->post->getMinutes($comment)) {
                session()->flash('message', 'Time to edit expired');
            } else {
                $comment->update($request->all());
            }
            return redirect('post');
        } catch(\Exception $e) {
            return back()->withInput($request->all())->withErrors(
                ['default' => 'Something went wrong']);
        }
    }

    public function destroy(Comment $comment)
    {
        try {
            if(session()->get('user')->id != $comment->user->id) {
                session()->flash('message', 'You cannot access to foreign data');
            } else if(!$comment->post->getMinutes($comment)) {
                session()->flash('message', 'Time to delete expired');
            } else {
                $comment->delete();
            }
            return redirect('post');
        } catch(\Exception $e) {
            return back()->withErrors(
                ['default' => 'Error when deleting']);
        }
    }
}
