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

            $scanKtpFilename = $request->validated('file_scan_ktp')->hashName();
            $request->validated('file_scan_ktp')->store('files');
            $pengajuan->file_scan_ktp = $scanKtpFilename;

            $scanDptFilename = $request->validated('file_scan_dpt')->hashName();
            $request->validated('file_scan_dpt')->store('files');
            $pengajuan->file_scan_dpt = $scanDptFilename;

            $recommendationLetterFilename = $request->validated('file_recommendation_letter')->hashName();
            $request->validated('file_recommendation_letter')->store('files');
            $pengajuan->file_recommendation_letter = $recommendationLetterFilename;
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
