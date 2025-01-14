<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth as Con;
use Illuminate\Http\Request;

class auth extends Controller
{
    public function logout()
    {
        Con::logout();

        return redirect('login');
    }
}
