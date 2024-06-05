@extends('admin.template')
@section('title')
    Phone
@endsection

@section('content')
  <div class="container mx-auto mt-24 max-w-7xl">
  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="flex justify-between">
      <div class="text-3xl">Data Phone</div>
        <div>
    <a href="" class="bg-blue-500 hover:bg-blue-300 text-white p-2 border rounded-md"> Tambah Data</a>
  </div>
</div>

<table class="table w-full mt-5 border p-3">
  <thead>
    <tr class="border p-3">
      <th class="border p-3">No</th>
      <th class="border p-3">Kode Transaksi</th>
      <th class="border p-3">Nama</th>
      <th class="border p-3">Merek</th>
      <th class="border p-3">Series</th>
      <th class="border p-3">Total Bayar</th>
      <th class="border p-3">Aksi</th>
    </tr>
  </thead>
  <tbody>
    {{-- @foreach ($user as $i => $a) --}}
      <tr class="border p-3">
        <td class="border p-3"></td>
        <td class="border p-3"></td>
        <td class="border p-3"></td>
        <td class="border p-3"></td>
        <td class="border p-3"></td>
        <td class="border p-3"></td>
        <td class="border p-3">
          <div class="flex gap-3 justify-center">
            <a href="" class="bg-yellow-500 flex items-center justify-center hover:bg-yellow-400 text-white rounded-md w-14 h8 p-2">Edit</a>
            <a href="" class="bg-red-500 flex items-center justify-center hover:bg-red-400 text-white rounded-md w-14 h8 p-2" onclick="return confirm('Apa anda yakin menghapus pengguna ini?');">Hapus</a>
          </div>
        </td>
      </tr>
    {{-- @endforeach --}}
  </tbody>
</table>

  </div>
</div>
@endsection