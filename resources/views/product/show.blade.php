<!-- filepath: /c:/laragon/www/api-showcase/resources/views/product/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-4">Product Details</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-4">
                <h5 class="text-xl font-semibold mb-2">{{ $product->nama_produk }}</h5>
                <p class="text-gray-700 mb-2">{{ $product->deskripsi_produk }}</p>
                <p class="text-gray-900 font-bold mb-2">Price: {{ $product->harga_produk }}</p>
                <p class="text-gray-900 font-bold">Stock: {{ $product->stok_produk }}</p>
            </div>
        </div>
        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Back to Products</a>
    </div>
</body>
</html>