<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detail;

class DetailControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    try {
        $detail = Detail::all();

        return response()->json(['detalles' => $detail]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error al obtener los detalles'], 500);
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'product_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $detalle = new Detail();
        $detalle->pedido_id = $request->input('pedido_id');
        $detalle->producto_id = $request->input('producto_id');
        $detalle->cantidad = $request->input('cantidad');

        $detalle->save();

        return response()->json(['message' => 'Detalle creado exitosamente.', 'detalle' => $detalle], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    try {
        $detail = Detail::findOrFail($id);
        return response()->json($detail);
    } catch (\Exception $e) {
        return response()->json(['error' => 'El detalle no existe'], 404);
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    try {
        $detail = Detail::find($id);

        if (!$detail) {
            return response()->json(['error' => 'El detalle no existe'], 404);
        }

        // Aquí puedes realizar cualquier operación adicional necesaria antes de retornar la respuesta

        return response()->json($detail);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error al obtener el detalle'], 500);
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $detail = Detail::find($id);

        if (!$detail) {
            return response()->json(['error' => 'El detalle no existe'], 404);
        }

        // Valida los datos enviados en la solicitud
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Actualiza los datos del detalle
        $detail->producto_id = $request->input('producto_id');
        $detail->cantidad = $request->input('cantidad');
        $detail->save();

        // Aquí puedes realizar cualquier operación adicional necesaria antes de retornar la respuesta

        return response()->json(['message' => 'Detalle actualizado correctamente', 'detalle' => $detail]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocurrió un error al actualizar el detalle'], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $detail)
    {
        // Eliminar el detalle de la base de datos
        $detail->delete();

        // Devolver una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'Detalle eliminado correctamente']);
    }
}
