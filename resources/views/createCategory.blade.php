@extends('home');

@section('title', 'Create Category')

@section('body')
    <form class="m-5" action="/storeCategory" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="CategoryName">
            @error('CategoryName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
