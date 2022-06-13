@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Data Kriteria Penilaian</h4>
  <div class="card">
      <div class="card-header">
          <a href="{{ route('criterias.create') }}" class="btn btn-primary"><i
                  class="bx bx-plus"></i> Tambah Kriteria</a>
      </div>
      <div class="table-responsive text-nowrap">
          <table class="table">
              <thead class="table-light">
                  <tr>
                      <th>Kriteria</th>
                      <th>Bobot</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @foreach($criterias as $criteria)
                      <tr>
                          <td><strong>{{ $criteria->name }}</strong></td>
                          <td>{{ $criteria->weight }}</td>
                          <td>
                              <a href="{{ route('criterias.edit', $criteria->id) }}">
                                  <i class="bx bx-edit-alt me-1"></i>Edit
                              </a> |
                              <form action="{{ route('criterias.destroy', $criteria->id) }}"
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
