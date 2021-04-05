<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran laporan</title>
    <style type="text/css">
	.judul {
		width: 100%;
        margin-top:-10px;
	}
	.judul .kiri{
		float: left;
		width: 80px;
		height: 70px;
        margin:auto;
        margin-top:10px;
	}
    .judul .kanan{
		float: right;
		width: 200px;
        height: 60px;
        margin-top:-90px;
	}
	.judul h4 b {
        margin-right: 70px;
	    text-transform: uppercase;
	}
    .judul h4 small {
        margin-right: 70px;
	}
    .terbilang {
        background-color: yellow;
        color: black;
        font-size: 12;
        margin-top:10px;
        padding: 5px;
    }
    hr {
        margin-top:-5px;
    }
    table tr th {
        font-weight:200;
        text-align:left;
        border: 1px solid #fff;
        border-collapse: collapse;
    }
    center h2 {
        border: 2px solid yellow;
        margin: auto;
        width:50%;
    }
    header {
        display: inline-block;
        margin-top :10px;
    }
    .content {
        margin-top: 20px;
        margin-bottom:5px;
    }
    .content table tr th{
        text-align: center;
        background-color: rgb(113, 156, 248);
        color: #fff;
    }
    .content table {
        border: 2px solid #000;
        border-collapse: collapse;
    }
    .footer {
        display: inline-table;
        margin-top: 10px;
    }
    .footer .note {
        margin-top:5px;
        padding:20px;
        width:30%;
        height: 100px;
        border: 2px solid black;
        border-radius: 10px;
      
    }
    .footer .note p{
        margin-top: -4px;
        word-wrap: break-word;
    }
    .footer .sign {
        border: 2px solid black;
        align-items: center;
        text-align: center;
        float: right;
        width: 20%;
        border-radius: 10px;
    }
</style>
</head>
<body>
    <center >
	<div class="judul">
		<img src="{{asset('images/logo.jpeg')}}/" class="kiri">
        <h4><b>APLIKASI WEBSITE E-COMMERCE JOGJEST CELL</b> <br> 
            <br>
            <small>Jl.Ngelom Megare RT01 RW01 sepanjang sidoarjo</small>
        </h4>
	</div>
	</center>
    <hr>

    <center>
        <h2>Transaksi Pembayaran</h2>
    </center>
    <header>
        <table  width="100%" > 
            <tr>
                <td>Nama Customer</td>
                <td>:</td>
                <td>{{$customer->nama}}</td>
                <td>&nbsp;&nbsp;</td>
                <td>No.Transaksi <br> Alamat Pengiriman</td>
                <td>: <br> :</td>
                <td>{{$transaksi->no_transaksi}} <br> {{$transaksi->alamat_pengiriman == null ? $customer->alamat : $transaksi->alamat_pengiriman}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$customer->alamat}}</td>
                <td>&nbsp;&nbsp;</td>
                <td>Tanggal Transaksi</td>
                <td>:</td>
                <?php $helper = Helper::formatTanggal($transaksi->created_at->format('Y-m-d'));
                     $tanggalInvoice = str_replace('-',' ',$helper);
                ?>
                <td>{{$tanggalInvoice}}</td>
            </tr> 
        </table>
    </header>

    <div class="content">
        <table width="100%" border="1" >
            <tr>
                <th>No</th>
                <th>Foto Produk</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah Beli</th>
                <th>Total Harga</th>
            </tr>
            <?php $total = 0; $no = 1; ?>
            @foreach ($transaksi->cart as $t)
                <?php
                    if($t->produk->gambar == null) {
                        $foto = url('images/noimage.jpg');
                    } else {
                        $foto =asset('images/produk/')."/".$t->produk->gambar;
                    } 
                ?>
                <tr>
                    <td>{{$no++}}</td>
                    <td><img src="{{$foto}}" width="50" alt="{{$t->produk->nama_produk}}" /></td>
                    <td>{{$t->produk->nama_produk}}</td>
                    <td>Rp.{{number_format($t->produk->harga,0,'','.')}}</td>
                    <td>{{$t->jumlah_beli}} Buah</td>
                    <td>RP.{{number_format($t->total_harga,0,'','.')}}</td>
                </tr>
                <?php $total += $t->total_harga;  ?>
            @endforeach
        </table>
        <table width="100%" border="1" style="margin-top:-5px;" >
            <tr>
                <td width="50%"></td>
                <td width="20%">Total</td>
                <td width="30%" align="right">Rp . {{number_format($total,0,'','.')}}</td>
            </tr>
        </table>
    </div>
    <div>
        <span class="terbilang">Terbilang : <b>{{Helper::terbilang($total)}}</b></span>
    </div>

    <div class="footer">
       <div class="note">
           <p>Note : Mohon Bayar Produk yang dibeli di No Rekening BCA 72983234 Atas Nama Ilham </p>
       </div>

    </div>
</body>
</html>