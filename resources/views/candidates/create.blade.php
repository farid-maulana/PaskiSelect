@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <a href="{{ route('candidates.index') }}" class="text-muted fw-light">
            Data Calon Paskibraka
        </a>
        <span class="text-muted fw-light">/</span> Tambah Calon
    </h4>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Calon Baru</h5>
            <small class="text-muted float-end">Fill this form to add new candidate</small>
        </div>
        <div class="card-body">
            <form action="{{ route('candidates.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required />
                    </div>
                    <div class="col">
                        <label class="form-label" for="date_of_birth">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required />
                    </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                      <label class="form-label" for="gender">Jenis Kelamin</label>
                      <select class="form-select" name="gender" id="gender">
                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="col">
                      <label class="form-label" for="phone_number">Nomor Telepon</label>
                      <input type="text" class="form-control" id="phone_number" name="phone_number" required />
                  </div>
              </div>
                <a href="{{ route('candidates.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
