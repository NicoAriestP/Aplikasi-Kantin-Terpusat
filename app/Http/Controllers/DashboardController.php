<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $member = Member::count();
        $allWarung = Store::all()->pluck('nama_warung','id');

        $tanggalAwal = date('Y-m-01');
        $tanggalAkhir = date('Y-m-d');

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = date('Y-m-d');

        $data_tanggal = [];
        $data_pendapatan_all = [];

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            $data_tanggal[] = (int) substr($tanggal_awal, 8, 2);
            $namaWarungDipilih = "";
            $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            if($request->has('id_warung')){
                $id_warung = $request->id_warung;
                $warungDipilih = Store::find($id_warung);
                $namaWarungDipilih = $warungDipilih->nama_warung;
                $total_penjualan = PenjualanDetail::where('created_at', 'LIKE', "%$tanggal_awal%")->where('id_warung','=', $id_warung)->sum('subtotal');
            }
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan_all[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));
        }

        if (auth()->user()->level == 1) {
            return view('admin.dashboard', compact('tanggalAwal','tanggalAkhir','kategori', 'produk','allWarung', 'supplier', 'member', 'tanggal_awal', 'tanggal_akhir', 'data_tanggal', 'data_pendapatan_all','namaWarungDipilih'));
        } else {
            return view('kasir.dashboard');
        }
    }
}
