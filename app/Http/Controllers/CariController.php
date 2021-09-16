<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Karyawan;
use App\Models\Task;
use Illuminate\Http\Request;

class CariController extends Controller
{
    public function cariAdmin(Request $request){
        $cari = $request->cari;
        $karyawans = Karyawan::where('nama','like',"%".$cari."%")->paginate(20);
        $tasks = Task::where('judul','like',"%".$cari."%")->paginate(20);
        $jobs = Job::where('nama','like','%'.$cari."%")->paginate(20);
        if(!$karyawans->isEmpty()){
            return view('admin/handleKaryawan/index', compact('karyawans'));
        }elseif(!$tasks->isEmpty()){
            return view('admin/task/index', compact('tasks'));
        }elseif(!$jobs->isEmpty()){
            return view('admin/job/index', compact('jobs'));
        }
        else{
            return view('admin/layout/blank');
        }
    }

    public function cariHeadOf(Request $request){
        $cari = $request->cari;
        $karyawans = Karyawan::where('nama','like',"%".$cari."%")->paginate(20);
        $tasks = Task::where('judul','like',"%".$cari."%")->paginate(20);
        if(!$karyawans->isEmpty()){
            return view('admin/handleKaryawan/index', compact('karyawans'));
        }elseif(!$tasks->isEmpty()){
            return view('admin/task/index', compact('tasks'));
        }else{
            return view('admin/layout/blank');
        }
    }

    public function cariUser(Request $request){
        $cari = $request->cari;
        $karyawans = Karyawan::where('nama','like',"%".$cari."%")->paginate(20);
        $tasks = Task::where('judul','like',"%".$cari."%")->paginate(20);
        if(!$tasks->isEmpty()){
            return view('taskKaryawan/index', compact('tasks'));
        }else{
            return view('admin/layout/blank');
        }
    }
}
