@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Perolehan Suara</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Auth::user()->roles == '["ADMIN"]')
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Urut</th>
                                    <th>Foto Pasangan Calon</th>
                                    <th>Nama Pasangan</th>
                                    <th>Jumlah Suara</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        @if ($candidate->photo_paslon)
                                            <img src="{{asset('storage/'.$candidate->photo_paslon)}}" width="100px"/>
                                        @endif
                                    </td>
                                    <td>{{$candidate->nama_ketua.' dan '.$candidate->nama_wakil}}</td>
                                    <td>{{$candidate->users->count()}} Suara</td>
                                    <td>{{number_format(($candidate->users->count()/$jumlah)*100)}} %</td>
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan=10>
                                            {{$candidates->appends(Request::all())->links()}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                        @elseif(Auth::user()->roles == '["VOTER"]')
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Urut</th>
                                    <th>Foto Pasangan Calon</th>
                                    <th>Nama Pasangan</th>
                                    {{-- <th>Jumlah Suara</th>
                                    <th>Persentase</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        @if ($candidate->photo_paslon)
                                            <img src="{{asset('storage/'.$candidate->photo_paslon)}}" width="100px"/>
                                        @endif
                                    </td>
                                    <td>{{$candidate->nama_ketua.' dan '.$candidate->nama_wakil}}</td>
                                    {{-- <td>{{$candidate->users->count()}} Suara</td>
                                    <td>{{number_format(($candidate->users->count()/$jumlah)*100)}} %</td> --}}
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan=10>
                                            {{$candidates->appends(Request::all())->links()}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
