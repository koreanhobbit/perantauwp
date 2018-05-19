<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->paginate(10);
        return view('admin.usermanagement.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('id', 'asc')->get();
        return view('admin.usermanagement.role.create', compact('permissions'));
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
            'name' => 'required|string|min:2|max:255|unique:roles,name',
            'displayName' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
        ]);

        $role = Role::addNewRole($request);

        foreach(Permission::get() as $permission) {
            foreach($request->permission as $item) {
                if($permission->id == $item ) {
                    $role->permissions()->attach($permission);
                }
            }
        }

        return redirect()->route('role.index')->with('flashmessage', 'Role was created successfully!');
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
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('id', 'asc')->get();
        return view('admin.usermanagement.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('roles')->ignore($role->id)],
            'displayName' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
        ]);

        $role->name = $request->name;
        $role->display_name = $request->displayName;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->detach();

        foreach(Permission::get() as $permission) {
            foreach($request->permission as $item) {
                if($permission->id == $item ) {
                    $role->permissions()->attach($permission);
                }
            }
        }

        return redirect()->route('role.index')->with('flashmessage', 'Role was successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect()->route('role.index')->with('flashmessage', 'Role was successfully deleted!');
    }
}
