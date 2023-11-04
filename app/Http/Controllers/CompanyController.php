<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\Company\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:business.index')->only(['index']);
        $this->middleware('can:business.edit')->only(['update']);
    }

    public function index()
    {
        $user_session= Auth::user()->email;
        $company = Company::where('id', 1)->firstOrFail();
        return view('admin.company.index', compact('company', 'user_session'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(UpdateRequest $request, Company $company)
    {
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $company->update($request->all()+ ['comp_logo' => $image_name,]);
        }else{
            $company->update(
            ['comp_name' => $request->comp_name,
            'comp_description' => $request->comp_description,
            'comp_email' => $request->comp_email,
            'comp_address' => $request->comp_address,
            'comp_ruc' => $request->comp_ruc,]);
        }
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
