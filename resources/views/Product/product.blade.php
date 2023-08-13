@extends('layout/main')
@section('menu3', 'menu-open')
@section('Sub-menu-3', 'active-sidebar')
<!--===================== TITLE =====================-->
@section('title')
CMS Laravel
@endsection
<!--===================== END =====================-->

<!--===================== CONTENT =====================-->
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-bold" style="font-size: 26px;">Produk</h1>
            </div>
            <!--<div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                  </div>-->
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/createProducts') }}">
                            <button class="btn btn-primary mb-3">Tambah +</button>
                        </a>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Rating</th>
                                    {{-- <th>Images</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataProduct as $product)
                                <tr>
                                    <th>{{ $no++}}</th>
                                    {{-- <th>{{ $product['title']}}</th>
                                    <th>{{ $product['price']}}</th>
                                    <th>{{ $product['stock']}}</th>
                                    <th>{{ $product['rating']}}</th> --}}
                                    <th>{{ $product->title}}</th>
                                    <th>{{ $product->price}}</th>
                                    <th>{{ $product->stock}}</th>
                                    <th>{{ $product->rating }}</th>
                                    {{-- <th><img src="{{ $product['thumbnail']}}" alt="" class="w-25 h-25"></th> --}}
                                    <th>
                                        <a href="{{ url('/updateProduct/'.$product->id) }}" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/deleteProducts/'.$product->id)  }} " onclick="return confirm('Apakah yakin Akan menghapus {{ $product->title}} ?')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </th>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <script>
    $(document).ready(function () {
        var table_simulasi = $('#example').DataTable({
                    'deferRender': true,
                    //'pageLength'  : 10,
                    "paging": true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': false,
                    'info': true,
                    'autoWidth': true,
                    'scrollX': false,
                    sDom: 'lrtip',
                    processing: true,
                    serverSide: true,
                    pagingType: 'full_numbers',
                    ajax: function ( data, callback, settings ) {                    
                        var search = $('.InputSearch').val();
                        var filter = $('#filtersimulasi option:selected').val();
                        var sort = $('#sortsimulasi option:selected').val();
                        $.ajax({
                        url: "{{ url('/getListSubMenu1') }}",
                        // dataType: 'text',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: JSON.stringify({'page': ((data.start / 10)+1), "filteredBy" : filter, "sortBy" : sort, "search" : search}),
                        dataType: 'json',
                        contentType: 'application/json',
                        type: 'post',
                        success: function( data, textStatus, jQxhr ){
                            callback({
                                // draw: data.draw,
                                data: data.data,
                                recordsTotal:  data.totalData,
                                recordsFiltered:  data.totalData
                            });
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                        }
                        });
                    },
                    columns: [
                        { data: "First_name" },
                        { data: "Last_name" },
                        { data: "Position" },
                        { data: "Office" },
                        { data: "Start_date" },
                        { data: "Salary" },
                    ]
            });
    });
</script> --}}
@endsection
<!--===================== END =====================-->
