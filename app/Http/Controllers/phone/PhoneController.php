<?php

namespace App\Http\Controllers\phone;

use App\Models\Merek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneController extends Controller
{
    public function index(){
        // $data['phone'] = Merek::leftJoin('merek','merek.id','phone.id_merek')->select('phone.id','merek.merek','phone.merek')->get();
        return view('admin/phone/index');
    }

    public function tambahPhone(){
        $data['merek'] = Merek::get();
        return view('admin/phone/tambah',$data);
    }
}
