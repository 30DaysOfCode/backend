<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submissions = Submission::all();

        return response()->json(['status' => 'success', 'data' => $submissions],200);
 
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'community_id' => 'required',
            'task_day' => 'required',
            'url' => 'required',
            'level' => 'required',
            'points' => 'required',
            'submission_date' => 'required',
            'track' => 'required',
            'comment' => 'required',
            'feedback' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $submission = new Submission();
        $submission->user_id = $request->get('user_id');
        $submission->community_id = $request->get('community_id');
        $submission->task_day = $request->get('task_day');
        $submission->url = $request->get('url');
        $submission->level = $request->get('level');
        $submission->points = $request->get('points');
        $submission->submission_date = $request->get('submission_date');
        $submission->track = $request->get('track');
        $submission->comment = $request->get('comment');
        $submission->feedback = $request->get('feedback');

        if($submission->save()) {
            return response()->json(['status' => 'success','message' => 'Submissions has been created successfully'],200);
        }

        return response()->json(['status' => 'error', 'message' => 'An error occurred'],200);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $submission = Submission::find($request->get('user_id'));

        if($submission == null) {
            return response()->json(["status" => "success", "message"  => 'This submission does not exist'],200);
        }

        return response()->json(["status" => "success", "data" => $submission],200);
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'community_id' => 'required',
            'task_day' => '',
            'url' => '',
            'level' => '',
            'points' => '',
            'submission_date' => '',
            'track' => '',
            'comment' => '',
            'feedback' => '',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $submission = Submission::find($request->get('user_id'));
        $submission->community_id = $request->get('community_id');
        $submission->task_day = $request->get('task_day');
        $submission->url = $request->get('url');
        // $submission->level = $request->get('level');
        $submission->points = $request->get('points');
        $submission->submission_date = $request->get('submission_date');
        // $submission->track = $request->get('track');
        $submission->comment = $request->get('comment');
        $submission->feedback = $request->get('feedback');

        if($submission->save()) {
            return response()->json(['status' => 'success','message' => 'Submissions has been created successfully'],200);
        }

        return response()->json(['status' => 'error', 'message' => 'An error occurred'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
