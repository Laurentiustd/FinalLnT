@extends('home');

@section('title', 'See Book')

@section('body')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <h1 style="padding: 1em">Shopping Cart :</h1>
    <?php $subtotal = 0; ?>
    @if (Cart::content()->isEmpty())
        <h1>Please input inventory first</h1>
    @else
        <form class="m-5" action="/storeFaktur" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 style="padding: 1em" name="FakturID">No Faktur :
                {{ $invoiceid = chr(rand(65, 90)) . chr(rand(65, 90)) . rand(2, 10) . rand(2, 10) . rand(2, 10) }}</h1>
            <div style="display:grid; grid-template-columns: repeat(3, 1fr); padding: 2em">
                @foreach ($cart1 as $item)
                    <div class="card" style="width: 18rem;">
                        @foreach ($book as $b)
                            @if ($item->name == $b->Name)
                                <img src="{{ asset('/storage/article/images/' . $b->Image) }}" class="card-img-top"
                                    alt="image">
                                <div class="card-body">
                                    @foreach ($category as $c)
                                        @if ($b->category_id == $c->id)
                                            <h5 class="card-title" name="Category">Category : {{ $c->CategoryName }}</h5>
                                        @endif
                                    @endforeach
                            @endif
                        @endforeach
                        <h5 class="card-title" name="Name">Name : {{ $item->name }}</h5>
                        <p class="card-text">Price : Rp.{{ $item->price }}</p>
                        <p class="card-text" name="Qty">Quantity :
                            <a href="/minQty/{{ $item->rowId }}" class="btn">-</a>
                            {{ $item->qty }}
                            <a href="/addQty/{{ $item->rowId }}" class="btn">+</a>
                        </p>
                        <?php $total = $item->qty * $item->price; ?>
                        <p class="card-text" name="Total">Total : {{ $total }}</p>
                    </div>
                    <?php $subtotal += $total; ?>
            </div>
    @endforeach
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address : </label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="Address">
        @error('Address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Postcode</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="Postcode">
        @error('Postcode')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <h1 style="padding: 1em" name="Subtotal">Sub Total : Rp.{{ $subtotal }}</h1>
    <button type="submit" class="btn btn-primary">Save Faktur</button>
    </form>
    @endif
@endsection
