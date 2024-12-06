<?php

namespace App\Http\Controllers;

use App\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::all();
        return view('about', compact('texts'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $text = Text::create($request->all());

        return response()->json(['success' => true, 'content' => $text->content]);
    }

    public function edit(Text $text)
    {
        return view('edit', compact('texts'));
    }

    public function update(Request $request, Text $text)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $text->update($request->all());

        return redirect()->route('texts.index');
    }

    public function destroy(Text $text)
    {
        $text->delete();
        return redirect()->route('texts.index');
    }


}
