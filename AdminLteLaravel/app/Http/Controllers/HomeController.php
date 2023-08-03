<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\stateModel;
use App\Models\cityModel;
use Illuminate\Support\Composer;

class HomeController extends Controller
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
            $st=stateModel::where('id',"LIKE","%$search%")->orWhere('statename',"LIKE","%$search%")->orWhere('statecode',"LIKE","%$search%")->orWhere('Created_at',"LIKE","%$search%")->orWhere('Updated_at',"LIKE","%$search%")->get();
        }else{
            $st = stateModel::paginate(5);
        }
        $data=compact('st','search');
        return view('layouts.view',[
            'states' => $st
        ]);
    }
    public function create()
    {
        return view('layouts.create');
    }   

    public function store(Request $request)
    {
        $request->validate([
            'statename' => 'required',
            'statecode' => 'required',
        ]);

        $state = new stateModel;
        $state->id = $request->id;
        $state->statename = $request->statename;
        $state->statecode = $request->statecode;
        $state->created_at = $request->created_at;
        $state->updated_at = $request->updated_at;
        $state->save();
        return redirect('/stateList');
    }

    public function edit($id)
    {
        $state=stateModel::find($id);
        return view('layouts.update',compact('state'));
    }

    public function update(Request $request,$id)
    {
        $state= stateModel::find($id);
        $state->statename=$request->input('statename');
        $state->statecode=$request->input('statecode');
        $state->update();
        return redirect('/stateList');
    }

    public function delete($id)
    {
        stateModel::find($id)->delete();  
        return back();
    }
}
