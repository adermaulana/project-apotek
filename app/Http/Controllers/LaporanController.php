<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjualanExport;

use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(){
        return view ('dashboard.laporan.index',[
            'title' => 'Laporan'
        ]);
    }

    public function getData(Request $request){
        $this->validate($request,[
            'from_date'=>'required',
            'to_date'=>'required',
            'resource'=>'required',
        ]);
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        if ($request->resource == 'obat'){
            $obat = Obat::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_obat = $obat->count();
            $total_stok =$obat->sum('stok');
            $title = "Laporan Jumlah Obat";
            return view('dashboard.laporan.index',compact('obat','title','total_obat','total_stok'));
        }
        if($request->resource == "pembelian"){
            $title = "Laporan Pembelian Obat";
            $pembelian = Pembelian::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_pembelian = $pembelian->sum('total');
            return view('dashboard.laporan.index',compact('title','pembelian','total_pembelian'));
        }
        if($request->resource == 'penjualan'){
            $title = "Laporan Penjualan Obat";
            $penjualan = Penjualan::whereBetween(DB::raw('DATE(created_at)'), array($from_date, $to_date))->get();
            $total_penjualan = $penjualan->sum('total');
            return view('dashboard.laporan.index',compact('title','penjualan','total_penjualan'));
        }
    }

    public function export(Request $request){

        return Excel::download(new PenjualanExport,'laporan.xlsx');

    }
}
