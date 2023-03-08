<?php

namespace Modules\Employer\Http\Controllers;

use App\Models\Career;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Employer\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\CompanyCareer;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Hashids\Hashids;

class EmployerCompanyController extends Controller
{
  public function index()
  {
    $scale = (new Company())->scale;
    $working_time = (new Company())->working_time;
    $careers = Career::all();
    $company = Company::Where('c_employer_id', get_data_user('users'))->first();
    $careerCompany = CompanyCareer::Where('cc_company_id', $company->id ?? 0)->pluck('cc_careers_id')->toArray();
    $viewData = [
      'scale' => $scale,
      'careers' => $careers,
      'company' => $company,
      'careerCompany' => $careerCompany,
      'working_time' => $working_time,
    ];
    return view('employer::company.index', $viewData);
  }
  //   get_employer.company.store
  public function store(CompanyRequest $request)
  {
    $data = $request->except('_token', 'logo', 'careers');
    $data['c_slug'] = Str::slug($request->c_name);
    $data['created_at'] = Carbon::now();
    if ($request->logo) {
      $image = upload_image('logo');
      if ($image['code'] == 1)
        $data['c_logo'] = $image['name'];
    }
    $company = Company::Where('c_employer_id', get_data_user('users'))->first();
    if ($company) {
      $company->fill($data)->save();
      $this->syncCareers($request->careers, $company->id);
      return redirect()->back();
    }
    $company = Company::create($data);
    if ($company) {
      $company->c_employer_id = get_data_user('users');
      $company->save();
      $hashids = new Hashids(config('app._token_id'));
      $hashID = $hashids->encode(1, 10, 112, 12121, 12, 2, 1, 2, $company->id);
      $company->c_hash_slug = $hashID;
      $company->save();
    }
    $this->syncCareers($request->careers, $company->id);
    return redirect()->back();
    // return view('employer::company.index');

  }
  public function syncCareers($careers, $companyID)
  {
    if (!empty($careers)) {
      try {
        $tmp = CompanyCareer::where("cc_company_id", $companyID)->delete();
        foreach ($careers as $item) {
          CompanyCareer::create([
            'cc_company_id' => $companyID,
            'cc_careers_id' => $item
          ]);
        }
      } catch (\Exception $exception) {
        dd($exception);
      }
    }
  }
}
