@extends('layouts.app')
@section('title', 'Add Category')

@section('content')
    <div class="col-md-12 mx-auto mt-4">
        <div class="container">
            <h2>Edit Kategori</h2>
            <form action="{{route('category.update', $category->id)}}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="from-group my-4">
                    <label for="name">
                        Nama: 
                    </label>
                    <input type="text" name="name" class="form-control" id="" value="{{$category->name}}" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection
