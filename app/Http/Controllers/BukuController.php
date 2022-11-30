<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::all();
        return view('buku.index_buku', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Buku::all();
        $kategori = Kategori::all();
        
        return view('buku.create_buku', compact ('data', 'kategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
            'cover' => 'required',
            'kategori_id' => 'required',
        ]);
        $validator['cover'] = Storage::put('img', $request->file('cover'));
        // dd($validator);
        Buku::create($validator);
        
        return redirect('index_buku')->with('success', 'Data berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Buku::findOrFail($id);
        $kategori = Kategori::all();

        return view('buku.edit_buku', [
            'data' => $data,
            'kategori' => $kategori
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Buku::find($id);
        $validator = $request->validate([
            'isbn' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'penerbit' => 'required',
            'kategori_id' => 'required',
        ]);
        
        try {
            $validator['cover'] = Storage::put('img', $request->file('cover'));
            $data->update($validator);
        } catch (\Throwable $th) {
            $validator['cover'] = $data->cover;
            $data->update($validator);
        }
        return redirect('index_buku')->with('success', 'Data Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Buku::findOrFail($id);
        $data->delete();

        return redirect('index_buku')->with('success', 'Data Berhasil Dihapus');

    }

    public function home()
    {
        
        $data = Buku::select('*')->where('status', '=', 'tampilkan')->get();

        return view('home', compact('data'));
    
    }
    
    public function akses($id)
    {
        $data = Buku::findOrFail($id);
        if ($data['status'] == 'tampilkan'){
            $data->update([
                'status'=>'sembunyikan',
            ]);
        } else {
            $data->update([
                'status' => 'tampilkan',
            ]);
        }
        return redirect('home');
    }
}