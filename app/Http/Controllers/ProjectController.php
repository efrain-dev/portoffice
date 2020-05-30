<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateProjectRequest;


class ProjectController extends Controller
{

//    public function __construct()
//    {
//
//        $this->middleware('auth')->only('create');
//    }

    public function index()
    {
        $projects = Project::latest()->paginate(4);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {

        return view('projects.show', [
            'projects' => $project
        ]);


    }
    public function create(){

        return view('projects.create',[
            'projects'=> new Project

        ]);

    }

    public function store(CreateProjectRequest $request){

//        $fields = request()->validate([
//
//        ]);
//
//        Project::create($fields);
//
//        Project::create([
//        'title'=> request('title'),
////        'description'=> request('description'),
////        ]);
//

        Project::create($request->validated());
        return redirect()->route('projects.index')->with('sesion','Proyecto Creado con exito');


    }

    public function edit(Project $project){


        return view('projects.edit', [
            'projects' => $project
        ]);


    }

    public function update(Project $project, CreateProjectRequest $request){


        $project->update($request->validated());
        return redirect()->route('projects.show',$project)->with('sesion','Proyecto Actualizado con exito');
    }


    public function destroy(Project $project){

        $project->delete();
        return redirect()->route('projects.index')->with('sesion','Proyecto Eliminado con exito');;

    }

}
