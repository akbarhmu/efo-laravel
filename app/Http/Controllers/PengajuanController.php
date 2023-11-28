<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengajuanRequest;
use App\Models\Pengajuan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PengajuanController extends Controller
{
    public function urgensiPage()
    {
        return view('urgensi');
    }

    public function syaratKetentuanPage()
    {
        return view('syarat');
    }

    public function tataCaraPage()
    {
        return view('cara');
    }

    public function pengajuanPage()
    {
        return view('pengajuan');
    }

    public function storePengajuan(PengajuanRequest $request)
    {
        DB::beginTransaction();

        try {
            $pengajuan = new Pengajuan();
            $pengajuan->user_id = auth()->user()->id;
            $pengajuan->address = $request->validated('address');
            $pengajuan->domicile_address = $request->validated('domicile_address');
            $pengajuan->domicile_rt_rw = $request->validated('domicile_rt_rw');
            $pengajuan->file_scan_ktp = $request->validated('file_scan_ktp')->store('scan_ktp');
            $pengajuan->file_scan_dpt = $request->validated('file_scan_dpt')->store('scan_dpt');
            $pengajuan->file_recommendation_letter = $request->validated('file_recommendation_letter')->store('recommendation_letter');
            $pengajuan->save();
            DB::commit();

            return redirect()->route('pengajuan.success');
        } catch (Exception $e) {
            DB::rollBack();
            $data = [
                'enabled' => true,
                'title' => 'Gagal!',
                'text' => 'Data diri gagal diperbarui',
                'icon' => 'error',
            ];
            Session::flash('swal', $data);

            return back()->withInput();
        }
    }

    public function pengajuanSuccess()
    {
        return view('pengajuan-berhasil');
    }
}
