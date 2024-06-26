<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Permission;

class PermissionContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('roles.index');
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
        $role_id = $request->role_id;
        $routes = $request->except('_token', 'role_id');
        $data = [];

        foreach ($routes as $route) {
            $row['role_id'] = $role_id;
            $row['route_name'] = $route;
            array_push($data, $row);
        }

        $status = true;
        DB::beginTransaction();
        try {
            Permission::where('role_id', $role_id)->delete();
            $result = Permission::insert($data);

            if(!$result){
                DB::rollback();
                $status = false;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            $status = false;
            dd($e);
        }

        if($status){
            session(['success' => 'Permission was saved successfully']);
        }else {
            session(['error' => 'Permission can not save']);
        }

        return view('roles.index', ['role_id' => $role_id]);
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
