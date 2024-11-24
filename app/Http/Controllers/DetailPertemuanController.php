<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use App\Models\DetailPertemuan;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class DetailPertemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataKuliah::paginate(5);
        return view('page.pertemuan.index')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $KodeMateri = DetailMateri::createCode();
        return view('page.pertemuan.create', compact('KodeMateri'));
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
        $data = DetailPertemuan::where('KodeMataKuliah', $id)->paginate(5);
        return view('page.pertemuan.show')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DetailMateri::where('KodePertemuan', $id)->paginate(5);
        $dataKodePertemuan = $id;
        return view('page.materi.index')->with([
            'data' => $data,
            'dataKodePertemuan' => $dataKodePertemuan,
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
