<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function viewProjects(){
        $project =  DB::table('projects')->get();
        return view('viewAll', ['projects' => $project]);
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
    }

}
