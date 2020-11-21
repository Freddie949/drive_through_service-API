<?php

namespace App\Http\Controllers;

use App\Supermarket;
use Illuminate\Http\Request;


class Supermarkets extends Controller
{

    /**
     * @SWG\tags(supermarkets),
     * @SWG\Get(
     *   path="/api/supermarket",
     *   summary="Get all supermarkets",
     *   operationId="supermarket",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     */
    public function index()
    {
        $supermarketList = Supermarket::paginate(10);
        //return response()->json(Supermarket::get(), 200);

        return response()->json($supermarketList, 200);
    }

    // public function supermarketByID($id)
    // {
    //     $supermarket = Supermarket::find($id);

    //     if (is_null($supermarket)) {
    //         return response()->json(["message" => "Record not found!"], 404);
    //     }
    //     return response()->json($supermarket, 200);
    // }


    /**
     * @SWG\tags(supermarkets),
     * @SWG\Post(
     *   path="/api/supermarket",
     *   summary="Post a supermarket",
     *   operationId="supermarket",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="S_Name",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="_Slocation",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="S_Status",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'S_Name' => 'required',
            '_Slocation' => 'required',
            'S_Status' => 'required'
        ]);

        $supermarket = Supermarket::create($request->all());
        return response()->json($supermarket, 201);
    }

    /**
     * @SWG\tags(supermarkets),
     * @SWG\Get(
     *   path="/api/supermarket/{id}",
     *   summary="Get a supermarket",
     *   operationId="supermarket",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     * )
     */
    public function show($id)
    {
        $supermarket = Supermarket::find($id);

        if (is_null($supermarket)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($supermarket, 200);
    }


    /**
     * @SWG\Put(
     *   path="/api/supermarket/{id}",
     *   summary="Edit a supermarket",
     *   operationId="supermarket",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     *      @SWG\Parameter(
     *          name="S_Name",
     *          in="path",
     *          required=false,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="_Slocation",
     *          in="path",
     *          required=false,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="S_Status",
     *          in="path",
     *          required=false,
     *          type="string"
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $supermarket = Supermarket::find($id);
        if (is_null($supermarket)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $supermarket->update($request->all());
        return response()->json($supermarket, 200);
    }


    /**
     * @SWG\Delete(
     *   path="/api/supermarket/{id}",
     *   summary="Delete a supermarket",
     *   operationId="supermarket",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     * )
     */
    public function destroy(Request $request, $id)
    {
        $supermarket = Supermarket::find($id);
        if (is_null($supermarket)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $supermarket->delete();
        return response()->json(["message" => "Record deleted"], 200);
    }
}
