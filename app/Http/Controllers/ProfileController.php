<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\User;
use Intervention\Image\Facades\Image;
use File;

class ProfileController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;

        $postCount = Cache::remember(
            'count.posts' .$user->id,
            now()->addSeconds(30),
            function () use($user) {
                return $user->posts()->count();
            });
        $followersCount = Cache::remember(
            'count.followers' .$user->id,
            now()->addSeconds(30),
            function () use($user) {
                return $user->posts()->count();
            });
        $followingCount = Cache::remember(
            'count.following' .$user->id,
            now()->addSeconds(30),
            function () use($user) {
                return $user->following->count();
            });
        
        return view('profiles.index',compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        
        return view('profiles.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update( User $user)
    {
        $this->authorize('update',$user->profile);
        
        $data = request()->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'url' => 'URL',
            'image' => '',
        ]);

        if($img = request('image')){
            
            if(\File::exists('storage/app/public/'. $user->profile->image)){
                \File::delete('storage/app/public/'. $user->profile->image);
              }
            $imagePath = $img->store('profile','public' );
            $image = Image::make(storage_path('app/public/'.$imagePath))->fit(500,500);
            $image->save();
            
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imagePath]
        ));
        
        return Redirect()->route('profile.show',compact('user'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}