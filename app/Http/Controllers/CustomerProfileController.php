<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\User;
use App\SocialMediaType;
use App\MessengerType;
use Illuminate\Validation\Rule;

class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {
        if($request->ajax() && $request->title == 'reloadImageListContainer') {
            $images = Image::where('user_id', $user->id)->get();
            return view('admin_customer.profile.partial._profile_image',compact('images'))->render();
        }

        $messengers = MessengerType::where('slug', '=', 'kakaotalkid')->orWhere('slug', '=', 'lineid')->orderBy('id', 'asc')->get();
        $socialmedias = SocialMediaType::where('slug', '<>', 'youtube')->orderBy('id', 'asc')->get();
        $images = Image::where('user_id', $user->id)->get();
        return view('admin_customer.profile.index', compact('images', 'user', 'socialmedias', 'messengers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'address' => 'nullable|string|min:2',
            'birthday' => 'required|date',
            'whatsapp' => 'required|string',
            'profileImageId' => 'nullable|integer',
            'socialmedia.*' => 'nullable|string',
            'messenger.*' => 'nullable|string',
        ]);
    }
}
