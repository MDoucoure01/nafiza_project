<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    use ResponseTrait;

    public function CreatePermission(Request $request){
        try {
            $permission = Permission::create([
                'name' => $request->name,
                'guard_name' => "api"
            ]);
            if ($permission) {
                return $this->responseData('Permission Ajouter avec Success',$permission, true);
            }else {
                return $this->responseData('Permission non Ajouter',false, false,'',Response::HTTP_EXPECTATION_FAILED);
            }
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, false, $th->getCode());
        }
    }
}
