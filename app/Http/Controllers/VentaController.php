<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all();
        return response()->json($ventas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'total' => 'required|string|min:1'
        ];
        $validator = Validator::make($request->input(),$rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
    
        $venta = new Venta($request->input());
        $venta->save();

        return response()->json([
            'status' => true,
            'message' => 'Venta creada Exitosamente'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        return response()->json([
            'status' => true,
            'data' =>$venta
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $rules = [
            'total' => 'required|string|min:1'
        ];

        $validator = Validator::make($request->input(),$rules);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        $venta->update($request->input());

        return response()->json([
            'status' => true,
            'data' => 'Venta actualizada exitosamente'
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return response()->json([
            'status' => true,
            'message' => 'Venta eliminada exitosamente'
        ], 200);
    }
}
