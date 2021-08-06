<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                if (!Auth::user()->hasVerifiedEmail()) {
                    Auth::logout();
                    return back()->with('error', 'Please verify your email address first');
                }

                if (Auth::user()->user_type == 1) {
                    return redirect()->route('admin.property.index')->with('success', 'Logged in Successfully');
                } else {
                    return redirect()->route('home')->with('success', 'Logged in Successfully');
                }
            }
            return back()->with('error', 'Incorrect credentials');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logged out Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function registerPage(Request $request)
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = $request->validated();
            $userData = User::create($user);
            return back()->with('success', 'User registered Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function verify(Request $request, $id)
    {
        try {
            $id = \Crypt::decryptString($id);
            User::findOrFail($id)->update(['email_verified_at' => \Carbon\Carbon::now()]);
            return redirect()->route('login')->with('success', 'Account verified Successfully');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to verify account');
        }
    }

    public function profile(ProfileRequest $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $data = $request->validated();
            if ($request->hasFile('image')) {
                if (!empty($user->image)) {
                    unlink(storage_path('app/public/avatar/') . $user->image);
                }
                $image = \Str::random(4) . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $path = \Storage::putFileAs(
                    'public/avatar', $request->file('image'), $image
                );
                $data['image'] = $image;
            }
            $user->update($data);
            if (Auth::user()->user_type == 1) {
                return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
            } else {
                return redirect()->route('home')->with('success', 'Profile updated successfully');
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            if (!\Hash::check($request->old_password, $user->password)) {
                return back()->with('error', 'Old password is incorrect');
            }
            $user->update(['password' => $request->password]);

            if (Auth::user()->user_type == 1) {
                return back()->with('success', 'Password changed successfully');
            } else {
                return redirect()->route('home')->with('success', 'Password changed successfully');
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function userProfile()
    {
        return view('profile');
    }

    public function userChangePassword()
    {
        return view('change_password');
    }
}
