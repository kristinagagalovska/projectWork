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

//<html>
//<head>
//<h1> stripe - view </h1>
//</head>
//<body>
//<h1>Buy mu book for 25$.</h1>
//
//<form action="{{route('purchases')}}" method="POST">
//    {{ csrf_field() }}
//    <script
//            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
//            data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
//            data-amount="2500"
//            data-name="Some Book"
//            data-description="This will give you everything you need to get started."
//            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
//            data-locale="auto"
//            data-zip-code="true">
//    </script>
//</form>
//</body>
//</html>

        return view('admin/stripe');
    }

    public function store() {
        dd(request()->all());
    }
}