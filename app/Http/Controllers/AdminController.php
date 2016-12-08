<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class AdminController extends Controller {

    public function index() {
        return view('admin/index');
    }

    public function allUsers() {

        $users =  User::where('position', '<>', 1)->get();

        return view('admin/allUsers', compact('users'));
    }

    public function setPosition(Request $request) {
        $id = $request->get('id');
        $position = $request->get('position');

        $user = User::find($id);
        $user->position = $position;
        $user->save();

        return redirect()->route('allUsers');
    }

    public function stripe() {
        return view('admin/stripe');
    }

    public function store() {
        dd(request()->all());
    }
}