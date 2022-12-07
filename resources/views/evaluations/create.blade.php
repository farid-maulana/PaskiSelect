@extends('layouts.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Data Penilaian Calon Paskibraka</h4>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <form action="{{ route('evaluations.store') }}" method="POST">
                        @csrf
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2" class="text-center align-middle">Nama Calon</th>
                                <th colspan="{{ $criterias_count + 1 }}" class="text-center">Kriteria</th>
                            </tr>
                            <tr>
                                @foreach($criterias as $criteria)
                                    <th class="text-center">{{ $criteria->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($candidates as $candidate)
                                <tr>
                                    <td><strong>{{ $candidate->name }}</strong></td>
                                    @foreach($criterias as $criteria)
                                        <th><input type="number" class="form-control" value="0" name="score[{{ $candidate->id }}][{{ $criteria->id }}][]"></th>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><button type="submit" class="btn btn-primary">Evaluasi Penilaian</button></td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
</div>
@endsection
