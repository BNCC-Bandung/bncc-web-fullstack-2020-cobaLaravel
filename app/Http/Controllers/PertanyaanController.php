<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = DB::table("pertanyaan")->get();
        return view('forum.index', compact('pertanyaan'));
    }
    public function create(){
        return view('forum.pertanyaan.create');

    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required|max:45',
            'isi' => 'required|max:255'
        ]);

        $res = DB::table("pertanyaan")->insert([
            "judul"=>$request->judul,
            "isi"=>$request->isi,
            "created_at"=> Carbon::now(),
            "updated_at"=> Carbon::now()
        ]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dibuat');
    } 
    public function show($id){
        $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();
        return view('forum.pertanyaan.show', compact('pertanyaan'));
    }
    public function edit($id){
        $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();
        return view('forum.pertanyaan.edit', compact('pertanyaan'));
    }
    public function update($id,Request $request){
        $validatedData = $request->validate([
            'judul' => 'required|max:45',
            'isi' => 'required|max:255'
        ]);

        $pertanyaan = DB::table('pertanyaan')->where('id',$id)->update(["judul" => $request["judul"],"isi" => $request["isi"],"updated_at"=> Carbon::now()]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diupdate');
    }
    public function destroy($id){
        $pertanyaan = DB::table('pertanyaan')->where('id',$id)->delete();
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
