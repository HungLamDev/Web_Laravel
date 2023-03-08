<?php

namespace Modules\Admin\Http\Controllers;


use App\Models\Job;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminJobController extends Controller
{
    public function index(){
        $jobs = Job::with('career:id,c_name')->orderByDesc('id')
                ->paginate(10);
            $viewdata = [
                'jobs' => $jobs
            ];
        return view('admin::job.index', $viewdata);
    }
    public function edit($id){
        $job = Job::find($id);
        $status = (new Job())->getStatus();
    
        $viewdata = [
            'job' => $job,
            'status' =>  $status
        ];
        return view('admin::job.update', $viewdata);
    }
    public function update(Request $request , $id){
        $job = Job::find($id);
        $job->j_status = $request->j_status;
        $job->j_admin_id = 0;
        $job->save();
         return redirect()->route('get_admin.job.index');
        dd($request->all());


    }
}
