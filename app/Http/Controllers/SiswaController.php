<?php

namespace App\Http\Controllers;

use App\Models\Nisn;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nisn = Nisn::paginate(5);

        return view('siswa.index', ['nisns' => $nisn]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|min:10'
        ], [
            'nama.required' => 'Nama siswa harus diisi',
            'nama.min' => 'Nama siswa minimal 3 karakter',
            'nisn.required' => 'NISN siswa harus diisi',
            'nisn.min' => 'NISN siswa minimal 10 digit'
        ]);

        $siswa = Siswa::create([
            'nama' => $request->nama
        ]);

        Nisn::create([
            'nisn' => $request->nisn,
            'siswa_id' => $siswa->id
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nisn = Nisn::findOrFail($id);

        return view('siswa.show', ['nisn' => $nisn]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nisn = Nisn::findOrFail($id);

        return view('siswa.edit', ['nisn' => $nisn]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|min:10'
        ], [
            'nama.required' => 'Nama siswa harus diisi',
            'nama.min' => 'Nama siswa minimal 3 karakter',
            'nisn.required' => 'NISN siswa harus diisi',
            'nisn.min' => 'NISN siswa minimal 10 digit'
        ]);

        $siswa->update([
            'nama' => $request->nama
        ]);

        Nisn::where('siswa_id', '=', $request->siswa_id)->update([
            'nisn' => $request->nisn
        ]);
   

        // dd($request);



        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::find($id)->delete();
        Nisn::where('siswa_id', '=', $id)->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');

    }
}
