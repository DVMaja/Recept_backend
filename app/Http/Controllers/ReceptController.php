<?php

namespace App\Http\Controllers;

use App\Models\Recept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptController extends Controller
{
    public function index()
    {
        return Recept::all();
    }

    public function show($id)
    {

        return Recept::find($id);
    }

    public function store(Request $request)
    {
        $recept = new Recept();
        $recept->nev = $request->nev;
        $recept->kat_id = $request->kat_id;
        $recept->kep_eleresi_ut = $request->kep_eleresi_ut;
        $recept->leiras = $request->leiras;

        $recept->save();
    }
    public function update(Request $request, $id)
    {
        $recept = Recept::find($id);
        $recept->nev = $request->nev;
        $recept->kat_id = $request->kat_id;
        $recept->kep_eleresi_ut = $request->kep_eleresi_ut;
        $recept->leiras = $request->leiras;
        $recept->save();
    }

    public function destroy($id)
    {
        Recept::find($id)->delete();
    }

    public function osszesRecept()
    {
        return DB::select("SELECT r.id, r.nev, k.nev as kategoria_nev, r.kep_eleresi_ut, r.leiras
                            FROM recepts r
                                INNER JOIN kategorias k ON r.kat_id = k.id
                                ");
    }
}
