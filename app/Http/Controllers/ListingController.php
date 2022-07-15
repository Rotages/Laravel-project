<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class ListingController extends Controller
{
    //All listings
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }
    //Single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Create Form

    public function create(){
        return view('listings.create', [
        ]);
    }

    //Store
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'nullable',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();
        Listing::create($formFields);

        Session::flash('message', 'Post created succesfully!!!!!');

        return redirect('/');  
    }
    //Edit
    public function edit(Listing $listing){
        return view('listings.edit', ['listing' => $listing]);
    }
    //Update
    public function update(Request $request, Listing $listing){

        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'website' => 'nullable',
            'description' => 'required',
            'company' => 'required',
            'location' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);

        Session::flash('message', 'Post updated succesfully!!!!!');

        return redirect('/');  
    }

    //Delete
    public function destroy(Listing $listing){
        //Make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        Session::flash('message', 'Post deleted succesfully!!!!!');
        return redirect('/');
    }

    //Manage
    public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}