<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use App\Models\DetailPertemuan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $mataKuliah = $id;
        // $original = strtoupper(str_replace('-', ' ', $mataKuliah));
        // $detailMateri = DetailMateri::with(['pertemuan', 'pertemuan.matkul'])
        //     ->whereHas('pertemuan.matkul', function ($query) use ($original) {
        //         $query->where('MataKuliah', $original);
        //     })
        //     ->first();
        // $kodeMataKuliah = $detailMateri->pertemuan->KodeMataKuliah;
        // $kodePertemuan = $detailMateri->KodePertemuan;
        // $data = DetailPertemuan::where('KodeMataKuliah', $kodeMataKuliah)->get();
        // $materi = DB::table('detail_pertemuan')
        //     ->join('detail_materi', 'detail_materi.KodePertemuan', '=', 'detail_pertemuan.KodePertemuan')
        //     ->select('detail_pertemuan.*', 'detail_materi.*')
        //     ->where('detail_pertemuan.KodePertemuan', $kodePertemuan)
        //     ->get();
        // return view('page.mahasiswa.index')->with([
        //     'data' => $detailMateri,
        //     'pertemuan' => $data,
        //     'materi' => $materi,
        // ]);
    }

    public function showMataKuliah(string $id)
    {
        $mataKuliah = $id;
        if ($mataKuliah != null) {
            $original = strtoupper(str_replace('-', ' ', $mataKuliah));
            $detailMateri = DetailMateri::with(['pertemuan', 'pertemuan.matkul'])
                ->whereHas('pertemuan.matkul', function ($query) use ($original) {
                    $query->where('MataKuliah', $original);
                })
                ->first();
            $kodeMataKuliah = $detailMateri->pertemuan->KodeMataKuliah;
            $kodePertemuan = $detailMateri->KodePertemuan;
            $data = DetailPertemuan::where('KodeMataKuliah', $kodeMataKuliah)->get();
            $materi = DB::table('detail_pertemuan')
                ->join('detail_materi', 'detail_materi.KodePertemuan', '=', 'detail_pertemuan.KodePertemuan')
                ->select('detail_pertemuan.*', 'detail_materi.*')
                ->where('detail_pertemuan.KodePertemuan', $kodePertemuan)
                ->get();
        } else {
            $detailMateri = 0;
            $data = 0;
            $materi = 0;
        }
        return view('page.mahasiswa.index')->with([
            'data' => $detailMateri,
            'pertemuan' => $data,
            'materi' => $materi,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matkul = DB::table('detail_materi')
            ->join('detail_pertemuan', 'detail_pertemuan.KodePertemuan', '=', 'detail_materi.KodePertemuan')
            ->join('matakuliah', 'matakuliah.KodeMataKuliah', '=', 'detail_pertemuan.KodeMataKuliah')
            ->select('detail_pertemuan.*', 'detail_materi.*', 'matakuliah.*')
            ->where('detail_materi.KodeMateri', $id)
            ->first();
        $mataKuliah = $matkul->KodeMataKuliah;
        $kodePertemuan = $matkul->KodePertemuan;

        $data = DetailPertemuan::where('KodeMataKuliah', $mataKuliah)->get();

        $materi = DB::table('detail_pertemuan')
            ->join('detail_materi', 'detail_materi.KodePertemuan', '=', 'detail_pertemuan.KodePertemuan')
            ->select('detail_pertemuan.*', 'detail_materi.*')
            ->where('detail_pertemuan.KodePertemuan', $kodePertemuan)
            ->get();

        $file = DB::table('detail_pertemuan')
            ->join('detail_materi', 'detail_materi.KodePertemuan', '=', 'detail_pertemuan.KodePertemuan')
            ->select('detail_pertemuan.*', 'detail_materi.*')
            ->where('detail_pertemuan.KodePertemuan', $kodePertemuan)
            ->where('detail_materi.KodeMateri', $id)
            ->first();

        return view('page.mahasiswa.show')->with([
            'pertemuan' => $data,
            'materi' => $materi,
            'matkul' => $matkul,
            'file' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
