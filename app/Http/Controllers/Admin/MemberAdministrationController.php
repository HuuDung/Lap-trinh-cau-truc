<?php

namespace App\Http\Controllers\Admin;

use App\AdministrationMember;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberAdministrationController extends Controller
{
    public function listMember()
    {
        $users = User::paginate(5);
        $data = [
            'users' => $users,
        ];
        return view('admin.member-administration.index', $data);
    }
}