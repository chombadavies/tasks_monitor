<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $tasks = Task::all();
        
        return response()->json($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)

    {

    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $task=Task::create($data);
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tasks)
    {
        //
    }

    public function users(){
        $users = User::all();
        
        return response()->json($users);
    }

public function assignTasks(Request $request){
    $user = $request->user(); 
    $tasks = $user->tasks()->get(); 
    
    return response()->json($tasks);
}

}
