<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /*
        Set up auth for all the methods below -_-
    */
    public function __construct()
    {
        $this->middleware('auth')->except(['login']);
    }

    /**
     * Signs In The User.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
    }

    /**
     * Signs In The User.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
    }

    /**
     * Signs In The User.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        //
    }
}
