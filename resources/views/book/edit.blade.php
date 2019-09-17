<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Buku</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="col-md-12 mx-auto mt-4">
        <div class="container">
            <h2>Tambah Buku</h2>
            <form action="{{route('book.update', $book->id)}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="from-group my-4">
                    <label for="name">
                        Judul:
                    </label>
                    <input type="text" name="title" class="form-control" id="" placeholder="judul" value="{{$book->title}}" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Deskripsi:
                    </label>
                    <textarea name="description" class="form-control" id="" placeholder="deskripsi" required></textarea>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Keywords:
                    </label>
                    <input type="text" name="keywords" class="form-control" id="" placeholder="keywords dipisah dengan koma" value="{{$book->keywords}}" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Harga:
                    </label>
                    <input type="text" name="price" class="form-control" id="" placeholder="harga" value="{{$book->price}}" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Penerbit:
                    </label>
                    <input type="text" name="publisher" class="form-control" id="" placeholder="Penerbit" value="{{$book->publisher}}" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Stok:
                    </label>
                    <input type="number" name="stock" class="form-control" id="" placeholder="Stok" value="{{$book->stock}}" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Kategori:
                    </label>
                    @foreach ($categories as $cat)
                        <input type="checkbox" name="categories[]" value="{{$cat->id}}"> {{$cat->name}} &nbsp;
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>    
</body>

</html>
