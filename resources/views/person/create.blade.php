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
                        <h1><strong>Create a User</strong></h1>
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


                        <form method="post" action="{{route('person.store')}}">
                            @csrf
                            @method('post')
                            <div>
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" >
                            </div>
                             <div>
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" >
                            </div>
                            <div>
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" >
                            </div>
                            <br>
                            <div>
                                <input type="submit"  class="inline-block border border-1  px-2 border-blue-500 mb-6 bg-blue-200" value="Save a New User"
                            </div>
                        </form>
                    </body>
                    </html>
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>
