<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
      return view('pages._penggunabaru');
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);

      return view('pages._editpengguna', compact('user'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
      ]);

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      if (!empty($request->role))
        $user->role = $request->role;
      if (!empty($request->avatar))
        $user->avatar = $request->avatar;
      $user->save();

      return response(['status' => 'success', 'message' => $user->name.' berhasil ditambahkan.']);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'email'       => 'required|email|max:255',
        'password_confirm' => 'required_with:password|same:password'
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      if (!empty($request->password))
        $user->password = bcrypt($request->password);
      if (!empty($request->role))
        $user->role = $request->role;
      if (!empty($request->avatar))
        $user->avatar = $request->avatar;
      $user->update();

      return response(['status' => 'success', 'message' => $user->name.' berhasil perbarui.']);
    }

    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->delete();

      return response(['status' => 'success', 'message' => $user->name.' berhasil dihapus.']);
    }

    public function fileUpload(Request $request)
    {
      $this->validate($request, [
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      $image = $request->file('foto');
      $fileName = time().'-'.md5(\Auth::user()->name).'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $image->move($destinationPath, $fileName);

      return response(['filename' => $fileName, 'status' => 'success', 'message' => $fileName.' berhasil diunggah.']);
    }
}
