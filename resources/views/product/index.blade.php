<!-- filepath: /c:/laragon/www/api-showcase/resources/views/product/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-4">Product List</h1>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Product</a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($data as $product)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold mb-2">{{ $product['nama_produk'] }}</h5>
                        <p class="text-gray-700 mb-2">{{ $product['deskripsi_produk'] }}</p>
                        <p class="text-gray-900 font-bold mb-2">Price: {{ $product['harga_produk'] }}</p>
                        <p class="text-gray-900 font-bold">Stock: {{ $product['stok_produk'] }}</p>
                        <a href="{{ route('products.show', $product['id']) }}" class="text-blue-500 hover:underline">View Details</a>
                        <a href="{{ route('products.edit', $product['id']) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>