@extends('layout/main')
@section('menu1', 'menu-open')
@section('Sub-menu-1', 'active-sidebar')
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
                <h1 class="m-0 text-bold" style="font-size: 26px;">Update Product</h1>
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
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-success">
                <div class="panel-body">
                    
                    <div>
                        <form method="POST" action="{{ url('edit-product-proses')}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <img src="{{ $dataProduct->images[4]}}" alt="foto" class="w-50 h-200">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <div class="">
                                                <img src="{{ $dataProduct->thumbnail}}" alt="" class="w-50 h-150">
                                            
                                                <h5  name="rating" id="rating" value="{{ $dataProduct->rating }}">Rating : {{ $dataProduct->rating }}</h5>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class=" row ">
                                                <div class="col-md-6">
                                                    <label class="form-label bold" for="nameType">Name</label>
                                                    <input name="titleProduct" id="titleProduct" class="form-control" value="{{ $dataProduct->title}}">
                                                    <input name="productId" type="hidden" value="{{ $dataProduct->id }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label bold" for="nameType">Price</label>
                                                    <input name="price" type="number" id="price" class="form-control" value="{{ $dataProduct->price }}">
                                                    <input name="price" type="hidden" value="{{ $dataProduct->id }}">
                                                </div>
                                            </div>
                                            <div>
                                                <label class="form-label bold" for="nameType">Description</label>
                                                <textarea name="descriptionProduct" type="textarea" id="descriptionProduct" class="form-control" value="{{ $dataProduct->description }}" cols="30" rows="10">{{ $dataProduct->description }}</textarea>
                                                <input name="productDescription" type="hidden" value="{{ $dataProduct->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <br />
                            <button class="btn btn-success btn-sm" type="submit">Save</button>
                            <a href="#">
                                <button class="btn btn-danger btn-sm" type="button">Cancel</button>
                            </a>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function () {
        $('.btn-success').on('click', function (e) {
            swal.fire({
                title: 'Confirm',
                text: 'Apakah anda ayakin?',
                showCancelButton: true,
                closeOnConfirm: true,
            }).then((willSend) => {
                if (willSend.isConfirmed) {
                    $('form').submit();
                }
            }),
        })
    });
</script>
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
