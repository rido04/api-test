<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product List</h1>
        <div class="row">
            @foreach($data as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['nama_produk'] }}</h5>
                            <p class="card-text">{{ $product['deskripsi_produk'] }}</p>
                            <p class="card-text"><strong>Price:</strong> {{ $product['harga_produk'] }}</p>
                            <p class="card-text"><strong>Stock:</strong> {{ $product['stok_produk'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>