<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Utils\Responser;
use App\Models\UserStory;
use Illuminate\Http\Request;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project){
        $project->load('userStories.tickets');
        return Responser::ok('List of user stories by project',$project->toArray());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function show(UserStory $userStory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserStory $userStory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserStory $userStory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserStory  $userStory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStory $userStory)
    {
        //
    }
}
