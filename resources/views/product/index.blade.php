<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory-app</title>
</head>
<x-app-layout>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
                <body>                    
                    <div>
                        @if(session()->has('success'))
                            <div>
                                {{session('success')}}
                            </div>
                        @endif
                    </div>
                    <div>
                        
                            <div>
                                 <a class="inline-block border border-1 py-2 px-4 border-green-500 mb-6 bg-green-200"  href="{{route('product.create')}}">Add new Product</a> <br>
                            </div>
                            <table border="1">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($product as $product )
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>
                                            <a class="inline-block border border-1  px-2 border-yellow-500 mb-6 bg-yellow-200" href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                                                @csrf 
                                                @method('delete')
                                                <input type="submit" class="inline-block border border-1  px-2 border-red-500 mb-6 bg-red-200" onclick="return confirm('Are you sure?')" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </body>
            </div>
        </div>
    </div>
</x-app-layout>

</html>
