<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\UserSideBar;
// use  UserSideBar;
class UserSideBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=DB::table('sidebar')->get();
         return View('SideBar.AssignRole',compact('roles'));
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
        // dd($request->all());
        $roles=DB::table('sidebar')->get();
        $detail=DB::table('user_side_bars')
        ->where('user_id',$request->user_id)->where('sidebar_id',$request->role_id)->get();
        // dd($detail);
        $role=count($request->role_id);
        //  dd($role);
       if($detail->isEmpty())
       {
         for($i=0; $i<$role; $i++)
             {
         UserSideBar::create(['user_id'=>$request->user_id,'sidebar_id'=>$request->role_id[$i]]);
            }
          toastr()->success('Role Assigned Succesfully');
              return View('SideBar.AssignRole',compact('roles'));
            }
            else{
                toastr()->success('Already Assigned Succesfully');
                return View('SideBar.AssignRole');
               }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
