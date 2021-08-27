<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::where('user_id',auth()->id())->first();
        return view('profilPage.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = new Karyawan();
        $jobs = Job::get();
        return view('profilPage.create', compact('karyawan', 'jobs'));
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
            'nip' => 'required|unique:karyawans',
        ],[
            'nip.required' => 'Nip wajib diisi',
            'nip.unique' => 'Nip sudah dipakai',
        ]);
        
        $data = $request->all();

        if($request->file('foto')){
            $foto = $request->file('foto')->store('images/karyawan');
        }else{
            $foto = null;
        }

        $data['job_id'] = request('job');
        $data['user_id'] = auth()->id();
        $data['foto'] = $foto;
        
        Karyawan::create($data);
        // Karyawan::create([
        //     'job_id' =>$request->job,
        //     'user_id' =>auth()->id(),
        //     'nip' => $request->nip,
        //     'nama' => $request->nama,
        //     'foto' => $request->file('foto')->store('karyawans/image'),
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'np_hp' => $request->no_hp,
        //     'email' => $request->email,
        //     'alamat' =>$request->alamat,
        // ]);

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
