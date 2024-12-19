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
    public function prosesDiagnosa(Request $request)
    {
        // Ambil minat bakat yang dipilih oleh pengguna
        $minatBakatPengguna = $request->input('minat_bakat'); // Misal: array('MB01', 'MB03')

        // Ambil semua jurusan dari database
        $jurusan = Jurusan::all();

        // Array untuk menyimpan hasil Certainty Factor (CF) setiap jurusan
        $hasilCF = [];

        // Proses perhitungan CF untuk setiap jurusan
        foreach ($jurusan as $item) {
            $cfCombine = 0; // Inisialisasi CF Combine
            $kriteria = $item->kriteria; // Kriteria sudah dalam bentuk array berkat casting

            // Hitung CF berdasarkan minat bakat pengguna
            foreach ($kriteria as $kode => $bobot) {
                if (in_array($kode, $minatBakatPengguna)) {
                    // Jika ini gejala pertama, langsung gunakan nilai CF
                    if ($cfCombine === 0) {
                        $cfCombine = $bobot;
                    } else {
                        // Hitung CF Combine menggunakan rumus
                        $cfCombine = $cfCombine + $bobot * (1 - $cfCombine);
                    }
                }
            }

            // Simpan hasil CF untuk setiap jurusan
            $hasilCF[] = [
                'jurusan' => $item->nama,
                'cf' => $cfCombine
            ];
        }

        // Urutkan hasil berdasarkan CF tertinggi
        usort($hasilCF, function ($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        // Ambil jurusan dengan CF tertinggi
        $jurusanTerkait = $hasilCF[0];

        // Tampilkan hasil diagnosa (jurusan yang paling cocok)
        return view('diagnosa.hasil_diagnosa', [
            'jurusanTerkait' => $jurusanTerkait,
            'hasilCF' => $hasilCF
        ]);
    }
}
