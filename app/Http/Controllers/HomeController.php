<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use Hashids\Hashids;
use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        $jobsnew = Job::with('company:id,c_name,c_logo')->orderByDesc('id')
            ->limit(10)
            ->get(['id', 'j_name', 'j_address', 'j_slug', 'j_hash_slug', 'j_company_id', 'j_form_of_work_id']);
        $careerHot = Career::where('c_hot', Career::HOT)
            ->limit(8)
            ->orderbyDesc('id')
            ->get();
        $viewData = [
            'careerHot' => $careerHot,
            'jobsnew' => $jobsnew,
        ];
        return view('home.index', $viewData);
    }
}
