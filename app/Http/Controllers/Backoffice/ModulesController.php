<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ModulesController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'string|max:225',
        ]);

        $module = new Module();
        $module->name = $request->name;
        $module->slug = Str::slug($request->name);
        $module->start_date = $request->start_date;
        $module->end_date = $request->end_date;
        $module->description = $request->description;
        $module->save();

        toastr()->success('Module créé avec succès !');
        return back();
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
            'description' => 'string|max:225',
        ]);

        $module = Module::findOrFail($request->id);
        $module->name = $request->name;
        $module->slug = Str::slug($request->name);
        $module->description = $request->description;
        $module->save();

        toastr()->success('Module modifié avec succès !');
        return back();
    }

    public function delete(Request $request)
    {
        $module = Module::findOrFail($request->id);
        $module->delete();

        toastr()->error('Module supprimé avec succès !');
        return back();
    }
}
