<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\petPostRequest;
use App\Pet;
use QRCode;


class petController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::where('status', 'Available')
        ->get();

        return response()->json($pets, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(petPostRequest $request)
    {
        try{

            // dd($request->validated()==true);
        if($request->validated()==true)
        {
              //getPetId
            //   $new_pet_id = Pet::all()->last()->id+1;
        $new_pet_id = Pet::count()+1;
            //   dd($new_pet_id);
 
        $pet = new Pet;
        $pet->name = "PETCODE-".$new_pet_id;
        $pet->age = $request->age;
        $pet->breed = $request->breed;
        $pet->description = $request->description;
     
      
            //uncomment if image mobile can send image to the server
            // $file = $request->pet_image;
            // $extension = $file->getClientOriginalExtension();
            // $filename = time().'.PET_CODE_'.$new_pet_id.'.'.$extension;
            // $pet->image = $filename;
            // $file->move('assets/images/pets', $filename);
          
        //filepath of the qrcode.
        $qrcodeImgName = time().'.PET_ID_'.$new_pet_id.'.png';
        $file = 'assets/images/qrcodes/'.$qrcodeImgName;
         
        $pet->qrcodePath = $qrcodeImgName;
        //generate qrcode
        // $newQrcode = QRCode::text("petshare1.test/pethealth/view/".$new_pet_id)
        $newQrcode = QRCode::text("https://pet-share.com/pethealth/view/".$new_pet_id)
        ->setSize(4)
        ->setMargin(2)
        ->setOutfile($file)
        ->png();

        $file = 'assets/images/qrcodes/api/'.$qrcodeImgName;
        $newQrcode1 = QRCode::text("https://pet-share.com/api/admin/pethealth/view/".$new_pet_id)
        ->setSize(4)
        ->setMargin(2)
        ->setOutfile($file)
        ->png();

       
        
        //check if is generated
        // if($newQrcode){
          //save data to database.
          $pet->save();
        //   return redirect('/pets')->with('toast_success', 'New Data has been Saved');
        return response()->json($pets, 201);
         }
         
        }catch(\Exception $error){
            return response()->json($error, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        // dd($pet);
        return response()->json($pet, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
