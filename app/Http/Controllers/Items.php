<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class Items extends Controller
{
    /**
     * @SWG\Get(
     *   path="/api/item",
     *   summary="Get all items",
     *   operationId="item",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     */
    public function index()
    {
        $itemList = Item::paginate(10);

        return response()->json($itemList, 200);
    }

    /**
     * @SWG\Post(
     *   path="/api/item",
     *   summary="Post a item",
     *   operationId="item",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="I_Name",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="I_Weight",
     *          in="path",
     *          required=true,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="I_Price",
     *          in="path",
     *          required=true,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="supermarket_id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     * )
     */
    public function store(Request $request)
    {

        $request->validate([
            'I_Name' => 'required',
            'I_Weight' => 'required',
            'I_Price' => 'required',
            'supermarket_id' => 'required'
        ]);

        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    /**
     * @SWG\Get(
     *   path="/api/item/{id}",
     *   summary="Get a item",
     *   operationId="item",
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
        $item = Item::find($id);

        if (is_null($item)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($item, 200);
    }

    /**
     * @SWG\Put(
     *   path="/api/item",
     *   summary="Edit a item",
     *   operationId="item",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="I_Name",
     *          in="path",
     *          required=false,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="I_Weight",
     *          in="path",
     *          required=false,
     *          type="string"
     *      ),
     *      @SWG\Parameter(
     *          name="I_Price",
     *          in="path",
     *          required=false,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="supermarket_id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $item->update($request->all());
        return response()->json($item, 200);
    }

    /**
     * @SWG\Delete(
     *   path="/api/item/{id}",
     *   summary="Delete a item",
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
    public function destroy($id)
    {
        $item = Item::find($id);
        if (is_null($item)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $item->delete();
        return response()->json(["message" => "Record deleted"], 200);
    }
}
