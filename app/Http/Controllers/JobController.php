<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request, $slug, $id)
    {

        $hashids = new Hashids(config('app._token_id'));
        $hashID = $hashids->decode($id) ?? [];
        $idJob = array_pop($hashID);
        if (!$idJob) return abort(404);
        $job = Job::with('career:id,c_name', 'company:id,c_name,c_logo,c_address',)->find($idJob);
        if (!$job) return abort(404);
        $company = Company::with('careers')->find($job->j_company_id);
        $jobSuggest = Job::where('j_career_id', $job->j_career_id)
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $viewdata = [

            'job' => $job,
            'hashIDJob' => $id,
            'company' =>  $company,
            'jobSuggest' => $jobSuggest
        ];

        return view('job_detail.index', $viewdata);
    }
}
