<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use ResponseTrait;

    public function CreateRole(Request $request){
        try {
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => "api"
            ]);
            if ($role) {
                return $this->responseData('Role Ajouter avec Success',$role, true);
            }else {
                return $this->responseData('Role non Ajouter',false, false, null,Response::HTTP_EXPECTATION_FAILED);
            }
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, false, $th->getCode());
        }
    }


    public function attributePermissionToARole(Request $request){
        try {
            $role = Role::find($request->id);
            $role->syncPermissions($request->permissions);
            if ($role) {
                return $this->responseData('Permission attribues avec Success',$role->permissions, true);
            }else {
                return $this->responseData('Permission non attribues',false, false, null,Response::HTTP_EXPECTATION_FAILED);
            }
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, false, $th->getCode());
        }
    }

}
