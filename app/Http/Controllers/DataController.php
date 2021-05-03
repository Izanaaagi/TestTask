<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {

        $query = (new Data)->newQuery();
        foreach ($request->all() as $key => $value) {
            switch ($key) {
                case 'name':
                    $query->where($key, 'like', "%{$value}%");
                    break;
                case 'offset':
                    $query->where('price', '>', $value);
                    break;
                case 'limit':
                    $query->where('price', '<', $value);
                    break;
                default:
                    $query->where($key, $value);
            }
        }

        $query = $query->get();

        return response()->json(['input' => $query]);
    }

}
