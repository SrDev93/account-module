<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $roles = Role::latest()->get();
        
        return view('account::front.role_permission.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('account::front.role_permission.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|unique:roles,name',
            'permission' => 'required|array|min:1',
            "permission.*"  => "required|string|distinct",
        ]);

        try{        
            $role = Role::create(['name' => $request->role]);

            foreach($request->permission as $permission){
                if(!Permission::where('name' , $permission)->first()){
                    Permission::create(['name' => $permission]);
                }

                $permissions = Permission::whereIn('name',$request->permission)->get(); 
                $role->syncPermissions($permissions);
            }
            
            return redirect()->route('admin.role-permission.index')->with('flash_message', 'با موفقیت ثبت شد');        
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Role $role_permission)
    {
        $permissions = $role_permission->permissions->pluck('name')->toArray();
        return view('account::front.role_permission.edit',compact('role_permission','permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Role $role_permission)
    {
        $request->validate([
            'role' => 'required|string|unique:roles,name,' .$role_permission->id,
            'permission' => 'required|array|min:1',
            "permission.*"  => "required|string|distinct",
        ]);

        try{        
            $role_permission->update(['name' => $request->role]);

            foreach($request->permission as $permission){
                if(!Permission::where('name' , $permission)->first()){
                    Permission::create(['name' => $permission]);
                }

                $permissions = Permission::whereIn('name',$request->permission)->get(); 
                $role_permission->syncPermissions($permissions);
            }
            
            return redirect()->route('admin.role-permission.index')->with('flash_message', 'با موفقیت ثبت شد');        
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Role $role_permission)
    {
        

        try{        
            $role_permission->delete();
            
            return redirect()->route('admin.role-permission.index')->with('flash_message', 'با موفقیت ثبت شد');        
        }catch (\Exception $e){
            return redirect()->back()->with('err_message', 'خطایی رخ داده است، لطفا مجددا تلاش نمایید');
        }
    }
}
