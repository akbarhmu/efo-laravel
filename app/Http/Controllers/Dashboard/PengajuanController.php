<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    public function getFile($filename)
    {
        $filepath = 'files/'.$filename;
        if (!Storage::exists($filepath)) {
            abort(404);
        }

        return Storage::download($filepath);
    }

    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('dashboard.pengajuan.index', compact('pengajuans'));
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('dashboard.pengajuan.edit', compact('pengajuan'));
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'tps_address' => 'required|string',
            'tps_number' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $pengajuan = Pengajuan::findOrFail($id);
            $pengajuan->status = 'approved';
            $pengajuan->save();

            $user = User::findOrFail($pengajuan->user_id);
            $user->tps_address = $request->tps_address;
            $user->tps_number = $request->tps_number;
            $user->save();

            DB::commit();


            $data = [
                'enabled' => true,
                'title' => 'Berhasil!',
                'text' => 'Pengajuan berhasil disetujui',
                'icon' => 'success',
            ];
            Session::flash('swal', $data);

            return redirect()->route('admin.dashboard.pengajuans.index');
        } catch (\Exception $e) {
            DB::rollback();

            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Pengajuan gagal disetujui',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return redirect()->back()->withInput();
        }
    }

    public function reject($id)
    {
        DB::beginTransaction();

        try {
            $pengajuan = Pengajuan::findOrFail($id);
            $pengajuan->status = 'rejected';
            $pengajuan->save();

            DB::commit();

            $data = [
                'enabled' => true,
                'title' => 'Berhasil!',
                'text' => 'Pengajuan berhasil ditolak',
                'icon' => 'success',
            ];
            Session::flash('swal', $data);

            return redirect()->route('admin.dashboard.pengajuans.index');
        } catch (Exception $e) {
            DB::rollback();

            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Pengajuan gagal ditolak',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return redirect()->back()->withInput();
        }
    }
}
