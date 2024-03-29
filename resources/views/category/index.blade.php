@extends('layouts.app')
@section('title', 'Add Category')

@section('content')
    <div class="col-md-12 mx-auto mt-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-md-12 col-12">
                    <div class="row px-3 my-2">
                        <div class="col-md-6 col-6">
                            <a href="{{url('/')}}" class="btn btn-secondary btn-md">
                                Kembali
                            </a>
                        </div>
                        <div class="col-md-6 col-6 d-flex flex-row-reverse">
                            <a href="{{route('category.create')}}" class="btn btn-info btn-md" data-toggle="modal" data-target="#addModal">
                                + Tambah Kategori
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 my-2">
                        <table class="table table-striped table-bordered text-center">
                            <thead class="table-secondary">
                                <th>No</th>
                                <th>Nama</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>
                                        <a href="{{route('category.show', $v->id)}}" class="btn btn-sm btn-outline-info">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('category.destroy', $v->id )}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
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
@endsection

@section('scripts')
    
@endsection
