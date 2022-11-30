@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Buku</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('index_buku') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="isbn" class="col-md-4 col-form-label text-md-end">ISBN</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" required autofocus>
                                @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="judul" class="col-md-4 col-form-label text-md-end">Judul</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" required autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sinopsis" class="col-md-4 col-form-label text-md-end">Sinopsis</label>
                            <div class="col-md-6">
                                <input id="sinopsis" type="text" class="form-control @error('sinopsis') is-invalid @enderror" name="sinopsis" value="{{ old('sinopsis') }}" required autofocus>
                                @error('sinopsis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="penerbit" class="col-md-4 col-form-label text-md-end">Penerbit</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ old('penerbit') }}" required autofocus>
                                @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cover" class="col-md-4 col-form-label text-md-end">Cover</label>
                            <div class="col-md-6">
                                <input id="cover" type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" value="{{ old('cover') }}" required autofocus>
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Kategori Buku</label>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori_id">
                                    <option selected value="" disabled>--Pilih Kategori--</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}" @selected(old('kategori_id')==$item->id)>{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
