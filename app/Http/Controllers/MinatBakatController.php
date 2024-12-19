<?php

namespace App\Http\Controllers;

use App\Models\MinatBakat;
use Illuminate\Http\Request;

class MinatBakatController extends Controller
{
    public function index()
    {
        $data = MinatBakat::all();
        return view('admin.minat_bakat.index', compact('data'));
    }

    public function create()
    {
        return view('admin.minat_bakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'deskripsi' => 'required|string',
            'nilai_mb' => 'required|numeric|min:0|max:1',
        ]);

        MinatBakat::create($request->all());
        return redirect()->route('admin.minat_bakat.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $minatBakat = MinatBakat::findOrFail($id);
        return view('admin.minat_bakat.edit', compact('minatBakat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10',
            'deskripsi' => 'required|string',
            'nilai_mb' => 'required|numeric|min:0|max:1',
        ]);

        $minatBakat = MinatBakat::findOrFail($id);
        $minatBakat->update($request->all());

        return redirect()->route('admin.minat_bakat.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        MinatBakat::findOrFail($id)->delete();
        return redirect()->route('admin.minat_bakat.index')->with('success', 'Data berhasil dihapus.');
    }
}
