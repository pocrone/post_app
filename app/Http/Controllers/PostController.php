<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
        ];

        $insert = Post::create($data);
        if ($insert)
            return redirect(route('home'))->with('success', 'Berhasil Entry Data');
        else
            return redirect(route('home'))->with('failed', 'Gagal Entry Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = Post::find($request->id);
        return view('post.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = [
            'title' => $request->title,
            'desc' => $request->desc,
        ];

        $insert = Post::where('id', $request->id)->update($data);
        if ($insert)
            return redirect(route('home'))->with('success', 'Berhasil Update Data');
        else
            return redirect(route('home'))->with('failed', 'Gagal Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $insert = Post::where('id', $request->id)->delete();
        if ($insert)
            return redirect(route('home'))->with('success', 'Berhasil Delete Data');
        else
            return redirect(route('home'))->with('failed', 'Gagal Delete Data');
    }
}
