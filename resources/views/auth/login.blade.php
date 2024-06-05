@extends('auth.template')

@if (session('pesan'))
    @php
        $pesan = session('pesan')
    @endphp
    <script>
      alert("{{ $pesan }}");
    </script>
@endif

@section('title')
    Halaman Login
@endsection

@section('content')

<div class="flex min-h-screen items-center justify-center bg-gradient-to-b from-blue-700 to-transparent">
  <div class="w-4/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 bg-white p-6 shadow-lg">
    <h1 class="block text-center font-serif text-3xl">HALAMAN <span class="text-blue-500">LOGIN</span></h1>
    <hr class="mt-3" />
    <form action="{{ route('login.post') }}" method="post">
      @csrf
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

    <div class="mt-3 flex items-center justify-between">
      <div>
        <input type="checkbox" id="remember" />
        <label for="remember">Remember Me</label>
      </div>
      <div>
        <a href="" class="font-semibold text-blue-500">Forget Password?</a>
      </div>
    </div>
    <div class="mt-5 flex justify-center">
      <button type="submit" class="w-32 rounded-md border-2 border-blue-500 bg-blue-500 py-1 font-serif text-white duration-300 hover:w-full hover:scale-100 hover:bg-transparent hover:text-blue-500">Log in</button>
    </div>
    </form>

    <div class="mt-5 text-center">
      <p class="text-blue-500">
        Belum memiliki account? <span class="text-black"><a href= "{{ route('register') }}" class="hover:underline">Registrasi</a></span>
      </p>
    </div>
    <div class="mt-3 text-center">
      <a href="/" class="text-blue-500 hover:underline">Home</a>
    </div>
  </div>
</div>  
@endsection
