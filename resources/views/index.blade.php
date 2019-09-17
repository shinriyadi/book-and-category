<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book List</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="col-md-12 mx-auto mt-4">
        <div class="container">

            <form action="" method="post" class="">
                <div class="form-group row">
                    <input type="text" name="title" id="" class="form-control col-md-1 m-2" placeholder="Judul">
                    <input type="text" name="description" id="" class="form-control col-md-1 m-2"
                        placeholder="Deskripsi">
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
                        <td><input type="checkbox" name="deleteed[]" id="" value="{{$v->id}}"></td>
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
                <a href="{{route('book.create')}}" class="btn btn-info btn-md" >
                    Tambah Buku
                </a>
                <a href="{{route('category.index')}}" class="btn btn-secondary btn-md" data-toggle="modal" data-target="#addModal">
                    Tambah Kategori
                </a>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
