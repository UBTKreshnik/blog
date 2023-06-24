<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CommentsController extends Controller
{
    public function store(Request $request) {

        try {
            //code...
            $this->validate($request, [
                'text' => ['required', 'string', 'max:225'],
                'blog_id' => ['required', 'integer', Rule::in(Blogs::pluck('id')->toArray())]
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
        $comment = Comments::create(
            [
                'text' => $request->text,
                'blogs_id' => $request->blog_id,
                'user_id' => Auth::user()->id
            ]
        );    
        
        return back();
    }
}
