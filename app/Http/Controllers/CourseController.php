<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Course;
use App\Post;
use App\Participant;
use App\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('title','asc')->paginate(10);
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
*/
    public function create()
    {
        if (Auth::user()->role == 'lecturer')
            return view('courses.createCourse');
        else
            return redirect('/courses')->with('error', 'You have no access to course creation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'beginningDate' => 'required',
            'endingDate' => 'required'
        ]);

        // Create course
        $course = new Course;
        $course->title = $request->input('title');
        $course->ownerID = Auth::id();
        $course->description = $request->input('description');
        $course->beginDate = $request->input('beginningDate');
        $course->endingDate = $request->input('endingDate');
        $course->save();

        //add owner to participant list
        $participant = new Participant;
        $participant->participantID = Auth::id();
        $participant->courseID = $course->id;
        $participant->save();

        return redirect('/courses')->with('success', 'Course created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find course information
        $course = Course::find($id);
        //find lessons connected to this course
        $posts = Post::where('courseID', $id)->orderBy('start_date','asc')->paginate(10);

        //check if given course exists
        if($course === null)
            return redirect('home');
        else
            $owner = User::find($course->ownerID);
            $participant = Participant::where('courseID', $id)->where('participantID', Auth::id())->get();
            //return view with found data
            return view('courses.showCourse')->with('course', $course)
                                                   ->with('posts', $posts)
                                                   ->with('ownerName', $owner->name)
                                                   ->with('ownerSurname', $owner->surname)
                                                   ->with('ownerEmail', $owner->email)
                                                   ->with('participant', $participant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        if($course->ownerID == Auth::id())
            return view('courses.editCourse')->with('course', $course);
        else
            return redirect('/home')->with('error', 'You have no access to course course editing');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'beginningDate' => 'required',
            'endingDate' => 'required'
        ]);

        // Create course
        $course = Course::find($id);
        $course->title = $request->input('title');
        $course->ownerID = Auth::id();
        $course->description = $request->input('description');
        $course->beginDate = $request->input('beginningDate');
        $course->endingDate = $request->input('endingDate');
        $course->save();

        return redirect()->route( 'courses.show', ['course' => $id])->with('success', 'Course updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $posts = Post::where('courseID', $id)->delete();
        $participants = Participant::where('courseID', $id)->delete();

        $course->delete();

        return redirect('/home')->with('success', 'Course deleted');
    }

    public function AddToParticipantList($courseID)
    {
        $participant = new Participant;
        $participant->participantID = Auth::id();
        $participant->courseID = $courseID;
        $participant->save();

        return back();
    }

    public function RemoveFromParticipantList($courseID)
    {
        $course = Course::find($courseID);
        if ($course->ownerID != Auth::id())
            $participant = Participant::where('courseID', $courseID)->where('participantID', Auth::id())->delete();
        return back();
    }

    public function participantList($courseID)
    {
        $course = Course::find($courseID);
        return view('courses.participantList')->with('participants', $course->users)->with('ownerID', $course->ownerID);
    }
}
