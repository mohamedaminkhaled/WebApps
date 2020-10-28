<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Destination;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all()->take(6);
        $destinations = Destination::all()->take(6);
        
        return view('index')->with('allPlaces', $places)
                            ->with('destinations', $destinations);
    }
    
    public function about()
    {
        return view('about');
    }
    
    public function blog()
    {
        return view('blog');
    }
    
    public function single_blog()
    {
        return view('single-blog');
    }
    
    public function travel_destination()
    {
        return view('travel_destination');
    }
    
    public function contact()
    {
        return view('contact');
    }
    
    //public function destination_details()
    //{        
    //    return view('destination_details');
    //}
    
    public function elements()
    {
        return view('elements');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=>'mimes:jpeg,jpg,png,JPEG | max:2000'
        ]);
        
        if ($request->has('form-add-distination')) {
            if($request->hasFile('image')){
                $fileNameWithExtension = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameStore = $fileName.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/storage/destinations_images',$fileNameStore);
            }else{
                $fileNameStore = 'noimage.jpg';
            }
        
            $dest = new Destination();
            $dest->name = $request->input('name');
            $dest->image = $fileNameStore;
            $dest->save();
            
            return redirect()->back();
        }
        
        if ($request->has('forma-add-place')) {
            if($request->hasFile('image')){
                $fileNameWithExtension = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameStore = $fileName.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/storage/places_images',$fileNameStore);
            }else{
                $fileNameStore = 'noimage.jpg';
            }
            
            $place = new Place();
            $place->name = $request->input('name');
            $place->destination_id = $request->input('destination_id');
            $place->image = $fileNameStore;
            $place->save();
            
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $place = Place::find($id);
        
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=". $place->price .
                    "&currency=EUR" .
                    "&paymentType=DB";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        
        $jsonResponse = json_decode($responseData);
        $checkoutId = $jsonResponse->{'id'};
        
        if($request->has('id') && $request->has('resourcePath')){
            $paymentStatus = "success";
        }else if(!$request->has('id') && !$request->has('resourcePath')){
            $paymentStatus = "";
        }else{
            $paymentStatus = "failed";
        }
        
        
        
        return view('destination_details')->with('place', $place)
                                          ->with('response', $checkoutId)
                                          ->with('status', $paymentStatus);
    }
    
    private function getPaymentStatus($id, $resourcePath){
        $url = "https://test.oppwa.com/";
        $url .= $resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                       'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
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
