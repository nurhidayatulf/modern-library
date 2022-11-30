@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Kategori</div>

                <div class="card-body">
                    <form method="POST" action="/index_kategori/{{ $data->id }}">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="nama_kategori" class="col-md-4 col-form-label text-md-end">Jenis Kategori</label>
                            <div class="col-md-6">
                                <input id="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ $data->nama_kategori }}" required autofocus>

                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
