<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|numeric|digits:16|unique:users',
            'email' => 'required|email|unique:users',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:user,admin',
            'address' => 'nullable|string|max:255',
            'tps_address' => 'nullable|string|max:255',
            'tps_number' => 'nullable|numeric',
        ]);

        DB::beginTransaction();

        try {
            $user = new User();
            $user->name = $request->name;
            $user->nik = $request->nik;
            $user->email = $request->email;
            $user->email_verified_at = Carbon::now();
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->address = $request->address;
            $user->tps_address = $request->tps_address;
            $user->tps_number = $request->tps_number;
            $user->save();

            DB::commit();

            $data = [
                'enabled' => true,
                'title' => 'Berhasil!',
                'text' => 'Pengguna berhasil ditambahkan',
                'icon' => 'success',
            ];
            Session::flash('swal', $data);

            return redirect()->route('admin.dashboard.users.index');
        } catch (Exception $e) {
            DB::rollBack();

            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Pengguna gagal ditambahkan',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'nik' => 'required|numeric|digits:16|unique:users,nik,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'birth_date' => 'required|date',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'password' => 'nullable|confirmed|min:8',
            'role' => 'required|in:user,admin',
            'address' => 'nullable|string|max:255',
            'tps_address' => 'nullable|string|max:255',
            'tps_number' => 'nullable|numeric',
        ]);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->nik = $request->nik;
            $user->email = $request->email;
            $user->email_verified_at = Carbon::now();
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            if ($request->password && $request->password != '') {
                $user->password = Hash::make($request->password);
            }
            $user->role = $request->role;
            $user->address = $request->address;
            $user->tps_address = $request->tps_address;
            $user->tps_number = $request->tps_number;
            $user->save();

            DB::commit();

            $data = [
                'enabled' => true,
                'title' => 'Berhasil!',
                'text' => 'Pengguna berhasil diperbarui',
                'icon' => 'success',
            ];
            Session::flash('swal', $data);

            return redirect()->route('admin.dashboard.users.index');
        } catch (Exception $e) {
            DB::rollBack();

            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Pengguna gagal diperbarui',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            $user->delete();
            DB::commit();

            $data = [
                'enabled' => true,
                'title' => 'Berhasil!',
                'text' => 'Pengguna berhasil dihapus',
                'icon' => 'success',
            ];
            Session::flash('swal', $data);

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();

            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Pengguna gagal dihapus',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return redirect()->back();
        }
    }
}
