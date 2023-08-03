<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\cityModel;
use App\Models\stateModel;
use Illuminate\Support\Composer;

class citycontroller extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search=$request['search'] ?? "";
        if($search !="")
        {
            $ct=cityModel::where('Id',"LIKE","%$search%")->orWhere('CityName',"LIKE","%$search%")->orWhere('CityCode',"LIKE","%$search%")->get();
        }else{
            $ct = cityModel::paginate(5);
        }
        $data=compact('ct','search');
        return view('layouts.cityview',[
            'citys' => $ct
        ]);
    }
    public function create()
    {
        // return view('layouts.citycreate',[]);

        return view('layouts.citycreate',[
            'state' => stateModel::get()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'cityname' => 'required',
            'citycode' => 'required',
        ]);

        $city = new cityModel;
        $city->id = $request->id;
        $city->state_id =$request->state_id;
        $city->cityname = $request->cityname;
        $city->citycode = $request->citycode;
        $city->created_at = $request->created_at;
        $city->updated_at = $request->updated_at;
        $city->save();
        return redirect('/cityList');
    }

    public function edit($id)
    {
        $city =cityModel::find($id);
        return view('layouts.cityupdate',compact('city'),['state' => stateModel::get()]);
    }

    public function update(Request $request,$id)
    {
        $city=cityModel::find($id);
        $city->state_id =$request->input('state_id');
        $city->cityname=$request->input('cityname');
        $city->citycode=$request->input('citycode');
        $city->update();
        return redirect('/cityList');
    }

    public function remove($id)
    {
        $city=cityModel::find($id);
        // $city->delete();
        return redirect('/cityList');
    }
}
