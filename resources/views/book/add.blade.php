@extends('layouts.app')
@section('title', 'Add Category')

@section('content')
    <div class="col-md-12 mx-auto my-4">
        <div class="container">
            <h2>Tambah Buku</h2>
            <form action="{{route('book.store')}}" method="post">
                @csrf
                <div class="from-group my-4">
                    <label for="name">
                        Judul:
                    </label>
                    <input type="text" name="title" class="form-control" id="" placeholder="judul" required>
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
                    <input type="text" name="keywords" class="form-control" id="" placeholder="keywords dipisah dengan koma" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Harga:
                    </label>
                    <input type="text" name="price" class="form-control" id="" placeholder="harga" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Penerbit:
                    </label>
                    <input type="text" name="publisher" class="form-control" id="" placeholder="Penerbit" required>
                </div>
                <div class="from-group my-4">
                    <label for="name">
                        Stok:
                    </label>
                    <input type="number" name="stock" class="form-control" id="" placeholder="Stok" required>
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
@endsection

@section('scripts')
    
@endsection
