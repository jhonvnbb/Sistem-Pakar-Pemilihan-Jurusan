<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\MinatBakat;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    // Menampilkan halaman diagnosa
    public function index()
    {
        // Ambil semua minat bakat yang ada di database
        $minatBakat = MinatBakat::all();
        
        // Tampilkan halaman diagnosa
        return view('diagnosa.index', compact('minatBakat'));
    }

    // Proses diagnosa untuk menentukan jurusan yang cocok
        // Proses Diagnosa untuk mencocokkan jurusan dengan minat bakat pengguna
        public function prosesDiagnosa(Request $request)
        {
            // Ambil minat bakat yang dipilih oleh pengguna
            $minatBakatPengguna = $request->input('minat_bakat'); // Misal: array('MB01', 'MB03')
    
            // Ambil semua jurusan dari database
            $jurusan = Jurusan::all();
    
            // Array untuk menyimpan hasil kecocokan antara jurusan dan minat bakat
            $hasilKesesuaian = [];
    
            // Proses perhitungan kesesuaian
            foreach ($jurusan as $item) {
                $kesesuaian = 0;
                $kriteria = $item->kriteria; // Kriteria sudah dalam bentuk array berkat casting
    
                // Periksa kecocokan antara minat bakat pengguna dan kriteria jurusan
                foreach ($kriteria as $kode => $bobot) {
                    if (in_array($kode, $minatBakatPengguna)) {
                        $kesesuaian += $bobot;  // Jumlahkan bobot kecocokan
                    }
                }
    
                // Simpan hasil kesesuaian untuk setiap jurusan
                $hasilKesesuaian[] = [
                    'jurusan' => $item->nama,
                    'kesesuaian' => $kesesuaian
                ];
            }
    
            // Urutkan hasil berdasarkan kesesuaian tertinggi
            usort($hasilKesesuaian, function ($a, $b) {
                return $b['kesesuaian'] - $a['kesesuaian'];
            });
    
            // Ambil jurusan dengan kesesuaian tertinggi
            $jurusanTerkait = $hasilKesesuaian[0];
    
            // Tampilkan hasil diagnosa (jurusan yang paling cocok)
            return view('diagnosa.hasil_diagnosa', compact('jurusanTerkait'));
        }

}
