<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<h1 class="ml-5 mt-3">{{ $category->name }}</h1>

<div>
    <form class="ml-5 mb-4 mt-4" action="{{ route('category.show', $category->code) }}" method="GET">
        <label for="min_price">Минимальная цена:</label>
        <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}">

        <label class="ml-3" for="max_price">Максимальная цена:</label>
        <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}">

        <button class="ml-3 btn-primary btn-sm" type="submit">Применить фильтры</button>
    </form>
</div>

<div>
    @foreach ($products as $product)
        <div class="ml-5">
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Product ID: {{ $product->id }}</strong>
                        <p class="card-text mb-auto">Title: {{ $product->title }}</p>
                        <p class="card-text mb-auto">Slug: {{ $product->slug }}</p>
                        <p class="card-text mb-auto">Description: {{ $product->description }}</p>
                        <p class="card-text mb-auto">Price: {{ $product->price }}</p>
                        <img src="{{ $product->image }}" alt="{{ $product->id }}">
                        <p>Quantity: {{ $product->quantity }}</p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="350" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"></rect><</svg>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination d-flex justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
