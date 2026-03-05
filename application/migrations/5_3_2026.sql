ALTER TABLE penjualan
ADD COLUMN bayar DECIMAL(15,2) NOT NULL DEFAULT 0 AFTER total,
ADD COLUMN kembalian DECIMAL(15,2) NOT NULL DEFAULT 0 AFTER bayar;


-- drop view view_jual;

create view view_jual as 
SELECT
    CAST(YEAR(tgl_transaksi) AS CHAR) AS tahun,
    SUM(total) AS jual
FROM penjualan
WHERE tgl_transaksi IS NOT NULL
AND tgl_transaksi != ''
GROUP BY YEAR(tgl_transaksi)
ORDER BY tahun DESC;


-- drop view view_beli;

create view view_beli as 
SELECT
    CAST(YEAR(tgl_transaksi) AS CHAR) AS tahun,
    SUM(total) AS beli
FROM pembelian
WHERE tgl_transaksi IS NOT NULL
AND tgl_transaksi != ''
GROUP BY YEAR(tgl_transaksi)
ORDER BY tahun DESC;


-- drop view view_labarugi;

create view view_labarugi as 
SELECT
    b.tahun,
    COALESCE(a.beli,0) AS beli,
    b.jual
FROM view_jual b
LEFT JOIN view_beli a
    ON a.tahun = b.tahun
ORDER BY b.tahun DESC;