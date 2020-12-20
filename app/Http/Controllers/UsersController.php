<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function edit()
    {
        return view('users.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'about' => $request->about
        ]);

        session()->flash('success', 'User profile updated successfully');

        return redirect()->back();
        
    }

    public function makeAdmin(User $user)
    {
        /**$user->update([ WHY DOES THIS NOT WORK ? I WILL LOOK AT IT LATER.
            'role' => 'admin'
        ]);**/

        $user->role = 'admin';

        $user->save();

        session()->flash('success', 'User is now an Admin');

        return redirect(route('users.index'));
    }


    public function makeWriter(User $user)
    {
         /**$user->update([ WHY DOES THIS NOT WORK ? I WILL LOOK AT IT LATER.
            'role' => 'writer'
        ]);**/

        $user->role = 'writer';

        $user->save();

        session()->flash('success', 'User is now a Writer');

        return redirect(route('users.index'));
    }

}
