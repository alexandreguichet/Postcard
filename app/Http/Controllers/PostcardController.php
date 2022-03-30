<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postcard;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postcards = Postcard::all();
        return response()->json(['postcards' => $postcards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->file('picture_front')->store('pictures', 'public');
        $request->file('picture_back')->store('pictures', 'public');

        $data = [
            'user_id' => $request->user_id,
            'assignment_id' => $request->assignment_id,
            'title' => $request->title,
            'description' => $request->description,
            'picture_front' => '/storage/pictures/'.$request->picture_front->hashName(),
            'picture_back' => '/storage/pictures/'.$request->picture_back->hashName(),
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $postcard = Postcard::create($data);

        return response()->json(['postcard' => $postcard]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $postcard = Postcard::first(['user_id' => $request->user['user_id'], 'assignment_id' => $request->assignment_id]);
        $postcard->title = $request->title;
        $postcard->description = $request->description;
        $postcard->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $postcard = Postcard::first(['user_id' => $request->user['user_id'], 'assignment_id' => $request->assignment_id]);
        $postcard->delete();
        return response()->json(['postcard' => $postcard]);
    }
}
