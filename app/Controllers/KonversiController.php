<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Validation\Validation;

class KonversiController extends Controller
{
    public function index()
    {
        return view('konversi_form');
    }

    public function konversi()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'partisipasi' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'tugas' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'uts' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'uas' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $partisipasi = $this->request->getPost('partisipasi');
        $tugas = $this->request->getPost('tugas');
        $uts = $this->request->getPost('uts');
        $uas = $this->request->getPost('uas');

        $nilai_akhir = (($partisipasi * 2) + ($tugas * 3) + ($uts * 2) + ($uas * 3) /10);

        $nilai_huruf = $this->konversiNilaiHuruf($nilai_akhir);

        return view('hasil_konversi', ['nilai_akhir' => $nilai_akhir, 'nilai_huruf' => $nilai_huruf]);
    }

    private function konversiNilaiHuruf($nilai)
    {
        if ($nilai >= 80) {
            return 'A';
        } elseif ($nilai >= 70) {
            return 'B';
        } elseif ($nilai >= 60) {
            return 'C';
        } elseif ($nilai >= 50) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
