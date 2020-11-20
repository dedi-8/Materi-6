<?php 

namespace App\Http\Controllers;
use App\Produk;

class ProdukController extends controller{
	function index(){
		$data['list_produk'] = Produk::all();
		return view('produk.index', $data);
	}

	function create(){
		return view('produk.create');
	}
	function store(){
		$produk= new Produk;
		$produk-> nama = request('nama');
		$produk-> berat = request('berat');
		$produk-> harga = request('harga');
		$produk-> warna = request('warna');
		$produk-> stok = request('stok');
		$produk-> deskripsi = request('deskripsi');
		$produk->save();

		return redirect('produk')->with('success','Data berhasil ditambahkan');
	}
	function show(Produk $produk){
		$data['produk'] = $produk;
		return view('produk.show', $data);
	}
	function edit(Produk $produk){
		$data['produk'] = $produk;
		return view('produk.edit', $data);
	}
	function update(Produk $produk){
		$produk-> nama = request('nama');
		$produk-> berat = request('berat');
		$produk-> harga = request('harga');
		$produk-> warna = request('warna');
		$produk-> stok = request('stok');
		$produk-> deskripsi = request('deskripsi');
		$produk->save();

		return redirect('produk')->with('warning','Data berhasil diupdate');
	}
	function destroy(Produk $produk){
		$produk->delete();
		return redirect('produk')->with('danger','Data berhasil dihapus');
	}
	function filter(){
		$nama = request ('nama');
		$stok = explode(",", request('stok'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('nama', 'like', "%$nama%")->get();
		//$data['list_produk'] = Produk:: whereIn('stok', $stok)->get();
		//$data['list_produk'] = Produk:: whereBetween('harga', [$harga_min, $harga_max])->get();
		//$data['list_produk'] = Produk::where('stok', '<>', $stok)->get();
		//$data['list_produk'] = Produk:: whereNotIn('stok', $stok)->get();
		//$data['list_produk'] = Produk:: whereNotBetween('harga', [$harga_min, $harga_max])->get();
		//$data['list_produk'] = Produk:: whereNull('stok')->get();
		//$data['list_produk'] = Produk:: whereNotNull('stok')->get();
		//$data['list_produk'] = Produk:: whereBetween('stok', [$harga_min, $harga_max])->whereNotIn('stok', [2])->whereYear('created_at', '2020')->get();
		$data['nama'] = $nama;
		$data['stok'] = request('stok');

		return view('produk.index', $data);
	}
}