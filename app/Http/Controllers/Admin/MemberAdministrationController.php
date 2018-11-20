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
}
