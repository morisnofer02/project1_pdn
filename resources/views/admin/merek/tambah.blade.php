@extends('admin.template')
@section('title')
    Tambah Merek
@endsection

@section('content')
    <div class="container mx-auto mt-24 max-w-6xl">
  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h1 class="text-center font-semibold text-3xl">Form Tambah Merek</h1>
    <form action="{{ route('save.merek') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="flex flex-col gap-2">
        <label for="merek">Merek</label>
        <input type="text" name="merek" id="merek" class="p-2 border rounded-md" value="{{ old('merek') }}">
        <span class="text-red-500">{{ $errors->first('merek') }}</span>
      </div>

      <div class="flex flex-col gap-2">
        <label for="logo">Logo</label>
        <input type="file" name="logo" id="logo" class="p-2 border rounded-md">
        <span class="text-red-500">{{ $errors->first('logo') }}</span>
      </div>

      <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 w-1/2 rounded-md text-white p-2 mt-1 hover:bg-blue-400">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection