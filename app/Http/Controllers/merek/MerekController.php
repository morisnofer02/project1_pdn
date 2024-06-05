<?php

namespace App\Http\Controllers\merek;

use App\Models\Merek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\EditMerekRequest;
use App\Http\Requests\TambahMerekRequest;

class MerekController extends Controller
{
    public function index(){
        // kirimkan data ke halaman merek
        $data['merek'] = Merek::get();
        return view('admin/merek/index',$data);
    }

    public function tambah(){
        return view('admin/merek/tambah');
    }

    public function saveMerek(TambahMerekRequest $m){
        // cek apakah telah lolos dari validasi
        if($m->validated()){
            // cek apakah ada file berupa gambar
            $logo = $m->logo->getClientOriginalName();
            // simpan logo tersebut ke dalam folder logo
            $m->logo->move('logo/',$logo);

            // jika data sudah lolos validasi maka insert ke table merek
            Merek::create([
                'merek' => $m->merek,
                'logo' => $logo
            ]);
            // kembalikan ke halaman merek
            return redirect('merek')->with('pesan','Merek berhasil ditambahkan');
        }
    }

    public function updateMerek(EditMerekRequest $m, $id){
        if($m->validated()){
            if($m->logo){
                $cek = Merek::where('id',$id)->first();
                if(File::exists(public_path('logo/'.$cek->logo))){
                    File::delete(public_path('logo/'.$cek->logo));
                }
                $logo = $m->logo->getClientOriginalName();
                $m->logo->move('logo/',$logo);

                $data['logo'] = $logo;
            }
            $data['merek'] = $m->merek;
            
            Merek::where('id',$id)->update($data);
            return redirect('merek')->with('pesan','Merek berhasil diupdate');
        }
    }

    public function editMerek($id){
        $data['merek'] = Merek::where('id',$id)->first();
        return view('admin/merek/edit',$data);
    }

    public function hapusMerek($id){
        Merek::where('id',$id)->delete();
        return back()->with('pesan','Merek berhasil dihapus');
    }
}
