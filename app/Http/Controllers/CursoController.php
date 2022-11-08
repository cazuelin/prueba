<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCurso;

class CursoController extends Controller
{
    public function index(){
        $cursos = Curso::orderby('id','desc')->paginate();
        return view('cursos.index',compact('cursos'));
    }
    public function create(){
        return view('cursos.create');
    }
    public function store(StoreCurso $request){

        $curso = Curso::create($request->all());
        return redirect()->route('cursos.show',$curso);

    }
    /* public function show($curso){
        return view('cursos.show',['curso' => $curso]);
    } */
    public function show(Curso $curso){
        return view('cursos.show',compact('curso'));
    }

    public function edit(Curso $curso){
        return view('cursos.edit',compact('curso'));
    }
    public function update(Request $request, Curso $curso){

        $request->validate([
            'name' => 'required|max:10',
            'descripcion' => 'required|min:10',
            'categoria' => 'required',
        ]);

        $curso->update($request->all());
        return redirect()->route('cursos.show',$curso);
         
    }

    public function destroy(Curso $curso){
        $curso->delete();
        return redirect()->route('cursos.index');

    }
}
