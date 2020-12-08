<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($courseID)
    {
        $course = Course::find($courseID);
        if($course === null || $course->ownerID != Auth::id())
            return redirect('home');
        else
            return view('courses.createPost')->with('courseID', $courseID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $courseID)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'start_date' => 'required'
        ]);

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->courseID = $courseID;
        $post->start_date = $request->input('start_date');
        $post->body = $request->input('body');
        $post->save();
        return redirect()->route( 'courses.show', ['course' => $courseID])->with('success', 'Lesson created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($courseID, $id)
    {
        $post = Post::find($id);
        return view('courses.lesson')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($courseID, $id)
    {
        $course = Course::find($courseID);
        $post = Post::find($id);
        if($course->ownerID == Auth::id())
            return view('courses.editPost')->with('course', $course)->with('post', $post);
        else
            return redirect('/home')->with('error', 'You have no access to course editing');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $courseID, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'start_date' => 'required'
        ]);

        // Create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->courseID = $courseID;
        $post->start_date = $request->input('start_date');
        $post->body = $request->input('body');
        $post->save();
        return redirect()->route( 'courses.show', ['course' => $courseID])->with('success', 'Lesson updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseID, $id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect()->route( 'courses.show', ['course' => $courseID])->with('success', 'Lesson deleted');
    }
}
