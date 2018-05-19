<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'asc')->paginate(15);
        return view('admin.usermanagement.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usermanagement.permission.create');
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
            'name' => 'required|string|max:255|min:2',
            'displayName' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
        ]);

        $permission = Permission::addNewPermission($request);

        return redirect()->route('permission.index')->with('flashmessage', 'New permission was created successfully!');
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
    public function edit(Permission $permission)
    {
        return view('admin.usermanagement.permission.edit', compact('permission'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'min:2', Rule::unique('permissions')->ignore($permission->id)],
            'displayName' => 'required|string|min:2|max:255',
            'description' => 'required|string|min:2',
        ]);

        $permission->name = $request->name;
        $permission->display_name = $request->displayName;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('permission.index')->with('flashmessage', 'Permission was edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permission.index')->with('flashmessage', 'Permission was deleted successfully!');
    }
}
