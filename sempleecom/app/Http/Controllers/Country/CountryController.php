<?php

namespace App\Http\Controllers\Country;

use App\API\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function country()
    {
        return response()->json(Country::all(),200);
    }
    public function countryById($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return response()->json('Record Not Found',404);
        }
        return response()->json($country,200);
    }
    public function storecountry(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:8|unique:countries'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400); //Bad Request //Server could not understand the request due to invalid syntax
        }
        $country = Country::create([
            'name' => $request->name
        ]);

        return response()->json($country,201); //201 is for created succefully
    }
    public function countryupdate(Request $request,$id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return response()->json([ "message" => "Record Not Found"],404);
        }
        $data = $request->only([
            'name'
        ]);
        $country->update($data);
        return response()->json($country,200);
    }
    public function destroy($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return response()->json([ "message" => "Record Not Found"],404);
        }
        $country->delete();
        return response()->json(null,204);
    }
}
