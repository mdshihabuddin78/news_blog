@extends('backend.layouts.master')
@section('header')
    <link href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css" rel="stylesheet">
@endsection
@section('dashboard_content')
    <div id="content" class="span10">

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="#">Tables</a></li>
        </ul>

        <div class="row-fluid sortable">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h1 class="h5 mb-2 text-gray-800" style="padding: 20px;">Comment List</h1>
                </div>


            </div>
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content" id="viewBlock">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data, index) in datList" >
                            <th>@{{ index + 1 }}</th>
                            <th>@{{ data.visitor.name }}</th>
                            <th v-text="data.comment"></th>
                            <th>
                                <a @click="deleteComment(data)" class="btn btn-danger">
                                    Delete
                                </a>
                            </th>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div><!--/span-->

        </div><!--/row-->
@endsection

@section('script')
            <script src="{{asset('backend/js/vue/vue.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


            <script>
                var app = new Vue({
                    el: '#viewBlock',
                    data: {
                        message: 'Hello Vue!',
                        datList: [],
                    },
                    mounted(){
                        this.getDataList();
                    },




                    methods: {
                        getDataList: function () {
                            const _this = this;

                            axios.get(`${baseUrl}/api/comments_data`)
                                .then(function (response) {
                                    console.log(response.data);

                                    if (Array.isArray(response.data.result)) {
                                        _this.datList = response.data.result;
                                    } else {
                                        console.error('Unexpected data format:', response.data);
                                    }
                                })
                                .catch(function (error) {
                                    console.error('Error fetching data:', error);
                                });
                        },


            // const _this = this;
                            // var url = `${baseUrl}/api/comments_data`;
                            // httpReq(url, 'get', {}, function (retData) {
                            //     if(parseInt(retData.status) === 2000){
                            //         _this.datList = retData.result;
                            //     }else{
                            //         showToast(retData.message);
                            //     }
                            // });




                        deleteComment(data) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const _this = this;

                                    axios.post(`${baseUrl}/api/comments_data/delete`, { id: data.id })
                                        .then(function (response) {
                                            _this.getDataList();
                                            Swal.fire(
                                                'Deleted!',
                                                'Your comment has been deleted.',
                                                'success'
                                            );
                                        })
                                        .catch(function (error) {
                                            console.error('Error deleting comment:', error);
                                            Swal.fire(
                                                'Error!',
                                                'There was an error deleting the comment.',
                                                'error'
                                            );
                                        });
                                }
                            });
                        }
                    }

                })

                //         deleteComment : function (data){
                //             _this= this;
                //             Swi.fire({
                //                 title: "Are you sure to delete ??",
                //                 showDenyButton: true,
                //                 showCancelButton: true,
                //                 confirmButtonText: "OK",
                //             }).then((result) => {
                //                 if (result.isConfirmed) {
                //                     var url = `${baseUrl}/api/comments_data/delete`;
                //                     httpReq(url, 'post', {}, function (retData) {
                //                         showToast(retData.message);
                //                         _this.getDataList();
                //                     });
                //                 }
                //             });
                //         },
                //     },
                // })
            </script>
@endsection
