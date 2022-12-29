@extends('admin.layout.master')

@section('title')
    Order
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Orders
                        <small>List</small>
                    </h1>
                </div>
                <div class="form-group">
                    <form action="{{route('admin.order-detail.search')}}" method="post">
                        @csrf
                        <input name="search" class="input-search" placeholder="Order Code / Method / Status / Location / Date">
                        <button type="submit" class="btn-add-product btn btn-success">Search</button>
                    </form>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Add Product</a>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            @if (!empty($orders))
            <div style="overflow: scroll; width: 100%">
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Order Code</th>
                            <th>Customer Code</th>
                            <th>Customer</th>
                            <th>Total Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($orders as $index => $order)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>{{$order->Code}}</td>
                            <td>
                                @php
                                    $user = App\Models\User::where('id', $order->Customer_ID)->get();
                                    echo $user[0]->Code;
                                @endphp    
                            </td>
                            <td>{{$order->customer->Last_Name}}</td>
                            <td>{{ App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Quantity') }}</td>
                            <td>
                                @php
                                    $orderPrice = DB::table('orders_details')
                                                ->select(DB::raw('sum(Price * Quantity) as totalPrice'))
                                    ->where('Order_ID', $order->ID)
                                    ->get();
                                    echo '$'.$orderPrice[0]->totalPrice;
                                @endphp 
                            </td>
                            <th 
                            @if ($order->Status == 'Pending')
                                class="btn-success"
                            @elseif ($order->Status == 'Cancel')
                                class="btn-danger"
                            @elseif ($order->Status == 'Done')
                                class="btn-warning"
                            @endif
                            >{{$order->Status}}
                            </th>
                            <td>{{$order->Location}}</td>
                            <td>{{$order->payment->Method}}</td>
                            <td>{{$order->created_at}}</td>
                            <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.order-detail.detail', $order->ID)}}"> View</a></td>
                            <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="{{route('admin.order-detail.edit', $order->ID)}}"> Edit</a></td>
                        </tr>
                        @endforeach --}}

                        @foreach ($orders as $index => $order)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>{{$order->Order_Code}}</td>
                            <td>{{$order->Customer_Code}}</td>
                            <td>{{$order->Username}}</td>
                            <td>{{$order->TotalQuantity}}</td>
                            <td>{{$order->TotalPrice}}</td>
                            <th>
                                @if ($order->Status == 'Pending')
                                <a class="badge badge-warning">Pending</a>                               
                                @elseif ($order->Status == 'Cancel')
                                <span class="badge badge-danger">Cancel</span>  
                                @elseif ($order->Status == 'Done')
                                <span class="badge badge-success">Done</span>  
                                @endif
                            </th>
                            <td>{{$order->Location}}</td>
                            <td>{{$order->Method}}</td>
                            <td>{{$order->created_at}}</td>
                            <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.order-detail.detail', $order->ID)}}"> View</a></td>
                            <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="{{route('admin.order-detail.edit', $order->ID)}}"> Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $orders->links() !!}
            @endif
            {{-- {!! $product_details->links() !!} --}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection