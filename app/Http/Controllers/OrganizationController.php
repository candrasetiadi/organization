<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Person;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Organization::get();

        return view('organizations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'phone' => 'required|max:15',
            'email' => 'required|email|max:200',
            'website' => 'required|max:200'
        ]);

        $name = '';
        $destinationPath = public_path('/images/logo/');

        if ($request->file('logos')) {
            $img = $request->file('logos');
            $name = $request->name.'-'.time() . '.'. $img->getClientOriginalExtension();
            $img->move($destinationPath, $name);
        }

        $request->merge([
            'logo' => $name
        ]);

        Organization::create($request->all());

        $request->session()->flash('flash_message', 'Successfully added!');
        
        return redirect()->route('organization.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Person::where('organization_id', $id)->get();

        return view('organizations.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Organization::findOrFail($id);
        $url = url("/images/logo/{$data->logo}");

        return view('organizations.edit', compact('data', 'url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:200',
            'phone' => 'required|max:15',
            'email' => 'required|email|max:200',
            'website' => 'required|max:200'
        ]);

        if ($request->file('logos')) {
            $name = '';
            $destinationPath = public_path('/images/logo/');

            $img = $request->file('logos');
            $name = $request->name.'-'.time() . '.'. $img->getClientOriginalExtension();
            $img->move($destinationPath, $name);

            $request->merge([
                'logo' => $name
            ]);
        }

        $input = $request->all();

        $organization->fill($input)->save();

        $request->session()->flash('flash_message', 'Successfully updated!');
        
        return redirect()->route('organization.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $organization = Organization::find($id);
        $organization->delete();

        $request->session()->flash('flash_message', 'Successfully deleted!');

        return redirect()->route('organization.index');
    }
}
