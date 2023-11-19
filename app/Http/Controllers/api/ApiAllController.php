<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Response;

class ApiAllController extends Controller
{
    public function barang()
    {
        $barang = DB::table('barang')
        ->join('users','users.id','=','barang.user_id')
        ->select('barang.*','users.id as id_user')
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }

    public function get_barang_by_id(Request $request)
    {
        $barang = DB::select("select * from barang where id = '$request->id'");

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }

    public function distributor()
    {
        $distributor = DB::table('distributor')
            ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
            ->join('users', 'users.id', '=', 'distributor.users_id')
            ->join('penjab', 'penjab.id', '=', 'distributor.penjab_id')
            ->select(
                'users.full_name',
                'users.email',
                'users.password',
                'count_manager.nama_cm',
                'count_manager.id',
                'penjab.nama_penjab',
                'distributor.*'
            )
            ->where('users.role_id', '=', '2')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $distributor
        ]);
    }

    public function count_manager()
    {
        $count_manager = DB::select('select * from count_manager');
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $count_manager
        ]);
    }

    public function penjab()
    {
        $penjab = DB::select('select * from penjab');
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $penjab
        ]);
    }

    public function tambah_distributor(Request $request)
    {
        $validate = $request->validate([
            'count_manager_id' => 'required',
            'kode_distributor' => 'required',
            'users_id' => 'required',
            'penjab_id' => 'required',
            'kontak' => 'required',
            'alamat' => 'required',
            'area' => 'required',
            'jumlah_agen' => 'required',
        ]);

        $distributor = DB::table('distributor')->insert([

            'count_manager_id' => $request->count_manager_id,
            'kode_distributor' => $request->kode_distributor,
            'users_id' => $request->users_id,
            'penjab_id' => $request->penjab_id,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'area' => $request->area,
            'jumlah_agen' => $request->jumlah_agen,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Distributor berhasil ditambah',
            'data' => $distributor
        ], Response::HTTP_OK);
    }

    public function pemesanan()
    {
        $pemesanan = DB::table('pemesanan')
            ->join('barang', 'barang.id', '=', 'pemesanan.id_barang')
            ->select('pemesanan.*', 'barang.nama_barang', 'barang.jenis', 'barang.harga', 'barang.ukuran')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $pemesanan
        ]);
    }
     public function tambah_pemesanan(Request $request)
    {
        $validate = $request->validate([
            'id_user' => 'required',
            'id_barang' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'status' => 'required',
            'order_id' => 'required',
            'redirect_url' => 'required',
        ]);

        $pemesanan = DB::table('pemesanan')->insert([

                'id_user' => $request->id_user,
                'id_barang' => $request->id_barang,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'status' => $request->status,
                'status_barang' => 'menunggu',
                'order_id' => $request->order_id,
                'redirect_url' => $request->redirect_url,
                'created_at' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Pemesanan berhasil ditambah',
                'data' => $pemesanan
            ], Response::HTTP_OK);
    }

    public function delete_pemesanan($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Role berhasil dihapus',
            'data' => $pemesanan
        ]);
    }
    public function get_pemesanan_by_id($id)
    {
        $get_pemesanan_by_id = DB::table('pemesanan')
        ->join('barang','barang.id','=','pemesanan.id_barang')
        ->join('users','users.id','=','pemesanan.id_user')
        ->select('pemesanan.*','barang.nama_barang','barang.jenis','barang.harga','barang.ukuran')
        ->where('users.id', '=', $id)
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $get_pemesanan_by_id
        ]);
    }
    public function updateTransaksi(Request $request)
    {
        $order_id = $request->input('order_id');
        $save = [
            'status' => 'lunas'
        ];

        $updateTransaksi = DB::table('pemesanan')
            ->where('order_id', $order_id)
            ->update($save);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $updateTransaksi
        ], Response::HTTP_OK);
    }
}
