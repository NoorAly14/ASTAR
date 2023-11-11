@extends('admin.admin_dashboard')
@section('admin')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Item </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Item </li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" method="post" action="{{ route('update.item') }}" enctype="multipart/form-data" >
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Category Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                                                <option selected="">Open this select menu</option>

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : ''  }}>{{ $category->category_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Partition Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <select name="partition_id" class="form-select mb-3" aria-label="Default select example">
                                                <option selected=""></option>

                                                @foreach($partition as $partitions)
                                                    <option value="{{ $partitions->id }}" {{ $partitions->id == $item->partition_id ? 'selected' : ''  }}>{{ $category->partition_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Item Name</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}"  />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Item price</h6>
                                        </div>
                                        <div class="form-group col-sm-9 text-secondary">
                                            <input type="text" name="item_price" class="form-control" value="{{ $item->item_price }}"  />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>



                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    category_id: {
                        required : true,
                    },
                    partition_id: {
                        required : true,
                    },
                    item_name: {
                        required : true,
                    },
                    item_price: {
                        required : true,
                    },
                },
                messages :{
                    category_name: {
                        required : 'Please Select Category Name',
                    },
                    partition_id: {
                        required : 'Please Select Partition Name',
                    },
                    item_name: {
                        required : 'Please Enter Item Name',
                    },
                    item_price: {
                        required : 'Please Enter Item Price',
                    },
                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('select[name="category_id"]').on('click', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/partition/ajax') }}/"+category_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="partition_id"]').html('');
                            var d =$('select[name="partition_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="partition_id"]').append('<option value="'+ value.id + '">' + value.partition_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>



@endsection
