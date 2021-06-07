<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function apiGetAllProperties()
    {
        return Property::all();
    }

    public function apiStore(Request $request)
    {

        $property = new Property();
        $property->price = $request->price;
        $property->description = $request->description;
        $property->locationDescription = $request->locationDescription;

      $property->showPrice = $request->showPrice;

        $property->roomsNumber = $request->roomsNumber;
        $property->accepted = 0;
        $property->userId = $request->creatorId;
        $property->categoryId = $request->categoryId;
        $property->typeId = $request->listingTypeId;
        $property->contactInfo = $request->contactInfo;
        // Handle File Upload
        if ($request->hasFile('images')) {

            $Name = time() . '.' . $request->image->getClientOriginalExtension();

            $destinationPath = public_path('storage/properties_images/');
            $img = Image::make($request->image->getRealPath());
            $img->resize(650, 650, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . time() . $request->image->getClientOriginalName());

            $fileNameToStore = time() . $request->image->getClientOriginalName();

            $property->image = $fileNameToStore;
        }
        $property->save();

        return response()->json([
            $property
        ], 202);
    }
}
