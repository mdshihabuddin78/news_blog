{{--@extends('backend.layouts.master')--}}

{{--@section('dashboard_content')--}}

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
{{--                    <a href="{{route('admin_catecreate')}}" class="btn btn-primary">Add New</a>--}}

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
{{--                        <tr v-for="(category, index) in categories" :key="category.id">--}}
{{--                            <th>@{{ index + 1 }}</th>--}}
{{--                            <th>@{{ category.category_name }}</th>--}}
{{--                            <th>@{{ category.details }}</th>--}}
{{--                            <th>--}}
{{--                                <a :href="`{{ url('/category/edit/') }}/${category.id}`" class="btn btn-warning">Edit</a>--}}
{{--                                <a @click="deleteCategory(category.id)" class="btn btn-danger">Delete</a>--}}
{{--                            </th>--}}
{{--                        </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        @section('script')--}}
{{--            <script src="{{ asset('backend/js/vue/vue.js') }}"></script>--}}
{{--            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}
{{--            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
{{--            <script>--}}
{{--                new Vue({--}}
{{--                    el: '#content',  // Match the id of the container--}}
{{--                    data: {--}}
{{--                        categories: []--}}
{{--                    },--}}
{{--                    mounted() {--}}
{{--                        this.getCategories();--}}
{{--                    },--}}
{{--                    methods: {--}}
{{--                        getCategories() {--}}
{{--                            axios.get('/api/categories')  // Use a relative URL--}}
{{--                                .then(response => {--}}
{{--                                    console.log('API Response:', response.data);--}}
{{--                                    this.categories = response.data.categories;--}}
{{--                                })--}}
{{--                                .catch(error => {--}}
{{--                                    console.error('Error fetching categories:', error);--}}
{{--                                });--}}
{{--                        },--}}
{{--                        deleteCategory(categoryId) {--}}
{{--                            Swal.fire({--}}
{{--                                title: 'Are you sure?',--}}
{{--                                text: "You won't be able to revert this!",--}}
{{--                                icon: 'warning',--}}
{{--                                showCancelButton: true,--}}
{{--                                confirmButtonColor: '#3085d6',--}}
{{--                                cancelButtonColor: '#d33',--}}
{{--                                confirmButtonText: 'Yes, delete it!'--}}
{{--                            }).then((result) => {--}}
{{--                                if (result.isConfirmed) {--}}
{{--                                    axios.delete(`/api/categories/${categoryId}`)--}}
{{--                                        .then(response => {--}}
{{--                                            this.getCategories(); // Refresh category list after deletion--}}
{{--                                            Swal.fire(--}}
{{--                                                'Deleted!',--}}
{{--                                                'Your category has been deleted.',--}}
{{--                                                'success'--}}
{{--                                            );--}}
{{--                                        })--}}
{{--                                        .catch(error => {--}}
{{--                                            console.error('Error deleting category:', error);--}}
{{--                                            Swal.fire(--}}
{{--                                                'Error!',--}}
{{--                                                'There was an error deleting the category.',--}}
{{--                                                'error'--}}
{{--                                            );--}}
{{--                                        });--}}
{{--                                }--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}


{{--            </script>--}}
{{--@endsection--}}
