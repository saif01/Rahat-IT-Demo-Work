@extends('admin.layouts.master')
@section('title', 'Admin Demo Deleted')

@push('styles')
<link rel="stylesheet" href="{{ asset('all-assets/common/export-datatable/css/1.10.21/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('all-assets/common/summernote/summernote-lite.css')}}" >

@endpush



@section('content')

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Deleted Demo's </h4>

                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard table-responsive">
                        <table id="jsDataTable" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Deleted By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection


@push('scripts')

<script src="{{ asset('all-assets/common/export-datatable/js/1.10.21/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('all-assets/common/export-datatable/js/1.10.21/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('all-assets/common/summernote/summernote-lite.min.js')}}"></script>



<script type="text/javascript">


    $(document).ready(function(){

        //All Data
        $('#jsDataTable').DataTable({
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw green"></i><span class="sr-only">Loading...</span> '},
            processing: true,
            serverSide: true,
            pagingType: "full_numbers",
            stateSave: true,

            ajax: {
                url: "deleted",
            },
            columns: [

                {
                    data: 'details',
                    name: 'details',

                },
                {
                    data: 'deleteInfo',
                    name: 'deleteInfo',

                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    "searchable": false,
                    "width": "10%"
                }
            ]
        });




         //Delete
        $(document).on('click', '.delete', function(){

            let id = $(this).attr('id');

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value)
                {
                    $.ajax({
                        url: "delete-permanent/"+id,
                        method: 'get',
                        success:function(data){
                            //console.log(data);
                            if(data.success){
                                //Datatable Reload
                                $('#jsDataTable').DataTable().ajax.reload(null, false);

                                //Sweet alert
                                Swal.fire({
                                    position: 'center',
                                    icon: data.icon,
                                    title: data.success,
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                            }else{
                                console.log(data);
                            }
                        },
                        error:function(data){
                            console.log(data);
                        }
                    });

                }

            });

        })
        //End Delete


        //Restore
        $(document).on('click', '.restore', function(){

            let id = $(this).attr('id');

            Swal.fire({
            title: 'Are you sure?',
            text: "You want to restore this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'green',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore it!'
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "restore/"+id,
                        method: 'get',
                        success:function(data){
                            //console.log(data);
                            if(data.success){
                                //Datatable Reload
                                $('#jsDataTable').DataTable().ajax.reload(null, false);

                                //Sweet alert
                                Swal.fire({
                                    position: 'center',
                                    icon: data.icon,
                                    title: data.success,
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                            }else{
                                console.log(data);
                            }


                        },
                        error:function(data){
                            console.log(data);
                        }
                    });

                }
            });

        });
        //End Restore




    });



</script>


@endpush
