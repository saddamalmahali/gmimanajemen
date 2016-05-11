/*

	select * from pembelian;
    select * from detile_pembelian;
    select * from barang
    
    #Query pemanggilan list transaksi, barang yang masuk
- 	select p.id_pembelian as 'ID Pembelian', p.kode_pembelian as 'Kode Pembelian', 
		p.jenis_pembelian as 'Jenis Pembelian', dp.nama_barang as 'Nama Barang', 
        dp.kuantitas as 'Kuantitas', dp.harga as 'Harga Satuan', b.nama_barang as 'Nama Barang',
		@jumlah := dp.kuantitas*dp.harga as jumlah
		from pembelian p 
		inner join detile_pembelian dp on dp.id_pembelian=p.id_pembelian 
        left join barang b on b.kode_barang=dp.kode_barang
        join (select @jumlah := 0) v;

*/
	