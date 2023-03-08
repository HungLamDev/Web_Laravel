<?php

namespace Modules\User\Http\Controllers;

use App\Models\Job;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class UserFavouriteController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::whereHas('favourites', function ($query) {
            $query->where('jf_user_id', get_data_user('users'));
        })->orderByDesc('id')
            ->paginate(20);
        $viewdata = [
            'jobs' => $jobs
        ];
        return view('user::pages.fob_favourite.index', $viewdata);
    }
    public function remove(Request $request, $jobID)
    {
        /**
         *  xóa nút yêu thích
         */
        try {
            \DB::table('job_favourite')->where([
                'jf_job_id' => $jobID,
                'jf_user_id' => get_data_user('users')
            ])->delete();
        } catch (\Eception $exception) {
            Log::error();
        }
        return redirect()->back();
    }
}
