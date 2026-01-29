<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use App\Models\Rute;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index()
    {
        $tarifs = Tarif::latest()->paginate(10);
        $rutes = Rute::all();
        $hasil = null; // ✅ Tambahkan ini
        
        return view('public.tarif.index', compact('tarifs', 'rutes', 'hasil'));
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'id_rute' => 'required|exists:rutes,id_rute',
            'id_tarif' => 'required|exists:tarif_layanan,id_tarif',
        ]);

        $rute = Rute::findOrFail($request->id_rute);
        $tarif = Tarif::findOrFail($request->id_tarif);

        // Hitung total biaya
        $total = $rute->jarak_km * $tarif->tarif_per_km;

        // Cek minimal tarif
        if ($total < $tarif->minimal_tarif) {
            $total = $tarif->minimal_tarif;
        }

        return view('public.tarif.result', compact('rute', 'tarif', 'total'));
    }
}