<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Http\Requests;
use App\Item;
use App\Kategori;
use App\Kelompok;
use App\SubKelompok;
use Carbon\Carbon;
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
        $pg = 25;

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

        if(!empty($request->kat)) {
            $cond .= " AND id_kategori = {$request->kat}";
        }

        if(!empty($request->keadaan)) {
            $cond .= " AND keadaan = '{$request->keadaan}'";
        }

        if(!empty($request->keyword)) {
            $keyword = strtolower($request->keyword);
            $cond .= " AND LOWER(merk_type) LIKE '%{$keyword}%'";
        }

        if(!empty($request->tanggal)) {
            $tanggal = explode(' - ', $request->tanggal);
            list($start,$end) = $tanggal;
            $dari = Carbon::createFromFormat('d/m/Y H:i:s', $start.' 00:00:00');
            $sampai = Carbon::createFromFormat('d/m/Y H:i:s', $end.' 23:59:59');
            $cond .= " AND updated_at BETWEEN '".$dari."' AND '".$sampai."'";
        }

        if(!empty($request->order)) {
            switch($request->order) {
                case 'typeA':
                    $order = 'merk_type';
                    $order_state = 'asc';
                    break;

                case 'typeZ':
                    $order = 'merk_type';
                    $order_state = 'desc';
                    break;

                case 'asal':
                    $order = 'asal';
                    $order_state = 'asc';
                    break;

                case 'keadaan':
                    $order = 'keadaan';
                    $order_state = 'asc';
                    break;

                case 'terlama':
                    $order = 'updated_at';
                    $order_state = 'asc';
                    break;

                default:
                    $order = 'updated_at';
                    $order_state = 'desc';
                    break;
            }
        }

        if (!empty($request->pg)) {
            $pg = $request->pg;
        }

        if ($request->print == csrf_token()) {
            $items = Item::whereRaw($cond)->orderBy($order, $order_state)->get();
            return view('pages.print', compact('items'));
        }

        $items = Item::whereRaw($cond)->orderBy($order, $order_state)->paginate($pg);
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
            'merk_type' => 'required',
            'no_spcm' => 'required',
            'bahan' => 'required',
            'asal' => 'required',
            'tahun' => 'required|numeric',
            'keadaan' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'merk_type' => 'required|max:50|string',
            'no_spcm' => 'required|max:50|string',
            'bahan' => 'required|max:50|string',
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
        $item->keterangan = ucwords($request->keterangan);
        $item->save();

        return response(['status' => 'success', 'message' => $item->merk_type.' berhasil ditambahkan.']);
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
            'merk_type' => 'required',
            'no_spcm' => 'required',
            'bahan' => 'required',
            'asal' => 'required',
            'tahun' => 'required|numeric',
            'keadaan' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'merk_type' => 'required|max:50|string',
            'no_spcm' => 'required|max:50|string',
            'bahan' => 'required|max:50|string',
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
        $item->keterangan = ucwords($request->keterangan);
        $item->update();

        return response(['status' => 'success', 'message' => $item->merk_type.' berhasil diperbarui.']);
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

        return response(['status' => 'success', 'message' => $item->merk_type.' berhasil dihapus.']);
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

    public function download(Request $request)
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

        if(!empty($request->kat)) {
            $cond .= " AND id_kategori = {$request->kat}";
        }

        if(!empty($request->keadaan)) {
            $cond .= " AND keadaan = '{$request->keadaan}'";
        }

        if(!empty($request->keyword)) {
            $keyword = strtolower($request->keyword);
            $cond .= " AND LOWER(merk_type) LIKE '%{$keyword}%'";
        }

        if(!empty($request->tanggal)) {
            $tanggal = explode(' - ', $request->tanggal);
            list($start,$end) = $tanggal;
            $dari = Carbon::createFromFormat('d/m/Y H:i:s', $start.' 00:00:00');
            $sampai = Carbon::createFromFormat('d/m/Y H:i:s', $end.' 23:59:59');
            $cond .= " AND updated_at BETWEEN '".$dari."' AND '".$sampai."'";
        }

        if(!empty($request->order)) {
            switch($request->order) {
                case 'typeA':
                    $order = 'merk_type';
                    $order_state = 'asc';
                    break;

                case 'typeZ':
                    $order = 'merk_type';
                    $order_state = 'desc';
                    break;

                case 'asal':
                    $order = 'asal';
                    $order_state = 'asc';
                    break;

                case 'keadaan':
                    $order = 'keadaan';
                    $order_state = 'asc';
                    break;

                case 'terlama':
                    $order = 'updated_at';
                    $order_state = 'asc';
                    break;

                default:
                    $order = 'updated_at';
                    $order_state = 'desc';
                    break;
            }
        }

        $data = Item::whereRaw($cond)->orderBy($order, $order_state)->get();

        foreach ($data as $key => $item) {
            $items[] = [
                $key+1,
                formatKode(str_pad($item->id_kategori, 10, '0', STR_PAD_LEFT)),
                str_pad($item->register, 3, '0', STR_PAD_LEFT),
                $item->kategori->uraian,
                $item->merk_type,
                $item->no_spcm,
                $item->bahan,
                ucfirst($item->asal),
                $item->tahun,
                $item->ukuran_konstruksi,
                $item->satuan,
                ['b' => 'Baik', 'kb' => 'Kurang Baik', 'rb' => 'Rusak Berat'][$item->keadaan],
                $item->jumlah,
                $item->harga,
                $item->keterangan,
                $item->created_at,
                $item->updated_at
            ];
        }

        \Excel::create('Aset_'.date('Y_m_d_His'), function($excel) use($items) {
            $excel->sheet('Aset', function($sheet) use($items) {
                $sheet->fromArray($items);
                $sheet->row(1, [
                    'No', 'Kode Barang', 'Register', 'Nama / Jenis Barang', 'Merk / Type', 'No. SPCM', 'Bahan',
                    'Asal / Cara Perolehan', 'Tahun Pembelian', 'Ukuran Barang / Konstruksi', 'Satuan', 'Keadaan',
                    'Jumlah Barang', 'Jumlah Harga', 'Keterangan', 'Dibuat', 'Diupdate'
                ]);
                $sheet->setColumnFormat([
                    'B' => '@',
                    'C' => '@'
                ]);
            });
        })->download('xlsx');
    }
}
