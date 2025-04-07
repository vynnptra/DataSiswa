<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Nisn;
use App\Models\Siswa;
use App\Models\PhoneNumber;
use App\Models\SiswaHobby;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $siswas = Siswa::with('hobbies')->paginate(5);

        return view('siswa.index', ['siswas' => $siswas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobbies = Hobby::all();

        return view('siswa.create', compact('hobbies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|min:10',
            'phone_number' => 'required|array|min:1', 
            'phone_number.*' => 'distinct|unique:phone_numbers,phone_number', 
            'hobbies' => 'required|array|min:1',
        ], [
            'nama.required' => 'Nama siswa harus diisi',
            'nama.min' => 'Nama siswa minimal 3 karakter',
            'nisn.required' => 'NISN siswa harus diisi',
            'nisn.min' => 'NISN siswa minimal 10 digit',
            'phone_number.required' => 'Minimal 1 nomor telepon',
            'phone_number.*.distinct' => 'Nomor telepon tidak boleh sama',
            'phone_number.*.unique' => 'Nomor telepon sudah ada',
            'hobbies.required' => 'Minimal 1 hobi',
        ]);

        $siswa = Siswa::create([
            'nama' => $validate['nama']
        ]);

        Nisn::create([
            'nisn' => $validate['nisn'],
            'siswa_id' => $siswa->id
        ]);


        foreach ($validate['phone_number'] as  $phone) {
            PhoneNumber::create([
                'phone_number' => $phone,
                'siswa_id' => $siswa->id
            ]);
        }

        foreach ($validate['hobbies'] as $hobby) {
            SiswaHobby::create([
                'siswa_id' => $siswa->id,
                'hobby_id' => $hobby
            ]);
        }

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswas = Siswa::findOrFail($id);

        return view('siswa.show', ['siswa' => $siswas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::with('phoneNumbers')->findOrFail($id);
        $hobbies = Hobby::all();

        return view('siswa.edit', ['siswa' => $siswa, 'hobbies' => $hobbies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $siswa = Siswa::findOrFail($id);

        $validate = $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|min:10',
            'phone_number' => 'required|array|min:1', 
            'phone_number.*' => [
                'distinct',
                Rule::unique('phone_numbers', 'phone_number')->ignore($siswa->id, 'siswa_id'),
            ],
            'hobbies' => 'required|array|min:1',
        

        ], [
            'nama.required' => 'Nama siswa harus diisi',
            'nama.min' => 'Nama siswa minimal 3 karakter',
            'nisn.required' => 'NISN siswa harus diisi',
            'nisn.min' => 'NISN siswa minimal 10 digit',
            'phone_number.required' => 'Minimal 1 nomor telepon',
            'phone_number.*.distinct' => 'Nomor telepon tidak boleh sama',
            'phone_number.*.unique' => 'Nomor telepon sudah ada',
            'hobbies.required' => 'Minimal 1 hobi',
        ]);

        $siswa->update([
            'nama' => $validate['nama']
        ]);

        Nisn::where('siswa_id', '=', $id)->update([
            'nisn' => $validate['nisn']
        ]);


        PhoneNumber::where('siswa_id', '=', $id)->delete();

        foreach ($validate['phone_number'] as $phone) {
            PhoneNumber::Create([
            'phone_number' => $phone,
            'siswa_id' => $id
            ]);
        };

        SiswaHobby::where('siswa_id', '=', $id)->delete();

        foreach ($validate['hobbies'] as $hobby) {
            SiswaHobby::create([
                'siswa_id' => $id,
                'hobby_id' => $hobby
            ]);
        }


        // dd($request);



        return redirect()->route('siswa')->with('success', 'Siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::find($id)->delete();
        Nisn::where('siswa_id', '=', $id)->delete();

        return redirect()->route('siswa')->with('success', 'Siswa berhasil dihapus');

    }
}
