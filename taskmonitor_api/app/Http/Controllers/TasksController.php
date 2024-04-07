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
    public function update(Request $request,$id)
    {
        $task=Task::findOrFail($id);
        $data=$request->all();
        $task->fill($data)->save();
        return response()->json(['message' => 'Task updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function users(){
        $users = User::all();
        
        return response()->json($users);
    }

public function assign(Request $request, $id)
{
    $task = Task::findOrFail($id);
    
    $userId = $request->input('user_id');
    
    $task->user_id = $userId;
    $task->save();
    
    return response()->json(['message' => 'Task assigned successfully'], 200);
}

public function userTasks(){
    

    return "we are here";
    $user = auth()->user();
if ($user) {
    $tasks = $user->tasks()->get();
    return response()->json($tasks);
} else {
    
    return response()->json(['error' => 'User not authenticated'], 401);
}



}

}
