<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\EmployeeCrud;
use App\Http\Requests\EmployeeCrudRequest;

class EmployeeCrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $employeecruds = EmployeeCrud::select('*');
        $counter = clone $employeecruds;
        $total_count = $counter->count();
        $total_active = $counter->where('status', 1)->count();
        $total_inactive = $total_count - $total_active;


        return view('employeecruds.index', ['employeecruds'=>$employeecruds->get(), 'total_count' => $total_count, 'total_active' => $total_active, 'total_inactive' => $total_inactive]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('employeecruds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeCrudRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeCrudRequest $request)
    {
        $employeecrud = new EmployeeCrud;
		$employeecrud->name = $request->input('name');
		$employeecrud->f_name = $request->input('f_name');
		$employeecrud->cnic = $request->input('cnic');
		$employeecrud->dob = $request->input('dob');
        $profilePicture = $request->file('profile_picture');
        $path = $profilePicture->store('profiles');
        $employeecrud->profile_picture = $path;
		$employeecrud->address = $request->input('address');
		$employeecrud->experience = $request->input('experience');
		$employeecrud->status = ($request->input('status') == 'enabled') ? true : false;
        $employeecrud->save();

        return to_route('employeecruds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $employeecrud = EmployeeCrud::findOrFail($id);
        return view('employeecruds.show',['employeecrud'=>$employeecrud]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $employeecrud = EmployeeCrud::findOrFail($id);
        return view('employeecruds.edit',['employeecrud'=>$employeecrud]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeeCrudRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeCrudRequest $request, $id)
    {
        $employeecrud = EmployeeCrud::findOrFail($id);
		$employeecrud->name = $request->input('name');
		$employeecrud->f_name = $request->input('f_name');
		$employeecrud->cnic = $request->input('cnic');
		$employeecrud->dob = $request->input('dob');
		$employeecrud->address = $request->input('address');
        if( $request->file('profile_picture')){
            $profilePicture = $request->file('profile_picture');
            $path = $profilePicture->store('profiles');
            $employeecrud->profile_picture = $path;
        }
		$employeecrud->experience = $request->input('experience');
		$employeecrud->status = ($request->input('status') == 'enabled') ? true : false;
        $employeecrud->save();

        return to_route('employeecruds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $employeecrud = EmployeeCrud::findOrFail($id);
        $employeecrud->delete();

        return to_route('employeecruds.index');
    }
}