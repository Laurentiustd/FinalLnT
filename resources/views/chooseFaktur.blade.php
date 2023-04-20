@extends('home');

@section('title', 'Choose Book')

@section('body')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/createCategory">Create Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/createBook">Create Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/createFaktur">Create Faktur</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div style="display:grid; grid-template-columns: repeat(3, 1fr); padding: 2em">
        @if ($book->isEmpty())
            <h1>Please input inventory first</h1>
        @else
            @foreach ($book as $item)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('/storage/article/images/' . $item->Image) }}" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Name : {{ $item->Name }}</h5>
                        <p class="card-text">Price : Rp.{{ $item->Price }}</p>
                        <p class="card-text">Quantity : {{ $item->Quantity }}</p>
                        @foreach ($category as $c)
                            @if ($item->category_id == $c->id)
                                <p class="card-text">Category : {{ $c->CategoryName }}</p>
                            @endif
                        @endforeach
                        <a href="/selectFaktur/{{ $item->id }}" class="btn btn-warning">Select</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
