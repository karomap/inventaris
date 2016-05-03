<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Http\Requests;
use App\Item;
use App\Kategori;
use App\Kelompok;
use App\SubKelompok;
use DB;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cond = "1";
        $order = "updated_at";
        $order_state = "desc";

        if(!empty($request->golongan)) {
            $cond .= " AND id_kategori LIKE '{$request->golongan}%'";
        }

        if(!empty($request->bidang)) {
            $cond .= " AND id_kategori LIKE '{$request->bidang}%'";
        }

        if(!empty($request->kelompok)) {
            $cond .= " AND id_kategori LIKE '{$request->kelompok}%'";
        }

        if(!empty($request->subkelompok)) {
            $cond .= " AND id_kategori LIKE '{$request->subkelompok}%'";
        }

        if(!empty($request->kategori)) {
            $cond .= " AND id_kategori = {$request->kategori}";
        }

        $items = Item::orderBy($order, $order_state)->whereRaw($cond)->paginate(25);
        $filter = $request->except(['_token']);

        return view('pages.index', compact(['items', 'filter']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.baru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'merk_type' => 'required|max:50|alpha_num',
            'no_spcm' => 'required|max:50|alpha_num',
            'bahan' => 'required|max:50|alpha_num',
            'asal' => 'required',
            'tahun' => 'required|numeric',
            'keadaan' => 'required',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'required|integer|min:0|digits_between:1,10'
        ]);

        $item = new Item;
        $item->id_kategori = $request->id_kategori;
        $item->register = $request->user()->id;
        $item->merk_type = strtoupper($request->merk_type);
        $item->no_spcm = $request->no_spcm;
        $item->bahan = strtoupper($request->bahan);
        $item->asal = $request->asal;
        $item->tahun = $request->tahun;
        $item->ukuran_konstruksi = $request->ukuran_konstruksi;
        $item->satuan = $request->satuan;
        $item->keadaan = $request->keadaan;
        $item->jumlah = $request->jumlah;
        $item->harga = $request->harga;
        $item->keterangan = $request->keterangan;
        $item->save();

        \Flash::success($item->merk_type.' berhasil ditambahkan');
        return redirect()->route('inventaris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);

        return view('pages.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('pages.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_kategori' => 'required',
            'merk_type' => 'required|max:50|alpha_num',
            'no_spcm' => 'required|max:50|alpha_num',
            'bahan' => 'required|max:50|alpha_num',
            'asal' => 'required',
            'tahun' => 'required|numeric',
            'keadaan' => 'required',
            'jumlah' => 'required|numeric|min:0',
            'harga' => 'required|integer|min:0|digits_between:1,10'
        ]);

        $item = Item::findOrFail($id);
        $item->id_kategori = $request->id_kategori;
        $item->register = $request->user()->id;
        $item->merk_type = strtoupper($request->merk_type);
        $item->no_spcm = $request->no_spcm;
        $item->bahan = strtoupper($request->bahan);
        $item->asal = $request->asal;
        $item->tahun = $request->tahun;
        $item->ukuran_konstruksi = $request->ukuran_konstruksi;
        $item->satuan = $request->satuan;
        $item->keadaan = $request->keadaan;
        $item->jumlah = $request->jumlah;
        $item->harga = $request->harga;
        $item->keterangan = $request->keterangan;
        $item->update();

        \Flash::success($item->merk_type.' berhasil diperbarui');
        return redirect()->route('inventaris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        \Flash::success($item->merk_type.' berhasil dihapus');
        return redirect()->route('inventaris.index');
    }

    public function autocomplete(Request $request)
    {
        $keyword = isset($request->id) ? $request->id : strtolower($request->q);
        $cond = isset($request->id) ? "kategori.id = {$keyword}" : "kategori.uraian LIKE '%{$keyword}%' OR sub_kelompok.uraian LIKE '%{$keyword}%' OR kelompok.uraian LIKE '%{$keyword}%'";

        $kategori = DB::table('kategori')
                ->join('sub_kelompok', 'sub_kelompok.id', '=', 'kategori.id_subkelompok')
                ->join('kelompok', 'kelompok.id', '=', 'sub_kelompok.id_kelompok')
                ->join('bidang', 'bidang.id', '=', 'kelompok.id_bidang')
                ->join('golongan', 'golongan.id', '=', 'bidang.id_gol')
                ->select('kategori.*', 'sub_kelompok.id as id_subkelompok', 'sub_kelompok.uraian as sub_kelompok', 'kelompok.id as id_kelompok', 'kelompok.uraian as kelompok', 'bidang.id as id_bidang', 'bidang.uraian as bidang', 'golongan.id as id_gol', 'golongan.uraian as golongan')
                ->whereRaw($cond)
                ->take(25)->get();

        return response($kategori);
    }

    public function listkategori(Request $request)
    {
        $tipe = $request->tipe;
        $id_parent = $request->id_parent;

        switch ($tipe) {
            case 'bidang':
                $kategori = Bidang::where('id_gol', $id_parent)->get();
                foreach ($kategori as $kat) {
                    $result[$kat->id] = $kat->uraian;
                }
                return response(collect($result));
                break;

            case 'kelompok':
                $kategori = Kelompok::where('id_bidang', $id_parent)->get();
                foreach ($kategori as $kat) {
                    $result[$kat->id] = $kat->uraian;
                }
                return response(collect($result));
                break;

            case 'subkelompok':
                $kategori = SubKelompok::where('id_kelompok', $id_parent)->get();
                foreach ($kategori as $kat) {
                    $result[$kat->id] = $kat->uraian;
                }
                return response(collect($result));
                break;

            case 'kategori':
                $kategori = Kategori::where('id_subkelompok', $id_parent)->get();
                foreach ($kategori as $kat) {
                    $result[$kat->id] = $kat->uraian;
                }
                return response(collect($result));
                break;
            
            default:
                # code...
                break;
        }
    }
}
