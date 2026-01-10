<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('domains')->where('status', 1)->get();
        return view('tenants.views.crudtenant.index',compact('tenants'));
        # return view('tenants.views.crudtenant.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.views.crudtenant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request);
        $request->validate([
            'name'=>'required|string|max:255',
            'domain'=>'required|string|max:255|unique:domains,domain',


        ]);

        //$tenant= Tenant::create($request->all());
        $tenant = new Tenant;
            $tenant->name = $request->name;
            $tenant->domain = $request->domain;
            $tenant->status = '1';
        $tenant->save();


        $tenant->domains()->create([
            'domain' => $request->get('domain').'.'. config('app.domain'),
        ]);

        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        return view('tenants.views.crudtenant.edit', [
        'tenant' =>$tenant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        // return $request->all();
        $request->validate([
        'name' => 'required|unique:tenants,name,' .$tenant->name,
        ]);

        $tenant->update([
        'name' =>$request->get('name'),
        'domain' =>$request->get('domain'),
        ]);

        $tenant->domains()->update([
        'domain' =>$request->get('domain').'.'.config ('app.domain'),
        ]);

        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
	    return redirect()->route('tenants.index');
    }
}
