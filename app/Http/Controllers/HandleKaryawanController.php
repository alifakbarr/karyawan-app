<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\ModelHasRoles;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HandleKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::paginate(20);   
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
        $roleId = DB::table('model_has_roles')->where('model_id',$id)->first();
        $user = DB::table('roles')->where('id',$roleId->role_id)->first();

        $user_task_proses = UserTask::where('user_id', $karyawanId->user_id)->where('progress','proses')->get();
        $user_task_check = UserTask::where('user_id', $karyawanId->user_id)->where('progress','check')->get();
        $user_task_revisi = UserTask::where('user_id', $karyawanId->user_id)->where('progress','revisi')->get();
        $user_task_selesai = UserTask::where('user_id', $karyawanId->user_id)->where('progress','selesai')->get();
        $user_task_gagal = UserTask::where('user_id', $karyawanId->user_id)->where('progress','gagal')->get();

        // $karyawan = Karyawan::where('user_id',$id)->first();
        
        // hitung
        $jumlah = (count($user_task_selesai)+count($user_task_gagal));
        $hitung = 0;
        if ($jumlah > 0) $hitung = (count($user_task_selesai) / $jumlah)*100;
        return view('admin/handleKaryawan/show',
         compact('user', 'karyawanId', 'user_task_proses', 'user_task_check', 'user_task_revisi', 'user_task_selesai', 'user_task_gagal','hitung'));
    }

    public function showTaskProses($id){
        // get user
        $karyawan = Karyawan::where('user_id',$id)->first();
        // get task
        $userTask = UserTask::where('user_id',$id)->where('progress','proses')->paginate(20);
        return view('admin/handleKaryawan/detail/showTask', compact('userTask', 'karyawan'));
    }

    public function showTaskCheck($id){
        // get user
        $karyawan = Karyawan::where('user_id',$id)->first();
        // get task
        $userTask = UserTask::where('user_id',$id)->where('progress','check')->paginate(20);
        return view('admin/handleKaryawan/detail/showTask', compact('userTask', 'karyawan'));
    }

    public function showTaskRevisi($id){
        // get user
        $karyawan = Karyawan::where('user_id',$id)->first();
        // get task
        $userTask = UserTask::where('user_id',$id)->where('progress','revisi')->paginate(20);
        return view('admin/handleKaryawan/detail/showTask', compact('userTask', 'karyawan'));
    }

    public function showTaskSelesai($id){
        // get user
        $karyawan = Karyawan::where('user_id',$id)->first();
        // get task
        $userTask = UserTask::where('user_id',$id)->where('progress','selesai')->paginate(20);
        return view('admin/handleKaryawan/detail/showTask', compact('userTask', 'karyawan'));
    }

    public function showTaskGagal($id){
        // get user
        $karyawan = Karyawan::where('user_id',$id)->first();
        // get task
        $userTask = UserTask::where('user_id',$id)->where('progress','gagal')->paginate(20);
        return view('admin/handleKaryawan/detail/showTask', compact('userTask', 'karyawan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showTaskKaryawan($id){
        $userTask = UserTask::where('id',$id)->first();
        $userId = UserTask::where('user_id',$id)->first();
        // dd($userTask);
        $karyawan = Karyawan::where('user_id',$userTask->user_id)->first();
        $roleId = DB::table('model_has_roles')->where('model_id',$karyawan->user_id)->first();
        $user = DB::table('roles')->where('id',$roleId->role_id)->first();
        return view('admin/handleKaryawan/detail/showTaskKaryawan', compact('userTask', 'karyawan','user'));
    }

    public function edit($id)
    {
        $userTask = UserTask::where('id',$id)->first();
        $karyawan = Karyawan::where('user_id',$userTask->user_id)->first();
        $progress = ['revisi','selesai', 'gagal'];
        return view('admin/handleKaryawan/form/edit', compact('userTask', 'karyawan', 'progress'));
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
        $userTask = UserTask::find($id);
        
        $data = $request->all();
        if($data['progress']==='Pilih Hasil'){
            $data['progress'] = $userTask->progress;
        }
        $userTask->update($data);
        // return redirect()->route('handleKaryawan.showTaskKaryawan',$userTask->user_id);
        return redirect()->back();

    }
    
    public function editRole($id){
        $karyawan = Karyawan::where('id',$id)->first();
        $roleId = DB::table('model_has_roles')->where('model_id',$karyawan->user_id)->first();
        $user = DB::table('roles')->where('id',$roleId->role_id)->first();
        $roles = ['1','2','3'];
        return view('admin/handleKaryawan/Role/edit', compact('karyawan','roles','user','roleId'));
    }

    public function updateRole(Request $request, $id){
        $role = ModelHasRoles::where('model_id',$id)->update([
            'role_id' =>$request->role_id
        ]);

        // $role = DB::table('model_has_roles')->where('model_id',$id)

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Karyawan $karyawan)
    {
        \Storage::delete($karyawan->foto);
        $user = User::where('id',$karyawan->user_id)->first();
        $user->delete();

        $karyawan->delete();

        return redirect()->route('handleKaryawan.index');
        // $kar = Karyawan::find($id);
    }
}
