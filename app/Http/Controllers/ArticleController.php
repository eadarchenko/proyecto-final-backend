<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function getAll(Request $request) {
        return response()->json([
            'success' => true,
            'mensaje' => 'Obtengo todos los articulos desde el controller',
            'data'    => DB::table('article')->get()
        ]);
    }

    public function deleteArticle(Request $request, $id) {
        $article = DB::table('article')->where('id', $id)->first();
        if ( $article === null) {
            return response()->json([
                'success' => false,
                'mensaje' => 'Articulo no encontrado',
                'data'    => null
            ], 404);
        }

        DB::table('article')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'mensaje' => 'Articulo borrado correctamente',
            'data'    =>  $article
        ]);

    }

    public function getArticle(Request $request, $id) {
        $article = DB::table('article')->where('id', $id)->first();

        return response()->json([
            'success' => true,
            'mensaje' => 'Obtengo un articulo desde el controller',
            'data'    =>  $article

        ]);
    }


    public function insert(Request $request) {
        $data = $request->only(['id', 'title', 'photo', 'content']);

        $request->validate([
            'id' => 'required',
            'title' =>  'required',
            'photo' => 'required',
            'content' => 'required',


        ]);

        try {
            DB::table('article')->insert($data);
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
