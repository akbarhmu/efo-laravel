<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function pemilu()
    {
        return view('pemilu');
    }

    public function tujuanPemilu()
    {
        return view('tujuan');
    }

    public function dataDiri()
    {
        return view('data-diri');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail(auth()->user()->id);
            $user->update($request->validated());
            DB::commit();
            $data = [
                'enabled' => true,
                'title' => 'Berhasil!',
                'text' => 'Data diri berhasil diperbarui',
                'icon' => 'success',
            ];
            Session::flash('swal', $data);

            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Data diri gagal diperbarui',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return redirect()->back();
        }
    }
}
