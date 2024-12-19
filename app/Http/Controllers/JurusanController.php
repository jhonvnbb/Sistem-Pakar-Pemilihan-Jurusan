<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\MinatBakat;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::all();
        return view('admin.jurusan.index', compact('data'));
    }

    public function create()
    {
        $minatBakat = MinatBakat::all();
        return view('admin.jurusan.create', compact('minatBakat'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'kode' => 'required|unique:jurusans,kode',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'kriteria' => 'required|array', 
            'bobot' => 'required|array',
        ]);
    
        $kriteria = [];
        foreach ($validated['kriteria'] as $index => $kode) {
            if (isset($validated['bobot'][$index])) {
                $kriteria[$kode] = (float) $validated['bobot'][$index];
            }
        }
    
        Jurusan::create([
            'kode' => $validated['kode'],
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'],
            'kriteria' => json_encode($kriteria),
        ]);
    
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $minatBakat = MinatBakat::all(); 
        $kriteria = json_decode($jurusan->kriteria, true);
        return view('admin.jurusan.edit', compact('jurusan', 'minatBakat', 'kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'kriteria' => 'required|array',
            'bobot' => 'required|array',
        ]);
    
        $jurusan = Jurusan::findOrFail($id);
    
        $kriteriaData = [];
        foreach ($request->kriteria as $kode => $value) {
            if (isset($request->bobot[$kode])) {
                $kriteriaData[$kode] = (float) $request->bobot[$kode];
            }
        }
    
        $jurusan->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kriteria' => json_encode($kriteriaData),
        ]);
   
        return redirect()->route('admin.jurusan.index')->with('success', 'Data berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();
        return redirect()->route('admin.jurusan.index')->with('success', 'Data berhasil dihapus.');
    }
}
