<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }

    public function showForm()
    {
        return view('guests.form');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'asal_instansi' => 'required|string|max:255',
        'plat_kendaraan' => 'required|string|max:20',
        'kebutuhan' => 'nullable|string',
    ]);

    Guest::create($request->all());

    // Simpan nama tamu ke dalam Session
    $request->session()->put('guest_name', $request->nama);

    // Mengarahkan pengguna ke halaman selamat datang
    return redirect()->route('guests.welcome');
}



    public function showWelcomePage()
    {
        return view('guests.welcome');
    }

    public function edit($id)
    {
        $guest = Guest::find($id);
        return view('guests.edit', compact('guest'));
    }
    public function destroy($id)
    {
        Guest::destroy($id);
        return redirect()->route('guests.index')->with('success', 'Data tamu berhasil dihapus.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'asal_instansi' => 'required|string|max:255',
            'plat_kendaraan' => 'required|string|max:20',
            'kebutuhan' => 'nullable|string',
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update($request->all());

        return redirect()->route('guests.index')->with('success', 'Data tamu berhasil diperbarui.');
    }
}
