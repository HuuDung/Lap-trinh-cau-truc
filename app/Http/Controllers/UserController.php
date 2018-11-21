<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $data = [
            'user' => $user,
            'title' => "Profile",
        ];
        return view('users.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $data = [
            'user' => $user,
            'title' => "Edit Profile",
        ];
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            Image::make($avatar)->resize(150, 150)->save(public_path('/storage/user/' . $user->id . '.' .
                $avatar->getClientOriginalExtension()));
            $avatarUrl = 'user/' . $user->id . '.' . $avatar->getClientOriginalExtension();
            $user->update([
                'avatar' => $avatarUrl,
            ]);
        }
        if ($request->birthday != null) {
            $user->update([
                'birthday' => $request->birthday,
            ]);
        }
        $user->update([
            'gender' => $request->gender,
            'name' => $request->name,
            'location' => $request->location,
            'notes' => $request->notes,
        ]);
        $user->save();
        $data = [
            'user' => $user,
            'title' => "Profile"
        ];
        return view('users.index', $data);
    }
}
