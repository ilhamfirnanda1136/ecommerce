@extends('layouts.front',['title'=>'lihat keranjang Jogjess cell e-commerce'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-shopping-cart"></i> Keranjang Anda</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('konfirmasi.order')}}" id="submitForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Alamat Pengiriman (Centang jika ingin mengunakan alamat default anda)</label>     
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" name="alamatcek" id="alamatcek" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                    <input type="text" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control" placeholder="masukkan alamat pengiriman" required>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="">Pesan </label>     
                                <input type="text" name="pesan" class="form-control" placeholder="Tinggal Pesan disini">
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="checkboxAll" id="checkboxAll"></th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                <th>Harga Asli</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach($cart as $c)
                            <tr>
                                <td id="checked-table-{{$no}}">
                                    <input type="checkbox" name="cekbox[]" value="{{$c->id}}" data-total="{{$c->total_harga}}" class="checkbox-cart">
                                </td>
                                <td>
                                    <img src="{{asset('images/produk')}}/{{$c->produk->gambar}}" alt="{{$c->produk->nama_produk}}" width="100">
                                </td>
                                <td>{{$c->produk->nama_produk}}</td>
                                <td>
                                    <button type="button" class='btn btn-sm btn-danger btn-decrease' data-number="{{$no}}"
                                        data-id='{$c->id}'><i class='fa fa-minus'></i></button>
                                    <span class="quantity-stok">{{$c->jumlah_beli}}</span>
                                    <input type="hidden" name="stok-form-{{$c->id}}" class="stok-form" value="{{$c->jumlah_beli}}">
                                    <button type="button" class='btn mr-5 btn-sm btn-primary btn-increase' data-number="{{$no}}" data-id='{$c->id}' data-stok="{{$c->produk->stok}}"><i class='fa fa-plus'></i></button>
                                </td>
                                <td id="total-{{$no}}" data-total="{{$c->produk->harga}}">
                                    Rp.{{number_format($c->produk->harga,0,'','.')}}</td>
                                <td id="total-harga-{{$no++}}" data-total="{{$c->total_harga}}">
                                    Rp.{{number_format($c->total_harga,0,'','.')}}</td>
                                <td><button type="button" class="btn btn-danger btn-md btn-delete" data-id="{{$c->id}}"><i
                                            class="fa fa-trash"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-lg btn-primary" id="cekout-button">Konfirmasi Order</button>
                    <h3 class="float-right"><b>Total : Rp. <span id="total">0</span></b></h3>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    $(document).ready(function () {
        
        $('#cekout-button').click(function(){
            var total = parseInt($('#total').text());
            if(total === 0) toastr.error('Mohon pilih produk yang ingin dibeli', 'Pesan Error!') 
            else {
                $(this).attr("type","submit");
                $(this).trigger('click');
            }
        });

        var total = 0;
        $('body').on('click', '.btn-delete', function () {
            const id = $(this).data('id');
            swal({
                    title: "Yakin?",
                    text: "anda yakin ingin menghapus produk ini di cart anda ??",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "{{url('hapus/cart/')}}/" + id;
                    } else {
                        swal("Anda membatalkan hapus data");
                    }
                });
        });

        $('#alamatcek').click(function (){
            var checkAlamat = $("#alamatcek").prop('checked');
            if(checkAlamat) {
                $('#alamat_pengiriman').attr("readonly","true");
                $('#alamat_pengiriman').removeAttr("required");
                $('#alamat_pengiriman').val('');
                $('#alamat_pengiriman').attr("placeholder","{{Session::get('customer')->alamat}}");
            } else {
                $('#alamat_pengiriman').removeAttr("readonly");
                $('#alamat_pengiriman').attr("required","true");
                $('#alamat_pengiriman').attr("placeholder","masukkan alamat pengiriman");
            }
        });

        $("#checkboxAll").click(function () {
            var checkAll = $("#checkboxAll").prop('checked');
            if (checkAll) {
                $(".checkbox-cart").prop("checked", true);
                $('.checkbox-cart').each(function () {
                    total += parseInt($(this).data('total'));
                });
                $('#total').text(formatAngka(total));
            } else {
                $(".checkbox-cart").prop("checked", false);
                $('#cekout-button').attr("type","button");
                $('#total').text('0');
                total = 0;
            }
        });

        $("body").on('click', '.checkbox-cart', function () {
            if ($(this).prop("checked")) {
                total += parseInt($(this).data('total'));
                $('#total').text(formatAngka(total));
            } else {
                total -= parseInt($(this).data('total'));
                $('#total').text(formatAngka(total));
            }
            if ($(".checkbox-cart").length == $(".checkbox-cart:checked").length) {
                $("#checkboxAll").prop("checked", true);
            } else {
                $("#checkboxAll").prop("checked", false);
                $('#cekout-button').attr("type","button");
            }
        });

        $('body').on('click', '.btn-increase', function () {
            const number = $(this).data('number');
            const stok = parseInt($(this).data('stok'));
            var totalharga = $('#total-harga-' + number);
            var harga = $('#total-' + number);
            var cekedTable = $('#checked-table-' + number);
            var totalInc = 0;
            var quantity = parseInt($(this).siblings('.quantity-stok').text());
            var quantityForm = $(this).siblings('.stok-form');
            if (stok <= quantity) {
                swal({
                    title: "Peringatan",
                    text: "Stok produk tidak cukup",
                    icon: "error",
                });
            } else {
                quantity += 1;
                totalInc = parseInt(harga.data('total')) + parseInt(totalharga.data('total'));
                totalharga.data('total', totalInc);
                totalharga.text(`Rp.${formatAngka(totalInc)}`);
                $(this).siblings('.quantity-stok').text(quantity);
                quantityForm.val(quantity);
                cekedTable.children(".checkbox-cart").data('total', totalInc);
                if (cekedTable.children(".checkbox-cart").prop("checked")) {
                    total += parseInt(harga.data('total'));
                    $('#total').text(formatAngka(total));
                } 
            }
        });

        $('body').on('click', '.btn-decrease', function () {
            const number = $(this).data('number');
            var totalharga = $('#total-harga-' + number);
            var harga = $('#total-' + number);
            var totalDec = 0;
            var cekedTable = $('#checked-table-' + number);
            var quantity = parseInt($(this).siblings('.quantity-stok').text());
            var quantityForm = $(this).siblings('.stok-form');
            if (quantity !== 1) {
                quantity -= 1;
                $(this).siblings('.quantity-stok').text(quantity);
                totalDec = parseInt(totalharga.data('total')) - parseInt(harga.data('total'));
                totalharga.data('total', totalDec);
                totalharga.text(`Rp.${formatAngka(totalDec)}`);
                quantityForm.val(quantity);
                cekedTable.children(".checkbox-cart").data('total', totalDec);
                if (cekedTable.children(".checkbox-cart").prop("checked")) {
                    total -= parseInt(harga.data('total'));
                    $('#total').text(formatAngka(total));
                } 
            }
        });

    });

</script>
@endsection
