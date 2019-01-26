<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Person;

class PersonController extends Controller
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
        $data = Person::get();

        return view('persons.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::get();
        return view('persons.create', compact('organizations'));
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
            'email' => 'required|email|max:200'
        ]);

        $name = '';
        $destinationPath = public_path('/images/avatar/');

        if ($request->file('avatars')) {
            $img = $request->file('avatars');
            $name = $request->name.'-'.time() . '.'. $img->getClientOriginalExtension();
            $img->move($destinationPath, $name);
        }

        $request->merge([
            'avatar' => $name
        ]);

        Person::create($request->all());

        $request->session()->flash('flash_message', 'Successfully added!');
        
        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Person::findOrFail($id);
        $url = url("/images/avatar/{$data->logo}");

        return view('persons.edit', compact('data', 'url'));
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
        $person = Person::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:200',
            'phone' => 'required|max:15',
            'email' => 'required|email|max:200'
        ]);

        if ($request->file('avatars')) {
            $name = '';
            $destinationPath = public_path('/images/avatar/');

            $img = $request->file('avatars');
            $name = $request->name.'-'.time() . '.'. $img->getClientOriginalExtension();
            $img->move($destinationPath, $name);

            $request->merge([
                'avatar' => $name
            ]);
        }

        $input = $request->all();

        $person->fill($input)->save();

        $request->session()->flash('flash_message', 'Successfully updated!');
        
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $person = Person::find($id);
        $person->delete();

        $request->session()->flash('flash_message', 'Successfully deleted!');

        return redirect()->route('person.index');
    }
}
