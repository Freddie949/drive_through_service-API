<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class Transactions extends Controller
{
    public function index()
    {
        $supermarketList = Transaction::paginate(1);
        //return response()->json(Supermarket::get(), 200);

        return response()->json($supermarketList, 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'S_Name' => 'required',
            '_Slocation' => 'required',
            'S_Status' => 'required'
        ]);

        $supermarket = Transaction::create($request->all());
        return response()->json($supermarket, 201);
    }

    public function show($id)
    {
        $supermarket = Transaction::find($id);

        if (is_null($supermarket)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($supermarket, 200);
    }

    public function update(Request $request, $id)
    {
        $supermarket = Transaction::find($id);
        if (is_null($supermarket)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $supermarket->update($request->all());
        return response()->json($supermarket, 200);
    }

    public function destroy(Request $request, Transaction $id)
    {
        $supermarket = Transaction::find($id);
        if (is_null($supermarket)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $supermarket->delete();
        return response()->json(null, 204);
    }
}
