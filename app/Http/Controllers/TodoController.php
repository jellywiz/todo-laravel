<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Notes;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $notes = auth()->user()->Notes()->get();
//        $notes = Notes::latest()->get();
        return view('welcome', ['notes' => $notes]);
    }

    public function destory(Notes $note){
        $note->delete();
        return back();
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required'
        ]);
        $formFields['status'] = 0;
        $formFields['user_id'] = auth()->id();

        Notes::create($formFields);
        return redirect('/');
    }

    public function updateStatus(Notes $note){
        $note->update(['status' => !$note->status]);

        return redirect()->back();
    }

}
