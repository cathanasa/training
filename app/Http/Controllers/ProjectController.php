<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Project;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function viewProjects(){
        $project =  DB::table('projects')->get();
        return view('viewAll', ['projects' => $project]);
    }

    public function view($id){
        $project = Project::find($id);
        return view('viewProject', ['project' => $project]);
    }

    public function edit($id){
        $project = Project::find($id);
        return view('editProject', ['project' => $project]);
    }

    public function store(Request $request){
        $project = new Project;
        
        $project->name = $request->input('name');
        $project->customer = $request->input('customer');
        $project->start_date = Carbon::now()->format('Y-m-d');
        $project->end_date = Carbon::now()->format('Y-m-d');
        $project->active = $request->input('active');
        $project->budget = $request->input('budget');
        $project->description = $request->input('description');

        $project->save();
        return redirect('index');
    }

    public function update($id , Request $request){
        $project = Project::find($id);

        $project->name = $request->input('name');
        $project->customer = $request->input('customer');
        $project->start_date = Carbon::now()->format('Y-m-d');
        $project->end_date = Carbon::now()->format('Y-m-d');
        $project->active = $request->input('active');
        $project->budget = $request->input('budget');
        $project->description = $request->input('description');

        $project->save();
        return redirect('index');
    }

    public function delete($id){
        $project = Project::find($id);
        $project->delete();
        return redirect('index');
    }

}
