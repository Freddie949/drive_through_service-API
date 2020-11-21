<?php

namespace App\Http\Controllers;

require __DIR__ . '/../../../vendor/autoload.php';

use Twilio\Rest\Client as twilioClient;
use App\Order;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class Orders extends Controller
{

    /**
     * @SWG\Get(
     *   path="/api/order",
     *   summary="Get all orders",
     *   operationId="order",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     * )
     */
    public function index()
    {
        $orderList = Order::paginate(10);

        return response()->json($orderList, 200);
    }

    /**
     * @SWG\Post(
     *   path="/api/order",
     *   summary="Post a order",
     *   operationId="order",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="Discount",
     *          in="path",
     *          required=false,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="Total_Amount",
     *          in="path",
     *          required=true,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="Latitude",
     *          in="path",
     *          required=true,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="Longitude",
     *          in="path",
     *          required=true,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="user_id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     * )
     */
    public function store(Request $request)
    {

        $request->validate([
            'Discount' => 'required',
            //'Total_Amount' => 'required',
            'Latitude' => 'required',
            'Longitude' => 'required',
            'user_id' => 'required'
        ]);

        $client = new Client();

        $getInfor = $client->get('https://reverse.geocoder.api.here.com/6.2/reversegeocode.json?prox=' . $request->Latitude . ',' . $request->Longitude . '&mode=retrieveAddresses&maxresults=1&gen=9&app_id=yEH23qww2tKZ7awpwpeh&app_code=xMztBrti-HRIik08UHUYFA');
        $response = $getInfor->getBody()->getContents();

        $address = explode('Address', $response);
        $additionaldata = explode('AdditionalData', $address[1]);
        $location = explode('{', $additionaldata[0]);
        $location_name_Label = explode('"Label":"', $location[1]);
        $location_name_Country = explode(',"Country"', $location_name_Label[1]);
        $Pick_up_point = explode('""', $location_name_Country[0]);

        //$Pick_up_point
        //dd($Pick_up_point);
        //$order = Order::create($request->all());
        $order = new Order;

        $order->Discount = $request->Discount;
        $order->Total_Amount = $request->Total_Amount;
        $order->Latitude = $request->Latitude;
        $order->Longitude = $request->Longitude;
        $order->Pick_up_point = $Pick_up_point[0];
        $order->user_id = $request->user_id;
        $order->created_at = now();

        $order->save();


        $account_sid = 'ACfc22839e9e6503305ffb36885681cd33';
        $auth_token = 'a1c4e24c424514d216d8fbdc624e9235';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        // A Twilio number you own with SMS capabilities
        $twilio_number = "+17609068483";

        $client = new twilioClient($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            '+27762155302',
            array(
                'from' => $twilio_number,
                'body' => 'Your order has been placed. Your order Number is:' . $order->id
            )
        );

        return response()->json($order, 201);
    }

    /**
     * @SWG\Get(
     *   path="/api/order/{id}",
     *   summary="Get a order",
     *   operationId="order",
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
        $order = Order::find($id);

        if (is_null($order)) {
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($order, 200);
    }

    /**
     * @SWG\Put(
     *   path="/api/order/{id}",
     *   summary="Edit a order",
     *   operationId="order",
     *   @SWG\Response(response=200, description="successful operation"),   
     *   @SWG\Response(response=404, description="not found"),
     *   @SWG\Response(response=500, description="internal server error"),
     *      @SWG\Parameter(
     *          name="Discount",
     *          in="path",
     *          required=false,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="Total_Amount",
     *          in="path",
     *          required=false,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="Latitude",
     *          in="path",
     *          required=false,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="Longitude",
     *          in="path",
     *          required=false,
     *          type="number"
     *      ),
     *      @SWG\Parameter(
     *          name="user_id",
     *          in="path",
     *          required=true,
     *          type="integer"
     *      ),
     * )
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $order->update($request->all());
        return response()->json($order, 200);
    }


    /**
     * @SWG\Delete(
     *   path="/api/order/{id}",
     *   summary="Delete a order",
     *   operationId="order",
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
        $order = Order::find($id);
        if (is_null($order)) {
            return response()->json(["message" => "Record not found!"], 404);
        }

        $order->delete();
        return response()->json(["message" => "Record deleted"], 200);
    }
}
