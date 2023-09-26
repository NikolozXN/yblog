<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreFeedbackRequest;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('posts.create-feedback');
    }

    public function store(StoreFeedbackRequest $request)
    {
        $validatedFeedback = $request->validated();
        $validatedFeedback['user_id'] = Auth::user()->id;
        Feedback::create($validatedFeedback);
        return redirect('/')->with('message', 'Feedback Created Successfully');
    }

    public function destroy(Feedback $feedback)
    {

        if (!Gate::allows('feedback-author', $feedback)) {
            abort(403, 'Unauthorized');
        }
        $feedback->delete();
        return redirect('/')->with('message', 'Your Feedback Deleted');
    }
}
