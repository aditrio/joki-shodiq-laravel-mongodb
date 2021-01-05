<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Hamcrest\Type\IsString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isNull;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mahasiswa::create([

            'nama' => $request->nama,
            'nim' => $request->nim,
            'nilai' => "belum ada nilai",


        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Mahasiswa::find($id);

       //dd($request);
       $nilai = $request->nilai;
      
        if (is_string($nilai)) {
            
            $data->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'nilai' => strval($nilai),
            ]);
            return redirect()->back();
        }
        $data->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            
        ]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::find($id);

        $data->delete();

        return redirect()->back();

    }
}
