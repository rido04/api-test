<!-- filepath: /c:/laragon/www/api-showcase/resources/views/customer/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-3xl font-bold mb-4">Customer List</h1>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('customers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Customer</a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($data as $customer)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold mb-2">{{ $customer['nama_customer'] }}</h5>
                        <p class="text-gray-700 mb-2">{{ $customer['email_customer'] }}</p>
                        <p class="text-gray-900 font-bold mb-2">Phone: {{ $customer['telp_customer'] }}</p>
                        <p class="text-gray-900 font-bold">Address: {{ $customer['alamat_customer'] }}</p>
                        <a href="{{ route('customers.show', $customer['id']) }}" class="text-blue-500 hover:underline">View Details</a>
                        <a href="{{ route('customers.edit', $customer['id']) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('customers.destroy', $customer['id']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');" class="inline-block">
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