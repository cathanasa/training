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
    public function filter(Request $request){

        if ($request->has('name')){
            $projects = Project::where('name', $request->input('name'))->get();
            return view('viewAll', ['projects' => $projects]);
        }

        if ($request->has('first_name')){
            $customers = Customer::where('first_name', $request->input('first_name'))->get();
            foreach ($customers as $customer){
                $projects = Project::where('customer_id', $customer->id)->get();    
            }
            return view('viewAll', ['projects' => $projects]);
        }

        if ($request->has('last_name')){
            $customers = Customer::where('last_name', $request->input('last_name'))->get();
            foreach ($customers as $customer){
                $projects = Project::where('customer_id', $customer->id)->get();    
            }
            return view('viewAll', ['projects' => $projects]);
        }
        
        return view('viewAll', ['projects' => Project::get()]);
    }

    public function index(){
        $projects =  Project::get();
        return view('viewAll', ['projects' => $projects]);
    }

    public function new(){
        $customers = Customer::get();
        return view('newProject', ['customers' => $customers]);
    }

    public function view($id){
        $project = Project::find($id);
        return view('viewProject', ['project' => $project]);
    }

    public function edit($id){
        $project = Project::find($id);
        $customers = Customer::get();
        return view('editProject', ['project' => $project, 'customers' => $customers]);
    }

    public function confirm($id){
        $project = Project::find($id);
        return view('confirmation', ['project' => $project]);
    }

    public function store(ProjectStoreRequest $request){

        $validatedData = $request->validated();

        $project = new Project;
        
        $project->name = $request->input('name');
        $project->customer_id = $request->input('customer_id');
        $project->start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $project->end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');
        $project->active = $request->input('active');
        $project->budget = $request->input('budget');
        $project->description = $request->input('description');

        $project->save();
        return redirect('index');
    }

    public function update($id , ProjectUpdateRequest $request){
        
        $validatedData = $request->validated();

        $project = Project::find($id);

        $project->name = $request->input('name');
        $project->customer_id = $request->input('customer_id');
        $project->start_date = Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $project->end_date = Carbon::parse($request->input('end_date'))->format('Y-m-d');
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