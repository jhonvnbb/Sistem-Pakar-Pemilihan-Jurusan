<?php

namespace App\Http\Controllers;

use App\Models\MinatBakat;
use Illuminate\Http\Request;

class MinatBakatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = MinatBakat::when($search, function ($query, $search) {
            return $query->where('kode', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%")
                        ->orWhere('deskripsi', 'like', "%{$search}%");        
                    })
                    ->paginate(5);
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
            'detail' => 'required|string',
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
            'detail' => 'required|string',   
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