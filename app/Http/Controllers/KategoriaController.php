<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriaController extends Controller
{
    public function index()
    {
        return Kategoria::all();
    }

    public function show($id)
    {

        return Kategoria::find($id);
    }

    public function destroy($id)
    {
        Kategoria::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $karegoriak = Kategoria::find($id);
        $karegoriak->nev = $request->nev;
        $karegoriak->save();
    }

    public function store(Request $request)
    {
        $karegoriak = new Kategoria();
        $karegoriak->nev = $request->nev;
        $karegoriak->save();
    }
    public function kategoriaSzures($kategoria)
    {
        return DB::select("SELECT r.id, r.nev, k.nev, r.kep_eleresi_ut, r.leiras
                            FROM recepts r
                                INNER JOIN kategorias k ON r.kat_id = k.id
                                ");
    }
}
