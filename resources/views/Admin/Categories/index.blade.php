@extends('layouts.control_panel_layout')


@section('title','Universities')


@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Course Types</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Categories</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Categories</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                @can('add-course-category')
                                    <button class="btn btn-primary" onclick="addCategory()">Add New Category</button>
                                @endcan
                            </div>
                        </div>
                        <ul class="list-group">
                            @forelse($categories as $category)
                                <li class="list-group-item">{{$category->name}}

                                    <span class="float-right">

                                        @can('edit-course-category')
                                            <a href="javascript:void(0)" onclick="editCategory({{$category->id}})"
                                               title="Edit {{$category->name}}" class="mr-3"><i
                                                    class="fas fa-edit"></i></a>
                                        @endcan

                                        @can('delete-course-category')
                                            <form id="delete-category{{$category->id}}"
                                                  action="{{route('admin.categories.destroy',$category->id)}}"
                                                  method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <a href="#"
                                               title="Delete {{$category->name}}"
                                               onclick="deleteCategory({{$category->id}})"><i
                                                    class="fas fa-trash"></i></a>
                                        @endcan

                                    </span>

                                </li>
                            @empty
                                <p>There is No Categories</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script>

        function addCategory() {
            swal({
                title: "Create Category",
                text: "Enter Category name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Name"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                if (inputValue.length < 3) {
                    swal.showInputError("The Name length must be Grater than 3 characters !");
                    return false
                }
                $.ajax({
                    url: `/admin/categories`,
                    method: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'name': `${inputValue}`
                    },
                    success(data) {
                        if (data['status']) {
                            swal('Success', data['message'], 'success');
                            setTimeout(function () {
                                location.reload()
                            }, 2000);
                        }
                    }
                });
            });
        }

        function editCategory(id) {
            swal({
                title: "Update Category",
                text: "Enter New name :",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Name"
            }, function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                if (inputValue.length < 3) {
                    swal.showInputError("The Name length must be Grater than 3 characters !");
                    return false
                }
                $.ajax({
                    url: `/admin/categories/${id}`,
                    method: 'PUT',
                    data: {
                        '_token': '{{csrf_token()}}',
                        '_method': 'PUT',
                        'name': `${inputValue}`
                    },
                    success(data) {
                        if (data['status']) {
                            swal('Success', data['message'], 'success');
                            setTimeout(function () {
                                location.reload()
                            }, 2000);
                        }
                    }
                });

            });
        }

        function deleteCategory(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Category",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-category' + id).submit();
            });
        }

    </script>
@endsection
