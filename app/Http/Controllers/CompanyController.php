<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Utils\Responser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return Responser::ok('Companies list',Company::with(['users' => function($query){
            $query->where('id',Auth::user()->id);
        }])->get()->toArray());
    }

    public function associateCompanyToUser($companyId){
        Company::find($companyId)->users()->attach(Auth::user()->id);
        return Responser::ok('Company associated');
    }

    public function disassociateCompanyToUser($companyId){
        Company::find($companyId)->users()->detach(Auth::user()->id);
        return Responser::ok('Company disassociate');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
