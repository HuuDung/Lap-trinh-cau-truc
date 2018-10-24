<?php

namespace App\Http\Controllers\Admin;

use App\AdministrationMember;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberAdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdministrationMember $administrationMember
     * @return \Illuminate\Http\Response
     */
    public function show(AdministrationMember $administrationMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdministrationMember $administrationMember
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministrationMember $administrationMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\AdministrationMember $administrationMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdministrationMember $administrationMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdministrationMember $administrationMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministrationMember $administrationMember)
    {
        //
    }

    public function listMember()
    {
        $user = User::all();
        dd($user);
    }
}
