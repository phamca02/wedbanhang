<?php

namespace App\Http\Controllers;

use App\Models\order_detail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('crud_user.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
        
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    public function chitiethoadon(Request $request)
{
    $orders = order_detail::select('products.name as product_name', 'products.id as product_id', 'products.price')
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->where('order_details.order_id', $request->get('order_id'))
        ->get();


    return view('crud_user.orderdetail', compact('orders'));
}

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

       $user = User::find($input['id']);

       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser()
    {
        if (Auth::check()) {
            // $users = User::select('users.id', 'users.name', 'users.email', 'roles.role_name') // Chọn các trường cần thiết
            //     ->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id') // Kết nối với bảng user_roles
            //     ->leftJoin('roles', 'user_roles.role_id', '=', 'roles.id') // Kết nối với bảng roles
            //     ->get();

            $users = User::select('users.*', 'orders.order_name as order_name', 'orders.id as order_id')
            ->join('orders', 'orders.user_id', '=', 'users.id')
            ->get();
    
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}