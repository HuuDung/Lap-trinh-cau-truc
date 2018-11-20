<?php

namespace App\Http\Controllers\Admin;

use App\AdministrationMember;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberAdministrationController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $data = [
            'users' => $users,
            'title' => "Member Administration",
        ];
        return view('admin.member-administration.index', $data);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $data=[
            'user' => $user,
            'title' => "Show user",
        ];
        return view('admin.member-administration.show', $data);
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data=[
            'user' => $user,
            'title' => "Edit user",
        ];
        return view('admin.member-administration.edit', $data);
    }
    public function update(Request $request, $id)
    {
        //
        $user =User::findOrFail($id);
        $user->update([
           'level' => $request->level,
           'admin' => $request->account,
        ]);
        $user->save();
        return redirect()->route('admin.member.show', $user->id);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.member.index');
    }
}
