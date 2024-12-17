<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
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
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string',
            'kriteria' => 'required|array',
        ]);

        Jurusan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kriteria' => json_encode($request->kriteria),
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string',
            'kriteria' => 'required|array',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kriteria' => json_encode($request->kriteria),
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();
        return redirect()->route('jurusan.index')->with('success', 'Data berhasil dihapus.');
    }
}
