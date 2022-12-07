@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between">
    <h4 class="fw-bold py-3 mb-4">Evaluasi Penilaian</h4>
    <a href="{{ route('evaluations.create') }}" class="btn btn-primary" style="height: 40px">Update Penilaian</a>
  </div>
  {{-- @foreach ($criterias as $criteria)
    <div class="card mt-3">
      <div class="card-header">
        <h4>Matriks Perbandingan {{ $criteria->name }}</h4>
      </div>
      <div class="table-responsive text-nowrap">
          <table class="table">
              <thead class="table-light">
                  <tr>
                      <th></th>
                      @foreach ($candidates as $column)
                          <th>{{ $column->name }}</th>
                      @endforeach
                  </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($candidates as $row)
                    <tr>
                      <th>{{ $row->name }}</th>
                      @foreach ($candidates as $column)
                        @foreach ($evaluations as $item)
                          @if ($item->criteria_id == $criteria->id)
                            @if ($item->evaluation->candidate_id == $row->id)
                              <td>{{ number_format((float)$item->score, 3, '.', '') }}</td>
                            @endif
                          @endif
                        @endforeach
                      @endforeach
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div>
  @endforeach --}}
  <div class="card mt-3">
    <div class="card-header">
      <h4>Ranking</h4>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Rank</th>
                    <th>Nama Calon</th>
                    @foreach ($criterias as $column)
                        <th>{{ $column->name }}</th>
                    @endforeach
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($candidates as $rank => $row)
                  <tr>
                    <th>{{ ++$rank }}</th>
                    <th>{{ $row->name }}</th>
                    {{-- @foreach ($candidates as $column)
                      @foreach ($evaluations as $item)
                        @if ($item->criteria_id == $criteria->id)
                          @if ($item->evaluation->candidate_id == $row->id)
                            <td>{{ number_format((float)$item->score, 3, '.', '') }}</td>
                          @endif
                        @endif
                      @endforeach
                    @endforeach --}}
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
