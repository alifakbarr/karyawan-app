<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UserTask;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::doesntHave('user_tasks')
        ->with(['user_tasks'])
            ->paginate(20);
        return view('taskKaryawan/index', compact('tasks'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $checkUser = UserTask::where('user_id',Auth::user()->id)->first();
        
        $task = Task::where('id',$id)->first();
        return view('taskKaryawan/show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function myTask($id){
        $user_task = UserTask::with('task')->where('user_id',Auth::user()->id)->get();
        // dd($user_task->id);
        $tasks = Task::has('user_tasks')->with(['user_tasks'])->get();


        return view('taskKaryawan/myTask', compact('user_task','tasks'));
    }

    public function showMyTask($id){
        $task = Task::where('id', $id)->first();
        $user_task_id = UserTask::where('task_id', $task->id)->first();

        return view('taskKaryawan/showMyTask',compact('task','user_task_id'));
    }

    public function edit($id)
    {
        $user_task = UserTask::where('id', $id)->first();
        return view('taskKaryawan/edit', compact('user_task'));
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
        $user_task = UserTask::find($id);
        if($user_task->progress === 'proses'){
            $data = $request->all();
            $data['progress'] = 'check';
            $user_task->update($data);
        }else{
            $data = $request->all();
            $data['progress'] = 'check';
            $user_task->update($data);
        };
        // $data = $request->all();
        // $user_task->update($data);

        return redirect()->route('taskKaryawan.index');
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
