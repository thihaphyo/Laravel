@extends('master.master')

@section('title', 'Order Listing')

@section('content')
    <script>
        $('document').ready(function () {



            var oTable = $('#DataTable').DataTable({


                processing: true,
                serverSide: true,
                "order": [[ 0, "desc" ]],
                ajax: {
                    url: 'GetOrderList',
                    data: function (d) {
                        d.daterange = "null";
                    }
                },
                columns: [
                    {data: 'order_id', name: 'order_id'},
                    {data: 'order_date', name: 'order_date'},
                    {data: 'current_status', name: 'current_status'},
                    {data: 'status_date' , name : 'status_date'},
                    {data: 'item_count' , name : 'item_count'},
                    {data: 'total_price' , name : 'total_price'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

            $('#search-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });



            $('#btn-add').on('click',function (e) {

                window.location="OrderEntry";
            });




        });

    </script>
    <div class="container content-body">
        <!--For Heading-->
        <div class="row">
            <div class="col-md-12">
                <h4 class="h4 heading-blue">Book Listing</h4>
            </div>
        </div>
        <form method="POST"  id="search-form">
            {{csrf_field()}}




            <div class="row datatable-content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4 pull-right">
                            <button type="button" class="btn btn-primary pull-right" id="btn-add">Add New Order</button>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="control-label">
                        Book List
                    </label>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="DataTable">
                        <thead>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Current Status</th>
                        <th>Status Date</th>
                        <th>Item Count</th>
                        <th>Total Price</th>
                        <th>Edit</th>
                        </thead>
                    </table>
                </div>
            </div>

        </form>
    </div>
@endsection