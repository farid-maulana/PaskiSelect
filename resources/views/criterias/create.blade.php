@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <a href="{{ route('criterias.index') }}" class="text-muted fw-light">
            Data Kriteria Penilaian
        </a>
        <span class="text-muted fw-light">/</span> Tambah Kriteria
    </h4>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Kriteria Baru</h5>
            <small class="text-muted float-end">Fill this form to add new criteria</small>
        </div>
        <div class="card-body">
            <form action="{{ route('criterias.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="name">Kriteria</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Criteria" required />
                    </div>
                    <div class="col">
                        <label class="form-label" for="wie">Bobot Kriteria</label>
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="0" required />
                    </div>
                </div>
                <a href="{{ route('criterias.index') }}" class="btn btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
