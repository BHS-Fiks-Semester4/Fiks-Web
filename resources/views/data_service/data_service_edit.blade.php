@extends('admin.adminmenu')

@section('admincontent')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="container-fluid pt-1 px-3">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <a href="/data_service" class="btn btn-warning mx-3 my-3 col-sm-3" type="button">Kembali</a>
                </div>
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Mengedit Data Jenis Barang</h6>
                <form method="POST" action="/data_service/{{ $service->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="data_service" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="data_service" name="nama_service" value="{{ $service->nama_service }}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_service" class="form-label">Deskripsi Layanan</label>
                        <textarea name="deskripsi_service" id="deskripsi_service" cols="50" rows="10" class="form-control">{{ $service->deskripsi_service }}</textarea>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="foto" class="form-label">Foto Saat Ini</label>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            @if ($service->foto)
                                <img class="rounded-circle" src="data:image/jpeg;base64,{{ base64_encode($service->foto) }}" width="100" height="100">
                            @else
                                <p>Tidak ada</p>
                            @endif
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-6 my-2">
                            <label for="foto" class="form-label">Foto Baru</label>
                            <input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection