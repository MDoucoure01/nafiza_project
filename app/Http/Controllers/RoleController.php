<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\RoleRequest;
use App\Http\Resources\Roles\RoleResource;
use App\Models\Role;
use App\Services\ExistUser;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return DB::transaction(function () {
                return $this->responseData("Tous les Languages", true, Response::HTTP_OK, RoleResource::collection(Role::all()));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                /**
                 * @var ExistUser $element
                 */
                $element = new ExistUser();
                $roleExist = $element->elementExist(Role::class, "name", $request->name);
                if ($roleExist) {
                    return $this->responseData("Le role exist déja", false, Response::HTTP_CONFLICT, RoleResource::make($roleExist));
                }
                $language = Role::create([
                    "name" => ucfirst($request->name)
                ]);
                return $this->responseData("Role enregistré avec success", true, Response::HTTP_OK, RoleResource::make($language));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        try {
            return DB::transaction(function () use ($role){
                return $this->responseData("Affichage du role avec success", true, Response::HTTP_OK, RoleResource::make($role));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            return DB::transaction(function () use ($role) {
                $role->delete();
                return $this->responseData("suppression reussi", true, Response::HTTP_OK, RoleResource::make($role));
            });
        } catch (\Throwable $th) {
            return $this->responseData($th->getMessage(), false, Response::HTTP_BAD_REQUEST, null);
        }
    }
}
