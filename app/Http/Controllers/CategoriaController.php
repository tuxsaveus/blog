<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    private function validador(array $datos)
    {
        return Validator::make($datos, [
            'nombre' => ['required', 'max:25', 'string'],
            'descripcion' => ['nullable','string']
        ]);
    }

    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $datos = $this->validador($request->all());
        /*
         $categoria = new Categoria();
         $categoria->nombre = $valida['nombre'];
         $categoria->descripcion = $valida['descripcion'];
         $categoria->save();
        */

        Categoria::create($datos->validate());
        session()->flash('exito', 'La categoria fue creada exitosamente.');

        return redirect(route('categorias.index'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $datos = $this->validador($request->all())->validated();
        $categoria->nombre = $datos['nombre'];
        $categoria->descripcion = $datos['descripcion'];
        $categoria->update();
        session()->flash('exito', 'La categoria fue actualizada exitosamente.');

        return view('categorias.edit', compact('categoria'));
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        session()->flash('exito', 'La categoria fue eliminada exitosamente.');
        return redirect(route('categorias.index'));
    }
}
