<?php

namespace App\Http\Controllers;

use App\Models\Reset_password;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Reset_password  $reset_password
     * @return \Illuminate\Http\Response
     */
    public function show(Reset_password $reset_password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reset_password  $reset_password
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('setting.reset_password',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reset_password  $reset_password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this-> Validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::find($id)->update([
            'password' => Hash::make($request['password']),
        ]);
        return redirect('homepage/Setting/Privacy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reset_password  $reset_password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reset_password $reset_password)
    {
        //
    }
}
