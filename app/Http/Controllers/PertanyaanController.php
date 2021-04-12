<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pertanyaan;

class PertanyaanController extends Controller
{
    public function index(){
        $pertanyaan = Pertanyaan::all();
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

        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request->judul;
        $pertanyaan->isi = $request->isi;
        $res = $pertanyaan->save();

        if($res){
            return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dibuat');
        }else{
            return redirect('/pertanyaan')->with('success', 'Pertanyaan gagal dibuat');
        }
    } 

    public function show($id){
        $pertanyaan = Pertanyaan::find($id)->first();
        return view('forum.pertanyaan.show', compact('pertanyaan'));
    }

    public function edit($id){
        $pertanyaan = Pertanyaan::where('id',$id)->first();
        return view('forum.pertanyaan.edit', compact('pertanyaan'));
    }

    public function update($id, Request $request){
        $validatedData = $request->validate([
            'judul' => 'required|max:45',
            'isi' => 'required|max:255'
        ]);

        $pertanyaan = Pertanyaan::where('id',$id)->update(["judul" => $request["judul"],"isi" => $request["isi"]]);

        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil diupdate');
    }

    public function destroy($id){
        $pertanyaan = Pertanyaan::where('id',$id)->delete();
        
        // Cara Lain
        // $pertanyaan = Pertanyaan::destroy($id);
        
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil dihapus');
    }
}
