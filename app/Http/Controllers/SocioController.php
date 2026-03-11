<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    public function index()
    {
        $socios = Socio::all();
        return view('socios.list', compact('socios'));
    }

    public function create()
    {
        return view('socios.create');
    }

    public function store(Request $request)
    {
        Socio::create($request->all());
        return redirect()->route('socios.index');
    }

    public function destroy($id)
    {
        $socio = Socio::findOrFail($id);
        $socio->delete();

        return redirect()->route('socios.index');
    }

    public function edit($id)
    {
        $socio = Socio::findOrFail($id);
        return view('socios.edit', compact('socio'));
    }

    public function update(Request $request, $id)
    {
        $socio = Socio::findOrFail($id);
        $socio->update($request->all());

        return redirect()->route('socios.index');
    }
}
