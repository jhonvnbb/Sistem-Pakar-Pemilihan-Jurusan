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
    
        // Array untuk menyimpan hasil diagnosa
        $hasilDiagnosa = [];
    
        foreach ($jurusan as $item) {
            // Pastikan kriteria berupa array
            $kriteria = is_array($item->kriteria) ? $item->kriteria : json_decode($item->kriteria, true);
    
            // Validasi apakah kriteria berhasil di-decode menjadi array
            if (!is_array($kriteria)) {
                continue; // Lewati jika kriteria tidak valid
            }
    
            // Hitung total bobot sebelum normalisasi
            $totalBobotAsli = array_sum($kriteria);
    
            // Normalisasi bobot agar totalnya menjadi 100%
            $kriteriaDinormalisasi = [];
            foreach ($kriteria as $kode => $bobot) {
                $kriteriaDinormalisasi[$kode] = $totalBobotAsli > 0 ? ($bobot / $totalBobotAsli) * 100 : 0;
            }
    
            $matchCount = 0;
            $totalBobot = 0;
    
            // Hitung jumlah kecocokan menggunakan bobot yang dinormalisasi
            foreach ($kriteriaDinormalisasi as $kode => $bobot) {
                $totalBobot += $bobot; // Total bobot kriteria
                if (in_array($kode, $minatBakatPengguna)) {
                    $matchCount += $bobot; // Tambahkan bobot jika cocok
                }
            }
    
            // Hitung Confidence Factor (CF)
            $cf = ($totalBobot > 0) ? ($matchCount / $totalBobot) : 0;
    
            // Simpan hasil diagnosa
            $hasilDiagnosa[] = [
                'jurusan' => $item->nama,
                'deskripsi' => $item->deskripsi,
                'jumlah_kecocokan' => $matchCount,
                'total_kriteria' => count($kriteria),
                'persentase' => $cf * 100, // Persentase kecocokan
                'cf' => $cf, // Faktor keyakinan
            ];
        }
    
        // Urutkan hasil berdasarkan persentase kecocokan tertinggi
        usort($hasilDiagnosa, function ($a, $b) {
            return $b['persentase'] <=> $a['persentase'];
        });
    
        // Ambil jurusan dengan kecocokan tertinggi (jika ada)
        $jurusanTerkait = $hasilDiagnosa[0] ?? null;
    
        // Tampilkan hasil diagnosa
        return view('diagnosa.hasil_diagnosa', [
            'jurusanTerkait' => $jurusanTerkait,
            'hasilDiagnosa' => $hasilDiagnosa
        ]);
    }
}
