<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\GenericNotice;

class GudangController extends Controller
{
    public function index()
    {
        $gudangs = Gudang::latest()->get();
        return view('admin.gudang.index', compact('gudangs'));
    }

    public function create()
    {
        return view('admin.gudang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,tidak_aktif,penuh,maintenance',
            'catatan' => 'nullable',
        ]);

        $gudang = Gudang::create($request->all());

        try {
            $recipients = User::whereHas('roles', function($q){ $q->whereIn('name', ['Super Admin','Staff']); })->get();
            if ($recipients->isNotEmpty()) {
                Notification::send($recipients, new GenericNotice(
                    'Gudang Baru',
                    "Gudang {$gudang->nama_gudang} dibuat oleh " . auth()->user()->name
                ));
            }
        } catch (\Throwable $e) {
            \Log::error('Gagal mengirim notifikasi gudang: ' . $e->getMessage());
        }

        return redirect()->route('admin.gudang.index')->with('success', 'Gudang berhasil ditambahkan');
    }

    public function show(Gudang $gudang)
    {
        return view('admin.gudang.show', compact('gudang'));
    }

    public function edit(Gudang $gudang)
    {
        return view('admin.gudang.edit', compact('gudang'));
    }

    public function update(Request $request, Gudang $gudang)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'required|numeric|min:0',
            'status' => 'required|in:aktif,tidak_aktif,penuh,maintenance',
            'catatan' => 'nullable',
        ]);

        $gudang->update($request->all());

        try {
            $recipients = User::whereHas('roles', function($q){ $q->whereIn('name', ['Super Admin','Staff']); })->get();
            if ($recipients->isNotEmpty()) {
                Notification::send($recipients, new GenericNotice(
                    'Gudang Diperbarui',
                    "Gudang {$gudang->nama_gudang} diperbarui oleh " . auth()->user()->name
                ));
            }
        } catch (\Throwable $e) {
            \Log::error('Gagal mengirim notifikasi update gudang: ' . $e->getMessage());
        }

        return redirect()->route('admin.gudang.index')->with('success', 'Gudang berhasil diperbarui');
    }

    public function destroy(Gudang $gudang)
    {
        $name = $gudang->nama_gudang;
        $gudang->delete();

        try {
            $recipients = User::whereHas('roles', function($q){ $q->whereIn('name', ['Super Admin','Staff']); })->get();
            if ($recipients->isNotEmpty()) {
                Notification::send($recipients, new GenericNotice(
                    'Gudang Dihapus',
                    "Gudang {$name} dihapus oleh " . auth()->user()->name
                ));
            }
        } catch (\Throwable $e) {
            \Log::error('Gagal mengirim notifikasi hapus gudang: ' . $e->getMessage());
        }

        return redirect()->route('admin.gudang.index')->with('success', 'Gudang berhasil dihapus');
    }
}