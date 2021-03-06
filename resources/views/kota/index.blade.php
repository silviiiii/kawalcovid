@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Data Kota & Kabupaten
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="float-right">
                            <a href="{{ route('kota.create') }}" class="btn btn-primary"
                                class="float-right">
                                Tambah Data
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Kode Kota / Kabupaten</th>
                                        <th>Nama Kota / Kabupaten</th>
                                        <th>Nama Provinsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach($kota as $data)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $data->kode_kota }}</td>
                                        <td>{{ $data->nama_kota }}</td>
                                        <td>{{ $data->provinsi->nama_provinsi }}</td>
                                        <td>
                                            <form action="{{route('kota.destroy', $data->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('kota.edit',$data->id)}}" class="btn btn-success  float-right"><b>Edit</b></a> 
                                                <a href="{{route('kota.show',$data->id)}}" class="btn btn-info float-right"><b>Show</b></a>
                                                <button type="submit" class="btn btn-danger float-right"><b>Delete</b></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection