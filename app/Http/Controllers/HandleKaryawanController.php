<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::paginate(50);
        return view('admin/handleKaryawan/index', compact('karyawans'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawanId = Karyawan::where('user_id',$id)->first();
        $user_task_proses = UserTask::where('user_id', $karyawanId->user_id)->where('progress','proses')->get();
        $user_task_check = UserTask::where('user_id', $karyawanId->user_id)->where('progress','check')->get();
        $user_task_revisi = UserTask::where('user_id', $karyawanId->user_id)->where('progress','revisi')->get();
        $user_task_selesai = UserTask::where('user_id', $karyawanId->user_id)->where('progress','selesai')->get();
        $user_task_gagal = UserTask::where('user_id', $karyawanId->user_id)->where('progress','gagal')->get();

        $karyawan = Karyawan::where('user_id',$id)->first();
        return view('admin/handleKaryawan/show',
         compact('karyawan', 'user_task_proses', 'user_task_check', 'user_task_revisi', 'user_task_selesai', 'user_task_gagal'));
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
    public function update(Request $request, $id)
    {
        //
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
