<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use Illuminate\Http\Request;

class DetailMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DetailMateri::all();
        return response()->json($data);
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
        try {
            $judul = $request->input('judul');
            $kodeMateri = date('YmdHis');

            if ($request->hasFile('materi')) {
                $materiFile = $request->file('materi');
                $materiFileName = $kodeMateri . '-' . $judul . '.' . $materiFile->extension();
                $materiFilePath = $materiFile->move(public_path('materi'), $materiFileName);
                $materiFilePath = $materiFileName;
            } else {
                return redirect()->back()->with('error', 'E-Book tidak ditemukan');
            }

            $data = [
                'KodeMateri' => $request->input('KodeMateri'),
                'KodePertemuan' => $request->input('KodePertemuan'),
                'judul' => $request->input('judul'),
                'materi' => $materiFilePath,
            ];

            DetailMateri::create($data);

            return redirect()
                ->route('pertemuan.edit', $request->input('KodePertemuan'))
                ->with('message', 'Data Materi Ajar Sudah ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $KodeMateri = DetailMateri::createCode();
        return view('page.pertemuan.create', compact('KodeMateri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DetailMateri::where('id', $id)->first();
        return view('page.materi.edit')->with([
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materi = DetailMateri::find($id);

        if (!$materi) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $materi->judul = $request->input('judul');

        // Simpan nama file ebook lama untuk referensi
        $oldEbook = $materi->materi;
        $judul = $materi->judul;;
        $kodeMateri = $materi->KodeMateri;
        $kodePertemuan = $materi->KodePertemuan;

        // Jika ada file ebook yang diunggah
        if ($request->hasFile('materi')) {
            // Hapus ebook lama jika ada
            if ($oldEbook && file_exists(public_path('materi/' . $oldEbook))) {
                unlink(public_path('materi/' . $oldEbook));
            }

            $file = $request->file('materi');
            $filename = $kodeMateri . '-' . $judul . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('materi'), $filename);

            $materi->materi = $filename;
        }

        // Simpan perubahan ke database
        $materi->save();

        return redirect()
            ->route('pertemuan.edit', $kodePertemuan)
            ->with('message', 'Data Materi Ajar Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DetailMateri::findOrFail($id);
        if ($data->materi && file_exists(public_path('materi/' . $data->materi))) {
            unlink(public_path('materi/' . $data->materi));
        }
        $data->delete();
        return back()->with('message_delete', 'Data Materi Ajar Sudah dihapus');
    }
}
