<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function getAll(Request $request) {
        return response()->json([
            'success' => true,
            'mensaje' => 'Obtengo todos los productos desde el controller',
            'data'    => DB::table('product')->get()
        ]);
    }

    public function deleteProduct(Request $request, $id) {
        $product = DB::table('product')->where('id', $id)->first();
        if ( $product === null) {
            return response()->json([
                'success' => false,
                'mensaje' => 'Producto no encontrado',
                'data'    => null
            ], 404);
        }

        DB::table('product')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'mensaje' => 'Producto borrado correctamente',
            'data'    =>  $product
        ]);

    }

    public function getProduct(Request $request, $id) {
        $product = DB::table('product')->where('id', $id)->first();

        return response()->json([
            'success' => true,
            'mensaje' => 'Obtengo un producto desde el controller',
            'data'    =>  $product

        ]);
    }


    public function insert(Request $request) {
        $data = $request->only(['id', 'title', 'description', 'introduction', 'price']);

        $request->validate([
            'id' => 'required',
            'title' =>  'required',
            'descption' => 'required',
            'instroduction' => 'required',
            'price' => 'required',

        ]);

        try {
            DB::table('product')->insert($data);
            return response()->json([
                'success' => true,
                'mensaje' => 'nice',
                'data'    => null
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'mensaje' => $e->getMessage(),
                'data'    => $e->getTraceAsString(),
            ], 500);
        }

    }

}
