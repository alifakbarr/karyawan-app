<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::get();

        return view('admin/job/index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = new Job;
        return view('admin/job/create', compact('job'));
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
            'nama' => 'required|unique:jobs',
            'keterangan' =>'required'
        ],[
            'nama.required' => 'Nama belum diisi',
            'nama.unique' => 'Pekerjaan sudah ada',
            'keterangan.required' => 'Deskripsi belum diisi',
        ]);

        $data = $request->all();
        session()->flash('success','Job telah ditambahkan');
        Job::create($data);

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job =  Job::where('id',$id)->first();
        return view('admin/job/show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::where('id',$id)->first();

        return view('admin.job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Job $job)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required'
        ],[
            'nama' => 'Nama Belum diisi',
            'keterangan' => 'Descripsi belum diisi'
        ]);

        $data = $request->all();
        $job->update($data);
        return redirect()->route('job.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::find($id)->delete();
        return redirect()->route('job.index');

    }
}
