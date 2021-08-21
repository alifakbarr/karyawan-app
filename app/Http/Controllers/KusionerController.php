<?php

namespace App\Http\Controllers;

use App\Models\Kusioner;
use Illuminate\Http\Request;

class KusionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kusioners = Kusioner::get();

        return view('admin/kusioner/index', compact('kusioners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kusioner = new Kusioner();
        return view('admin/kusioner/create', compact('kusioner'));
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
            'pertanyaan' => 'required|unique:kusioner'
        ],[
            'pertanyaan.required' => 'Pertanyaan belum diisi',
            'pertanyaan.unique' => 'Petanyaan sudah ada'
        ]);

        $data = $request->all();
        Kusioner::create($data);

        return back();
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
        $kusioner = Kusioner::find($id)->first();

        return view('admin/kusioner/edit', compact('kusioner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kusioner $kusioner)
    {
        $request->validate([
            'pertanyaan' => 'required'
        ],[
            'pertanyaan.required' => 'Petanyaan belum disi'
        ]);

        $data = $request->all();
        $kusioner->update($data);

        return redirect()->route('kusioner.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kusioner::find($id)->delete();

        return back();
    }
}
