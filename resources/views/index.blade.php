<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>FreeBook</title>
</head>
<body>

  <!-- This is an example component -->
<div class="w-screen h-screen overflow-hidden flex justify-center items-center bg-white">
  <div class="w-full my-2 md:w-3/5 lg:w-2/5">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $item) 
          <li>{{ $item }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="" method="POST">
      @csrf

      
    <div class="flex my-8 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
      <input class="w-full py-3 pl-2 md:pl-8 border-0 focus:outline-none" name="username" type="text" value="{{ old('username')}}" placeholder="Username" required>
      </div>

    <div class="flex my-8 mx-4 md:mx-2 border-b-2 border-gray-700 hover:border-green-800">
    <input class="w-full py-3 pl-2 md:pl-8 border-0 focus:outline-none" name="password" value="{{ old('password')}}" placeholder="Password" type="password" required>
    </div>
    <button class="w-10 h-10 bg-black"></button>

    </form>
  </div>
  </div>
</body>
</html>