<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;

class devices extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Device::where('user_id',Auth::user()->id)
                    ->get();
        return view('Setting.device.device',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Setting.device.add_device');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => ['required', 'string', 'max:255'],
            'device_type_id' => ['required', 'string', 'max:255'],
            'status_device' => ['required', 'boolean'],
        ]);
        Device::create($request->all());
        return redirect('homepage/Setting/Devices');
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
        $data = Device::find($id);
        return view('setting.device.update_device',compact(['data']));
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
        $this-> Validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'device_type_id' => ['required', 'string', 'max:255'],
        ]);
        Device::find($id)->update($request->all());
        return redirect('homepage/Setting/Devices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::find($id)->delete();
        return redirect('homepage/Setting/Devices');
    }
}
