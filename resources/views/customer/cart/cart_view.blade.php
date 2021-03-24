@extends('layouts.front',['title'=>'lihat keranjang Jogjess cell e-commerce'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Keranjang Anda</h3>
            </div>
            <div class="card-body">
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
                                <td id="checked-table-{{$no}}"><input type="checkbox" value="{{$c->id}}" data-total="{{$c->total_harga}}" class="checkbox-cart"></td>
                                <td><img src="{{asset('images/produk')}}/{{$c->produk->gambar}}" alt="{{$c->produk->nama_produk}}" width="100" ></td>
                                <td>{{$c->produk->nama_produk}}</td>
                                <td>
                                    <button class='btn btn-sm btn-danger btn-decrease' data-number="{{$no}}" data-id='{$c->id}'><i class='fa fa-minus'></i></button> 
                                    <span class="quantity-stok" >{{$c->jumlah_beli}}</span> 
                                    <button class='btn mr-5 btn-sm btn-primary btn-increase' data-number="{{$no}}" data-id='{$c->id}' data-stok="{{$c->produk->stok}}"><i class='fa fa-plus'></i></button>
                                </td>
                                <td id="total-{{$no}}" data-total="{{$c->produk->harga}}">Rp.{{number_format($c->produk->harga,0,'','.')}}</td>
                                <td id="total-harga-{{$no++}}" data-total="{{$c->total_harga}}">Rp.{{number_format($c->total_harga,0,'','.')}}</td>
                                <td><button class="btn btn-danger btn-md btn-delete" data-id="{{$c->id}}"><i class="fa fa-trash"></i></button></td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-lg btn-primary" id="cekout-button">Proses Cek Out</button>
                <h3 class="float-right"><b>Total : Rp. <span id="total">0</span></b></h3>
            </div>
        </div>
    </div>
</div>
@stop
@section('footer')
<script>
    $(document).ready(function(){
        var total = 0;
        $('body').on('click','.btn-delete',function(){
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
                window.location="{{url('hapus/cart/')}}/"+id;
              } else {
                swal("Anda membatalkan hapus data");
              }
            });
        });

          $("#checkboxAll").click(function () {
                var checkAll = $("#checkboxAll").prop('checked');
                    if (checkAll) {
                        $(".checkbox-cart").prop("checked", true);
                        $('.checkbox-cart').each(function(){
                            total += parseInt($(this).data('total'));
                        });
                         $('#total').text(formatAngka(total));
                    } else {
                        $(".checkbox-cart").prop("checked", false);
                        $('#total').text('0');
                        total = 0;
                    }
                });

            $("body").on('click','.checkbox-cart',function(){
                if($(this).prop("checked")){
                    total += parseInt($(this).data('total'));
                    $('#total').text(formatAngka(total));
                } else {
                    total -= parseInt($(this).data('total'));
                    $('#total').text(formatAngka(total));
                }
                if($(".checkbox-cart").length == $(".checkbox-cart:checked").length) {
                    $("#checkboxAll").prop("checked", true);
                } else {
                    $("#checkboxAll").prop("checked", false);
                }
            });

            $('body').on('click','.btn-increase',function(){
                const number = $(this).data('number');
                const stok = parseInt($(this).data('stok'));
                var totalharga = $('#total-harga-'+number);
                var harga = $('#total-'+number);
                var cekedTable = $('#checked-table-'+number);
                var totalInc = 0;
                var quantity = parseInt($(this).siblings('.quantity-stok').text());
                if(stok <= quantity) {
                     swal({
                        title: "Peringatan",
                        text: "Stok produk tidak cukup",
                        icon: "error",
                    });
                } else {
                    quantity += 1;
                    totalInc = parseInt(harga.data('total')) + parseInt(totalharga.data('total'));
                    totalharga.data('total',totalInc);
                    totalharga.text(`Rp.${formatAngka(totalInc)}`);
                    $(this).siblings('.quantity-stok').text(quantity);
                    cekedTable.children(".checkbox-cart").data('total',totalInc);
                    if(cekedTable.children(".checkbox-cart").prop("checked")) {
                        total+=parseInt(harga.data('total'));
                        $('#total').text(formatAngka(total));
                    }
                }
            });

            $('body').on('click','.btn-decrease',function(){
                const number = $(this).data('number');
                var totalharga = $('#total-harga-'+number);
                var harga = $('#total-'+number);
                var totalDec = 0;
                var cekedTable = $('#checked-table-'+number);
                var quantity = parseInt($(this).siblings('.quantity-stok').text());
                if(quantity !== 1) {
                    quantity -= 1;
                    $(this).siblings('.quantity-stok').text(quantity);
                    totalDec =  parseInt(totalharga.data('total')) - parseInt(harga.data('total'));
                    totalharga.data('total',totalDec);
                    totalharga.text(`Rp.${formatAngka(totalDec)}`);
                    cekedTable.children(".checkbox-cart").data('total',totalDec);
                    if(cekedTable.children(".checkbox-cart").prop("checked")) {
                        total-=parseInt(harga.data('total'));
                        $('#total').text(formatAngka(total));
                    }
                }
            });

    });
</script>
@endsection