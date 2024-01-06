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
                                <a <a class="inline-block border border-1 py-2 px-4 border-green-500 mb-6 bg-green-200"  href="{{route('person.create')}}">Add new User</a> <br>
                            </div>
                            <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                        </tr>
                       </thead>
                      <tbody>
                        @foreach ($persons as $person)
                        <tr>
                              <th scope="row">{{$person->id}}</th>
                              <td>{{$person->name}}</td>
                              <td>{{$person->email}}</td>
                              <td>
                                  <a class="inline-block border border-1  px-2 border-yellow-500 mb-6 bg-yellow-200" href="{{route('person.edit', ['person' => $person])}}">Edit</a>
                              </td>
                              <td>
                                 <form method="post" action="{{route('person.destroy', ['person' => $person])}}">
                                 @csrf 
                                 @method('delete')
                                 <input type="submit" class="inline-block border border-1  px-2 border-red-500 mb-6 bg-red-200" onclick="return confirm('Are you sure?')" value="Delete" />
                                 </form>
                              </td>
                        </tr>
                         @endforeach
                      </tbody>
                    </div>
                </body>
            </div>
        </div>
    </div>
</x-app-layout>

</html>
