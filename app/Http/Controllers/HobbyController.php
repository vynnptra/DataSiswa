<?php

namespace App\Http\Controllers;

use App\Jobs\UploadFile;
use App\Models\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobbys = Hobby::all();

        return view('hobby.index', ['hobbys' => $hobbys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'file' => 'required|mimes:docx,pdf|max:240000',
        ], [
            'name.required' => 'The hobby name field is required.',
            'name.min' => 'The hobby name must be at least 3 characters long.',
            'file.mimes' => 'The file must be a .docx or .pdf file',
            'file.max' => 'The file must be less than 240000 bytes.',
        ]);
    
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
    
        // Simpan ke storage/app/temp/
        $tempPath = $file->storeAs('temp', $fileName);
    
        $hobby = \App\Models\Hobby::create([
            'name' => $request->name,
            'file' => null,
        ]);
    
        UploadFile::dispatch($tempPath, $fileName, $hobby->id);
    
        return redirect()->route('hobby.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Hobby $hobby)
    {
        return view('hobby.show', ['hobby' => $hobby]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hobby $hobby)
    {
        
        return view('hobby.edit', ['hobby' => $hobby]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hobby $hobby)
    {
        $request->validate([
            'name' => 'required|min:3',
        ],[
            'name.required' => 'The hobby name field is required.',
            'name.min' => 'The hobby name must be at least 3 characters long.',
        ]);

        $find = Hobby::findOrFail($hobby->id);

        $find->update($request->all());

        return redirect()->route('hobby.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hobby $hobby)
    {
        $hobby->delete();

        return redirect()->route('hobby.index');
    }
}
