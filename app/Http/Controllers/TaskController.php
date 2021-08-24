<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        return view('admin/task/index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        return view('admin/task/create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:tasks',
            'keterangan' => 'required',
            'start' => 'required',
            'deadLine' => 'required',
        ],[
            'judul.required' => 'Task judul wajib diisi',
            'judul.unique' => 'Task judul sudah ada',
            'keterangan.required' => 'Keterangan wajib diisi',
            'start.required' => 'Waktu mulai belum diisi',
            'deadLine.required' => 'Waktu akhir belum diisi'
        ]);

        $data = $request->all();
        Task::create($data);

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('id',$id)->first();
        return view('admin/task/show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('id',$id)->first();
        return view('admin.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'start' => 'required',
            'deadLine' => 'required',
        ],[
            'judul.required' => 'Task judul wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi',
            'start.required' => 'Waktu mulai belum diisi',
            'deadLine.required' => 'Waktu akhir belum diisi'
        ]);

        $data = $request->all();
        $task->update($data);

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->back();
    }
}
