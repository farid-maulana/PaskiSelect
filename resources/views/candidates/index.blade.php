@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Data Calon Paskibraka</h4>
  <div class="card">
      <div class="card-header">
          <a href="{{ route('candidates.create') }}" class="btn btn-primary"><i
                  class="bx bx-plus"></i> Tambah Calon Paskibraka</a>
      </div>
      <div class="table-responsive text-nowrap">
          <table class="table">
              <thead class="table-light">
                  <tr>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Nomor Telepon</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @foreach($candidates as $candidate)
                      <tr>
                          <td><strong>{{ $candidate->name }}</strong></td>
                          <td>{{ $candidate->date_of_birth }}</td>
                          <td>{{ $candidate->gender }}</td>
                          <td>{{ $candidate->phone_number }}</td>
                          <td>
                              <a href="{{ route('candidates.edit', $candidate->id) }}">
                                  <i class="bx bx-edit-alt me-1"></i>Edit
                              </a> |
                              <form action="{{ route('candidates.destroy', $candidate->id) }}"
                                  method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <a href="#" onclick="this.closest('form').submit();return false;">
                                      <i class="bx bx-trash me-1"></i>Delete</a>
                                  </a>
                              </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
@endsection
