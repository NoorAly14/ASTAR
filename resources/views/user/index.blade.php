@extends('user.user_dashboard')
@section('user')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Cateagory</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>

                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <hr/>
        @php
            $category = \App\Models\Category::get();
        @endphp

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach($category as $key => $categories )
                        <tr>

                            <td> {{$key+1}}  </td>
                            <td>{{ $categories->category_name }}</td>
                            <td>
                                <a href="{{ route('view.partition',$categories->id) }}" class="btn btn-info">View </a>


                            </td>
                        </tr>

                      @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name </th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>




@endsection
