<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Pengeluaran;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Store;
use Illuminate\Http\Request;
use PDF;

class LaporanWarungController extends Controller
{
    public function index(Request $request)
    {
        $tanggalAwal = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $tanggalAkhir = date('Y-m-d');
        $warung = Store::all()->pluck('nama_warung','id');
        $id_warung = 1;
        $warungDipilih = Store::find($id_warung);
        $namaWarungDipilih = $warungDipilih->nama_warung;


        if ($request->has('tanggal_awal') && $request->tanggal_awal != "" && $request->has('tanggal_akhir') && $request->tanggal_akhir && $request->has('id_warung')) {
            $tanggalAwal = $request->tanggal_awal;
            $tanggalAkhir = $request->tanggal_akhir;
            $id_warung = $request->id_warung;
            $warungDipilih = Store::find($id_warung);
            $namaWarungDipilih = $warungDipilih->nama_warung;
        }

        return view('laporan_warung.index', compact('tanggalAwal', 'tanggalAkhir','warung','id_warung','namaWarungDipilih'));
    }

    public function getData($awal, $akhir ,$id_warung)
    {
        $no = 1;
        $data = array();
        $pendapatan = 0;
        $total_pendapatan = 0;

        while (strtotime($awal) <= strtotime($akhir)) {
            $tanggal = $awal;
            $awal = date('Y-m-d', strtotime("+1 day", strtotime($awal)));

            $total_penjualan = PenjualanDetail::where('created_at', 'LIKE', "%$tanggal%")->where('id_warung','=', $id_warung)->sum('subtotal');
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $total_pendapatan += $pendapatan;

            $row = array();
            $row['DT_RowIndex'] = $no++;
            $row['tanggal'] = tanggal_indonesia($tanggal, false);
            $row['penjualan'] = format_uang($total_penjualan);
            $row['pembelian'] = format_uang($total_pembelian);
            $row['pengeluaran'] = format_uang($total_pengeluaran);
            $row['pendapatan'] = format_uang($pendapatan);

            $data[] = $row;
        }

        $data[] = [
            'DT_RowIndex' => '',
            'tanggal' => '',
            'penjualan' => '',
            'pembelian' => '',
            'pengeluaran' => 'Total Pendapatan',
            'pendapatan' => format_uang($total_pendapatan),
        ];

        return $data;
    }

    public function data($awal, $akhir ,$id_warung)
    {
        $data = $this->getData($awal, $akhir ,$id_warung);

        return datatables()
            ->of($data)
            ->make(true);
    }

    public function exportPDF($awal, $akhir ,$id_warung)
    {
        $data = $this->getData($awal, $akhir ,$id_warung);
        $pdf  = PDF::loadView('laporan.pdf', compact('awal', 'akhir', 'data'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream('Laporan-pendapatan-'. date('Y-m-d-his') .'.pdf');
    }
}
