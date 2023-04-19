@extends('home');

@section('title', 'Edit Book')

@section('body')
    <form class="m-5" action="/patchBook/{{$book->id}}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Book Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="Name" value="{{$book->Name}}">
            @error('Name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Book Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="Price" placeholder="Rp." value="{{$book->Price}}">
            @error('Price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Book Quantity</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="Quantity" value="{{$book->Quantity}}">
            @error('Quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Book Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="Image" >
            @error('Image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="CategoryName">
                @foreach ($category as $i)
                    <option value="{{ $i->id }}">{{ $i->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
