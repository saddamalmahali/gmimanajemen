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
        
	#Query Pemanggilan Persediaan Barang
    select b.id_barang, b.id_satuan, b.kode_barang, b.nama_barang, b.id_kategori, 

	@persediaan := (select sum(dp.kuantitas) from detile_pembelian dp 
					where dp.kode_barang=b.kode_barang and dp.id_pembelian in
					(select mb.id_pembelian from masuk_barang mb)
				   ) 
	as persediaan
	 from barang b
	 join (select @persediaan := 0) v

	where b.id_kategori='K-002'

*/
	select s.id_supplier, s.kode, s.nama,
    @kuantitas := (select sum(dp.kuantitas) from pembelian p 
					inner join detile_pembelian dp on dp.id_pembelian = p.id_pembelian 
                    join barang b on b.kode_barang = dp.kode_barang
                    where b.id_kategori = 'K-001' 
                    and p.kode_supplier = s.kode 
                    and p.id_pembelian in(select mb.id_pembelian from masuk_barang mb))
    as tersedia
    from supplier s     
    join (select @kuantitas := 0) v
    
    
    