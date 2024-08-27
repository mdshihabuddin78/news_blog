@extends('backend.layouts.master')
<link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">

@section('dashboard_content')
    <div id="content" class="span10">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="#">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Tables</a></li>
        </ul>

        <div id="viewBlock">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="h5 mb-2 text-gray-800">Category List</h1>
                </div>
                <div class="col-md-6 text-right">
                    <button @click="Modal()" class="btn btn-primary">Add New</button>
                </div>
            </div>

            <div class="box">
                <div class="box-header">
                    <h2><i class="halflings-icon user"></i>Members</h2>
                </div>
                <div class="box-content">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Si</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in datList">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ data.category_name }}</td>
                            <td>@{{ data.details }}</td>
                            <td>
                                <button @click="Modal(data)" class="btn btn-warning">Edit</button>
                                <button @click="destroyData(data)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="categoryModal"  role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <span v-if="editMode">Update Category</span>
                                <span v-else>Add Category</span>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
{{--                        <div class="modal-header">--}}
{{--                            <h4 class="modal-title">@{{ isEditMode ? 'Update Category' : 'Add Category' }}</h4>--}}
{{--                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                        </div>--}}
                        <div class="modal-body">
                            <form @submit.prevent="submit">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input v-model="categoryForm.category_name" id="categoryName" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="categoryDetails">Details</label>
                                    <textarea v-model="categoryForm.details" id="categoryDetails" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-secondary" @click="ClearForm">Clear</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend/js/vue/vue.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        new Vue({
            el: '#viewBlock',
            data: {
                datList: [],
                categoryForm: { category_name: '', details: '' },
                editMode: false,
            },
            methods: {
                getDataList() {
                    axios.get(`${baseUrl}/api/category_api`)
                        .then(response => {
                            if (response.data.status === 2000) {
                                this.datList = response.data.result;
                            } else {
                                this.showToast(response.data.message);
                            }
                        })
                        .catch(() => this.showToast("Error fetching data."));
                },
                Modal(category = {}) {
                    this.editMode = !!category.id;
                    this.categoryForm = { ...category };
                    $('#categoryModal').modal('show');
                },
                submit() {

                    if (this.editMode) {
                        url = `${baseUrl}/api/category_api/${this.categoryForm.id}`;
                        method = 'PUT';
                    } else {
                        url = `${baseUrl}/api/category_api`;
                        method = 'POST';
                    }


                    axios({ method, url, data: this.categoryForm })
                        .then(response => {
                            if (response.data.status === 2000) {
                                this.showToast(response.data.message);
                                this.getDataList();
                                $('#categoryModal').modal('hide');
                            } else {
                                this.showToast(response.data.message);
                                $('#categoryModal').modal('hide');
                            }
                        })
                        .catch(() => this.showToast("Error submitting form."));
                },

                destroyData(data) {
                    if (confirm('Are you sure you want to delete this category?')) {
                        axios.delete(`${baseUrl}/api/category_api/${data.id}`)
                            .then(response => {
                                if (response.data.status === 2000) {
                                    this.showToast(response.data.message);
                                    this.getDataList();
                                } else {
                                    this.showToast(response.data.message);
                                }
                            })
                            .catch(() => this.showToast("Error deleting data."));
                    }
                },
                ClearForm() {
                    this.categoryForm = { category_name: '', details: '' };
                },
                showToast(message) {
                    $.toast({
                        heading: 'Notification',
                        text: message,
                        showHideTransition: 'slide',
                        icon: 'info',
                        position: 'top-right'
                    });
                }

            },
            mounted() {
                this.getDataList();
            }
        });
    </script>
@endsection



































{{--    <div id="content" class="span10">--}}

{{--        <ul class="breadcrumb">--}}
{{--            <li>--}}
{{--                <i class="icon-home"></i>--}}
{{--                <a href="index.html">Home</a>--}}
{{--                <i class="icon-angle-right"></i>--}}
{{--            </li>--}}
{{--            <li><a href="#">Tables</a></li>--}}
{{--        </ul>--}}

{{--        <div class="row-fluid sortable">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 text-left">--}}
{{--                    <h1 class="h5 mb-2 text-gray-800" style="padding: 20px;">Category_List</h1>--}}
{{--                </div>--}}
{{--                <div class="col-md-6 text-right mb-2">--}}
{{--                    <a href="{{route('cat.add')}}" class="btn btn-primary">Add New</a>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="box span12">--}}
{{--                <div class="box-header" data-original-title>--}}
{{--                    <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>--}}
{{--                    <div class="box-icon">--}}
{{--                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>--}}
{{--                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>--}}
{{--                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="box-content">--}}

{{--                    <table class="table table-striped">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">Si</th>--}}
{{--                            <th scope="col">Name</th>--}}
{{--                            <th scope="col">Details</th>--}}
{{--                            <th scope="col">Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}
{{--                        @foreach($category as $key => $value)--}}
{{--                            <tr>--}}
{{--                                <th>{{$value->id}}</th>--}}
{{--                                <th>{{$value->category_name}} </th>--}}
{{--                                <th>{{$value->details}}</th>--}}
{{--                                <th>--}}
{{--                                    <a href="{{route('cat.edit',$value->id)}}" class="btn btn-warning">Edit</a>--}}
{{--                                    <a onclick="confirm('Are You Sure Delete')" href="{{route('cat.delete',$value->id)}}" class="btn btn-danger">Delete</a>--}}
{{--                                </th>--}}
{{--                            </tr>--}}


{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div><!--/span-->--}}

{{--        </div><!--/row-->--}}
{{--@endsection--}}