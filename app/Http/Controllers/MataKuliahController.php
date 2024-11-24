<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use App\Models\DetailPertemuan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataKuliah::paginate(5);
        $kodeMataKuliah = MataKuliah::createCode();
        return view('page.mataKuliah.index', compact('kodeMataKuliah'))->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'KodeMataKuliah' => $request->input('KodeMataKuliah'),
            'MataKuliah' => $request->input('MataKuliah'),
            'JumlahPertemuan' => $request->input('JumlahPertemuan'),
            'link' => url('http://127.0.0.1:8000/' . Str::slug($request->input('MataKuliah')) . '/' . $request->input('KodeMataKuliah')),
            'idUser' => Auth::user()->id
        ];

        MataKuliah::create($data);

        $jumlahPertemuan = (int)$request->input('JumlahPertemuan');
        $kodeMataKuliah = $request->input('KodeMataKuliah');

        for ($i = 1; $i <= $jumlahPertemuan; $i++) {
            $dataDetailPertemuan = [
                'KodePertemuan' => 'P' . $kodeMataKuliah . str_pad($i, 3, '0', STR_PAD_LEFT),
                'KodeMataKuliah' => $kodeMataKuliah,
                'pertemuan' => $i
            ];

            DetailPertemuan::create($dataDetailPertemuan);
        }

        return back()->with('message_add','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DetailMateri::where('id', $id)->first();
        return view('page.materi.show')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'MataKuliah' => $request->input('MataKuliah'),
            'JumlahPertemuan' => $request->input('JumlahPertemuan'),
            'link' => url('http://127.0.0.1:8000/' . Str::slug($request->input('MataKuliah')) . '/' . $request->input('KodeMataKuliah')),
        ];

        $dataMataKuliah = MataKuliah::where('id', $id)->first();
        $jumlahPertemuanLama = $dataMataKuliah->JumlahPertemuan;

        // Update data Mata Kuliah
        $datas = MataKuliah::findOrFail($id);
        $datas->update($data);

        $jumlahPertemuanBaru = (int)$request->input('JumlahPertemuan');
        $kodeMataKuliah = $dataMataKuliah->KodeMataKuliah;

        if ($jumlahPertemuanBaru > $jumlahPertemuanLama) {
            // Tambahkan detail pertemuan jika jumlah pertemuan baru lebih besar
            for ($i = $jumlahPertemuanLama + 1; $i <= $jumlahPertemuanBaru; $i++) {
                $dataDetailPertemuan = [
                    'KodePertemuan' => 'P' . $kodeMataKuliah . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'KodeMataKuliah' => $kodeMataKuliah,
                    'pertemuan' => $i
                ];

                DetailPertemuan::create($dataDetailPertemuan);
            }
        } elseif ($jumlahPertemuanBaru < $jumlahPertemuanLama) {
            // Hapus detail pertemuan jika jumlah pertemuan baru lebih kecil
            $detailPertemuan = DetailPertemuan::where('KodeMataKuliah', $kodeMataKuliah)
                ->orderBy('pertemuan', 'desc') // Urutkan dari yang terbesar
                ->get();

            $pertemuanTerhapus = $jumlahPertemuanLama - $jumlahPertemuanBaru;

            foreach ($detailPertemuan as $index => $detail) {
                if ($index < $pertemuanTerhapus) {
                    // Hapus detail pertemuan
                    $detail->delete();

                    // Hapus detail materi yang terkait dengan KodePertemuan
                    DetailMateri::where('KodePertemuan', $detail->KodePertemuan)->delete();
                } else {
                    break;
                }
            }
        }

        return back()->with('message_add','Data Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = MataKuliah::findOrFail($id);

        $dataMataKuliah = MataKuliah::where('id', $id)->first();
        $kodeMataKuliah = $dataMataKuliah->KodeMataKuliah;

        $dataDetailPertemuan = DetailPertemuan::where('Kodematakuliah', $kodeMataKuliah)->first();
        $kodePertemuan = $dataDetailPertemuan->KodePertemuan;

        DetailPertemuan::where('Kodematakuliah', $kodeMataKuliah)->delete();
        DetailMateri::where('KodePertemuan', $kodePertemuan)->delete();

        $data->delete();
        return response([
            'status' => 'Success',
            'message' => 'Data Terhapus'
        ], 200);
    }
}
