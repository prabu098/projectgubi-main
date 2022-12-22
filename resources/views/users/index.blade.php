@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Pemilih (Voter)</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('users.create') }}"
                                   class="btn btn-sm btn-outline-primary float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered" cellspacing="0" id="users_datatable">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
{{--                            <tbody>--}}
{{--                            @foreach ($users as $users)--}}
{{--                                <tr>--}}
{{--                                    <td width="100px">{{$users->nim}}</td>--}}
{{--                                    <td width="300px" height="auto">{{$users->name}}</td>--}}
{{--                                    <td width="300px" height="auto">{{$users->kelas}}</td>--}}
{{--                                    <td width="300px" height="auto">{{$users->email}}</td>--}}
{{--                                    <td width="300px" height="auto">{{$users->status}}</td>--}}
{{--                                    <td>--}}
{{--                                        <a class="btn btn-info text-white btn-sm"--}}
{{--                                           href="{{route('users.edit',['id'=>$users->id])}}">Edit</a>--}}
{{--                                        <form onsubmit="return confirm('Delete this candidate permanently ?')"--}}
{{--                                              class="d-inline" action="{{route('users.destroy',['id'=>$users->id])}}"--}}
{{--                                              method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="_method" value="DELETE">--}}
{{--                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script type="text/javascript">
            $('#users_datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.index') }}",
                    type: 'GET',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nim', name: 'nim'},
                    {data: 'name', name: 'name'},
                    {data: 'kelas', name: 'kelas'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                "dom": '<"topcustom"lfr>t<"bottomcustom"ip>',
                order: [[0, 'desc']]
            });
        </script>
    @endpush
@endsection
