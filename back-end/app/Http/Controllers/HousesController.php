<?php

namespace App\Http\Controllers;

// gets the objects model to use in the function
use App\Models\Objects;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HousesController extends Controller
{
    function get()
    {
        // get all objects
        $houses = Objects::get();
        // returns it in json format
        return response()->json($houses);
    }


    function createHouse(Request $req)
    {
        // validates the values from the request
        $validator = Validator::make($req->all(), [
            'street' => 'required|min:3',
            'place' => 'required|min:3',
            'zipcode' => 'required|min:3',
            'region' => 'required|min:3',
            'housenumber' => 'required|integer',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'placement' => 'required',
            'surface' => 'required',
            'price' => 'required|integer',
        ]);
        // if the validator fails return 400 bad request
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 400);
        }
        // create object after validation
        Objects::create([
            'street' => $req->street,
            'place' => $req->place,
            'zipcode' => $req->zipcode,
            'region' => $req->region,
            'housenumber' => $req->housenumber,
            'rooms' => $req->rooms,
            'bedrooms' => $req->bedrooms,
            'building_date' => $req->building_date,
            'placement' => $req->placement,
            'surface' => $req->surface,
            'type' => $req->type,
            'date' => $req->date,
            'sold' => $req->sold,
            'price' => $req->price,
        ]);
        // return json message
        return response()->json('Succesfully created a new object');
    }

    function delete($id)
    {
        // gets id from the route and uses the variable to delete the object

        // gets the object by id
        $house = Objects::find($id);
        $house->delete();
        return response()->json('deleted');
    }

    function getHouse($id)
    {
        // gets id from the route and uses the variable to get the object and returns the object
        $house = Objects::find($id);
        return response()->json($house);
    }

    function editHouse(Request $req, $id)
    {
        // this checks the values of the object and checks if it is valid
        $validator = Validator::make($req->all(), [
            'street' => 'required|min:3',
            'place' => 'required|min:3',
            'zipcode' => 'required|min:3',
            'region' => 'required|min:3',
            'housenumber' => 'required|integer',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'placement' => 'required',
            'surface' => 'required',
            'price' => 'required|integer',
        ]);

        // if the validator fails return 400 bad request
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 400);
        }

        // gets the object by id and updates the values
        Objects::find($id)
            ->update([
                'street' => $req->street,
                'place' => $req->place,
                'zipcode' => $req->zipcode,
                'region' => $req->region,
                'housenumber' => $req->housenumber,
                'rooms' => $req->rooms,
                'bedrooms' => $req->bedrooms,
                'building_date' => $req->building_date,
                'placement' => $req->placement,
                'surface' => $req->surface,
                'type' => $req->type,
                'date' => $req->date,
                'sold' => $req->sold,
                'price' => $req->price,
            ]);
        return response()->json('it worked');
    }
}
