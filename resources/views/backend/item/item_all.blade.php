@extends('admin.admin_dashboard')
@section('admin')


    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Item</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Item</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.item') }}" class="btn btn-primary">Add Item</a>


                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name </th>
                            <th>Partition Name </th>
                            <th>Item Name </th>
                            <th>Item Price </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $key => $item)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $item->category->category_name}}</td>
                                <td> {{ $item->partitions->partition_name}}</td>
                                <td> {{ $item->item_name }}</td>
                                <td> {{ $item->item_price }}</td>
                                <td>
                                    <a href="{{ route('edit.item',$item->id) }}  " class="btn btn-info">Edit</a>
                                    <form action="{{ route('delete.item',$item->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" id="delete" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name </th>
                            <th>Partition Name </th>
                            <th>Item Name </th>
                            <th>Item Price </th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>



@endsection
