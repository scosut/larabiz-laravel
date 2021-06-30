<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Listing;

class ListingsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
      $this->middleware('usersecurity')->only(['edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listings = Listing::orderBy('created_at', 'DESC')->get();
      return view('listings.index')->with('listings', $listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name'    => 'required',
        'email'   => 'email'
      ]);

      if ($validator->fails()) {
        $keys = array_keys($validator->messages()->getMessages());
        return redirect('/listings/create')->with('firstError', $keys[0])->withErrors($validator)->withInput();
      }      

      $listing = new Listing;
      $listing->name = $request->input('name');
      $listing->website = $request->input('website');
      $listing->email = $request->input('email');
      $listing->phone = $request->input('phone');
      $listing->address = $request->input('address');
      $listing->bio = $request->input('bio');
      $listing->user_id = auth()->user()->id;
      $listing->save();

      return redirect('/dashboard')->with('success', 'Listing created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $listing = Listing::find($id);
      return view('listings.show')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $listing = Listing::find($id);
      return view('listings.edit')->with('listing', $listing);
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
      $validator = Validator::make($request->all(), [
        'name'    => 'required',
        'email'   => 'email'
      ]);

      if ($validator->fails()) {
        $keys = array_keys($validator->messages()->getMessages());
        return redirect("/listings/$id/edit")->with('firstError', $keys[0])->withErrors($validator)->withInput();
      }

      $listing = Listing::find($id);
      $listing->name = $request->input('name');
      $listing->website = $request->input('website');
      $listing->email = $request->input('email');
      $listing->phone = $request->input('phone');
      $listing->address = $request->input('address');
      $listing->bio = $request->input('bio');
      $listing->save();

      return redirect('/dashboard')->with('success', 'Listing updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $listing = Listing::find($id);
      $listing->delete();
      return redirect('/dashboard')->with('success', 'Listing removed.');
    }
}
