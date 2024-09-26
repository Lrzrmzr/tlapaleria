<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return response()->json([$proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:255',
            'empresa' => 'required|string|min:1|max:255',
            'telefono' => 'required|string|min:1|max:15'
        ];

        $validator = Validator::make($request->input(), $rules);
        if($validator->fails()){
            return response()->json([
            'status' => false,
            'errors' => $validator->errors()->all()
            ], 400);
        }
        $proveedor = new Proveedor($request->input());
        $proveedor->save();

        return response()->json([
            'status' => true,
            'message' => 'Proveedor creado satisfactoriamente'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
