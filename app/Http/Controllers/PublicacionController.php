<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Categoria;

class PublicacionController extends Controller
{
    public function index()
    {
        $publicaciones = Publicacion::where('eliminado_el', null)->get(); //SELECT * FROM publicaciones
        return view('publicaciones.index', compact('publicaciones'));
    }

    public function categoria(Categoria $categoria)
    {
        $publicaciones = $categoria->publicaciones;
        return view('publicaciones.index', compact('publicaciones'));
    }

    public function show(int $id)
    {
        $publicacion = Publicacion::find($id); // SELECT * FROM publicaciones WHERE id = $id
        return view('publicaciones.show', compact('publicacion'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('publicaciones.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $valida = $request->validate([
             //'titulo' => 'required|max:100|alpha_num',
             'titulo' => ['required','max:100','alpha_num', 'unique:publicaciones,titulo'],
            'articulo' => ['required'],
            'categoria_id' => ['required','numeric', 'exists:categorias,id'],
            'activo' => ['boolean']
        ],
        [
            'required' => ':attribute es requerido.',
            'max'      => ':attribute no puede tener mas de :max caracteres',
            'numeric' => ':attribute solo puede tener numeros',
            'alpha_num' => ':attribute solo puede tener letras y numeros',
            'unique' => 'Este :attribute ya esta siendo usado',
            'exists' => 'Esta :attribute no es valida',
        ]
        );
        Publicacion::create($valida); //INSERT INTO publicaciones ('titulo','articulo') VALUES ($request->titulo, $request->articulo)
        session()->flash('exito', 'La publicacion fue creada exitosamente.');
        return redirect(route('publicaciones.index'));
    }

    public function edit(int $id)
    {
        $publicacion = Publicacion::find($id); // SELECT * FROM publicaciones WHERE id = $id
        return view('publicaciones.edit', compact('publicacion'));
    }

    public function update(Request $request, int $id)
    {
        $valida = $request->validate([
            //'titulo' => 'required|max:100|alpha_num',
            'titulo' => ['required','max:100','alpha_num'],
           'articulo' => ['required'],
           'categoria' => ['numeric'],
           'activo' => ['boolean']
       ],
       [
           'required' => ':attribute es requerido.',
           'max'      => ':attribute no puede tener mas de :max caracteres',
           'numeric' => ':attribute solo puede tener numeros',
           'alpha_num' => ':attribute solo puede tener letras y numeros'
       ]
       );
        $publicacion = Publicacion::find($id);
        $publicacion->titulo = $valida['titulo'];
        $publicacion->categoria = $valida['categoria'];
        $publicacion->articulo = $valida['articulo'];
        $publicacion->activo = $valida['activo'];
        $publicacion->update();// UPDATE publicaciones SET titulo = $request->titulo, articulo = $request->articulo WHERE id = $id
        session()->flash('exito', 'La publicacion fue actualizada exitosamente.');

        return back();
    }

    public function destroy(int $id)
    {
        $publicacion = Publicacion::find($id);
        //$publicacion->delete();
        $publicacion->eliminado_el = now();
        $publicacion->update();
        session()->flash('exito', 'La publicacion fue eliminada exitosamente.');
        return redirect(route('publicaciones.index'));
    }
}
