@extends('auth.template')

@section('title')
    Halaman Register
@endsection

@section('content')

<div class="flex min-h-screen items-center justify-center bg-gradient-to-b from-blue-700 to-transparent">
  <div class="w-4/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 bg-white p-6 shadow-lg">
    <h1 class="block text-center font-serif text-3xl"><span class="text-blue-500">HALAMAN</span> REGISTER</h1>
    <hr class="mt-3" />
    <form action="{{ route('register.post') }}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="mt-3">
      <label for="name" class="mb-2 block text-base">Nama</label>
      <input type="text" id="name" class="w-full border border-blue-500 p-2 text-base focus:border-gray-600 focus:outline-none focus:ring-0 rounded-md" placeholder="Masukkan Nama" name="name" value="{{ old('name') }}" />
      <span class="text-red-500">{{ $errors->first('name') }}</span>
    </div>

    <div class="mt-3">
      <label for="email" class="mb-2 block text-base">Email</label>
      <input type="email" id="email" class="w-full border border-blue-500 p-2 text-base focus:border-gray-600 focus:outline-none focus:ring-0 rounded-md" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" />
      <span class="text-red-500">{{ $errors->first('email') }}</span>
    </div>

    <div class="mt-3">
      <label for="username" class="mb-2 block text-base">Username</label>
      <input type="text" id="username" class="w-full border border-blue-500 p-2 text-base focus:border-gray-600 focus:outline-none focus:ring-0 rounded-md" placeholder="Masukkan Username" name="username" value="{{ old('username') }}" />
      <span class="text-red-500">{{ $errors->first('username') }}</span>
    </div>

    <div class="mt-3">
      <label for="password" class="mb-2 block text-base">Password</label>
      <input type="password" id="password" class="w-full border border-blue-500 p-2 text-base focus:border-gray-600 focus:outline-none focus:ring-0 rounded-md" placeholder="Masukkan Password" name="password" />
      <span class="text-red-500">{{ $errors->first('password') }}</span>
    </div>

    <div class="mt-3">
      <label for="foto" class="mb-2 block text-base">Foto</label>
      <input type="file" id="foto" class="w-full border border-blue-500 p-2 text-base focus:border-gray-600 focus:outline-none focus:ring-0 rounded-md" name="foto" />
      <span class="text-red-500">{{ $errors->first('foto') }}</span>
    </div>
    
    <div class="mt-5 flex justify-center">
      <button type="submit" class="w-32 rounded-md border-2 border-blue-500 bg-blue-500 py-1 font-serif text-white duration-300 hover:w-full hover:scale-100 hover:bg-transparent hover:text-blue-500">Register</button>
    </div>
    </form>

    <div class="mt-5 text-center">
      <p class="">
        Sudah memiliki account? silahkan <span class="text-black"><a href= "{{ route('login') }}" class="text-blue-500 underline">Login</a></span>
      </p>
    </div>
    <div class="mt-3 text-center">
      <a href="/" class="text-blue-500 underline">Home</a>
    </div>
  </div>
</div>  
@endsection

