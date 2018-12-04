<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Controllers\Controller;
use App\Project;
use App\Customer;
use Carbon\Carbon;


class ProjectController extends Controller
{
    
    public function index(Request $request){
        if ($request->filled('search_field')){
            $data_arr = explode(" ", $request->search_field);
            if (count($data_arr) > 1){
                $projects = Project::whereName($request->search_field)->orWhereHas('customer', function($query) use ($data_arr){
                    $query->whereFirstName($data_arr[0])->whereLastName($data_arr[1]);
                })->get();
                return view('projects.viewAll', ['projects' => $projects]);
            }
            else{
                $projects = Project::whereName($request->search_field)->orWhereHas('customer', function($query) use ($request){
                    $query->whereFirstName($request->search_field)->orWhere('last_name', $request->search_field);
                })->get();
                return view('projects.viewAll', ['projects' => $projects]); 
            }
        }
        else{
            $projects =  Project::get();
            return view('projects.viewAll', ['projects' => $projects]);
        }
    }

    public function create(){
        $customers = Customer::get();
        return view('projects.newProject', ['customers' => $customers]);
    }

    public function show($id){
        $project = Project::find($id);
        return view('projects.viewProject', ['project' => $project]);
    }

    public function edit($id){
        $project = Project::find($id);
        $customers = Customer::get();
        return view('projects.editProject', ['project' => $project, 'customers' => $customers]);
    }

    public function confirm($id){
        $project = Project::find($id);
        return view('confirmation', ['project' => $project]);
    }

    public function store(ProjectStoreRequest $request){

        $project = Project::create($request->all());

        $project->start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $project->end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');

        $project->save();

        return redirect()->route('projects.index');
    }

    public function update($id , ProjectUpdateRequest $request){
        
        $project = Project::find($id);
        $project->update($request->all());

        $project->start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $project->end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');

        $project->save();

        return redirect()->route('projects.index');
    }

    public function destroy($id){
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.index');
    }
}