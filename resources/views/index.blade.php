@extends('layouts.app')
@section('title', 'Book')

@section('content')    
    <div class="col-md-12 mx-auto mt-4">
        <div class="container">

            <form action="" method="post" class="">
                <div class="form-group row">
                    <input type="text" name="title" id="" class="form-control col-md-1 m-2" placeholder="Judul">
                    <input type="text" name="description" id="" class="form-control col-md-1 m-2" placeholder="Deskripsi">
                    <input type="text" name="category" id="" class="form-control col-md-1 m-2" placeholder="Kategori">
                    <input type="text" name="keyword" id="" class="form-control col-md-1 m-2" placeholder="Keyword">
                    <input type="text" name="price" id="" class="form-control col-md-1 m-2" placeholder="Harga">
                    <input type="text" name="publisher" id="" class="form-control col-md-1 m-2" placeholder="Penerbit">
                    <button type="submit" class="btn btn-outline-success btn-sm m-2">Search</button>
                </div>
            </form>

            <table class="table">
                <thead>
                    <th>#</th>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Description</th>
                    <th>Kategori</th>
                    <th>Keywords</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($books as $v)
                    <tr>
                        <td><input type="checkbox" name="deleted[]" id="multidelete" value="{{$v->id}}"></td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$v->title}}</td>
                        <td>{{str_limit($v->description, 100)}}</td>
                        <td>
                            @foreach ($v->categories as $cat)
                            {{$cat->name}},
                            @endforeach
                        </td>
                        <td>{{$v->keywords}}</td>
                        <td>{{$v->price}}</td>
                        <td>{{$v->stock}}</td>
                        <td>{{$v->publisher}}</td>
                        <td>
                            <a href="{{route('book.edit', $v->id)}}" class="btn btn-sm btn-outline-info">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{route('book.destroy', $v->id )}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-12">
                <a href="#" class="btn btn-danger btn-md" id="submitDeleteAll">
                    Delete yang dipilih
                </a>
                <a class="btn btn-info btn-md"
                    {{ count($categories) == 0  ? 'onclick=getAlert()' : "href=".route('book.create') }}>
                    Tambah Buku
                </a>
                <a href="{{route('category.index')}}" class="btn btn-secondary btn-md">
                    Tambah Kategori
                </a>
            </div>
        </div>
    </div>
@endsection

    
@section('cripts')    
    <script>
        const getAlert = () => alert('Tidak ada kategori, silahkan tambah kategori terlebih dahulu');

        $('#submitDeleteAll').on('click', function() {
            var selected = [];
            $('#multidelete:checked').each(function(i) {
                selected[i] = $(this).val();
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '/delete-select',
                data: {data: selected},
                dataType: 'JSON',
                success: function(response) {
                    location.reload();
                }
            })
        });
    </script>
@endsection
