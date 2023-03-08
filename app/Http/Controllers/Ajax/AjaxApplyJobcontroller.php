<?php


namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use App\Models\Job;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AjaxApplyJobcontroller extends Controller
{
    public function applyJob(Request $request)
    {
        if ($request->ajax()) {
            $hashSlug = $request->hash_slug;
            $hashids = new Hashids(config('app._token_id'));
            $hashID = $hashids->decode($hashSlug) ?? [];
            $idJob = array_pop($hashID);
            if (!$idJob) {
                return response([
                    'stauts' => 404,
                    'messages' => 'dữ liệu không tồn tại'
                ]);
            }
            $job = Job::find($idJob);
            if (!$job) {
                return response([
                    'stauts' => 404,
                    'messages' => 'dữ liệu không tồn tại'
                ]);
            }
            $userID  = get_data_user('users') ? get_data_user('users') : 0;
            if ($userID) {
                $jobApply = ApplyJob::where([
                    'aj_user_id' => $userID,
                    'aj_job_id' => $idJob
                ])->first();
                if ($jobApply) {
                    return response([
                        'stauts' => 200,
                        'messages' => 'bạn đã ứng tuyển job này'
                    ]);
                }
            }
            $applyJob = $this->createApplyJob($request, $job);
            if ($applyJob) {
                return response([
                    'stauts' => 200,
                    'messages' => 'Ứng tuyển thành công'
                ]);
            }
            return response([
                'stauts' => 201,
                'messages' => 'Ứng tuyển thất bại'
            ]);
        }
    }
    protected function createApplyJOb($request, $job)
    {

        try {
            return  $applyJob = ApplyJob::create([
                'aj_name' => $request->name,
                'aj_phone' => $request->phone,
                'aj_email' => $request->email,
                'aj_user_id' =>  get_data_user('users') ? get_data_user('users') : 0,
                'aj_job_id' => $job->id,
                'aj_hash_slug' => $job->j_hash_slug,
                'aj_company_id' => $job->j_company_id,
                'aj_employer_id' => $job->j_employer_id,
                'aj_about' => $request->about,
                'aj_file_cv' => null,
                'created_at' => Carbon::now()
            ]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return null;
    }
}
