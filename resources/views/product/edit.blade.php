<x-app-layout>
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!DOCTYPE html>
                        <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                                <title>Inventory-app</title>
                                <style>
                                    input {
                                        display: block; 
                                        margin-bottom: 10px; 
                                    }
                                </style>
                            </head>
                            <body>
                                   <strong> <h1>Create a Product</h1></strong>
                                        <br>

                                        <div>
                                            @if($errors->any())
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>


                                            @endif
                                     </div>


                                    <form method="post" action="{{route('product.update', ['product' => $product])}}">
                                        @csrf
                                        @method('put')

                                        <div>
                                            <label>Name</label>
                                            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />
                                        </div>
                                        <div>
                                            <label>Quantity</label>
                                            <input type="text" name="qty" placeholder="Quantity" value="{{$product->qty}}" />
                                        </div>
                                        <div>
                                            <label>Price</label>
                                            <input type="text" name="price" placeholder="Price" value="{{$product->price}}" />
                                        </div>
                                        <div>
                                            <label>Description</label>
                                            <input type="text" name="description" placeholder="Description" value="{{$product->description}}" />
                                        </div>
                                        <br>
                                        <div>
                                            <input type="submit" class="inline-block border border-1  px-2 border-orange-500 mb-6 bg-orange-200 "value="Update"
                                        </div>
                                    </form>
                            </body>
                        </html>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
