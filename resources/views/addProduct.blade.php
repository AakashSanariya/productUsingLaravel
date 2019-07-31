@extends('app')
@section('content')
    <section class="content-header">
        <h1>
            Add Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"></li>
        </ol>
    </section>
    @if (Session::has('flash_message_success'))
        <div class="alert alert-success alert-block" id="flash">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session('flash_message_success') }}</strong>
        </div>
    @endif
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Select Category</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <h4 class="box-info">Select Category</h4>
                    {{Form::select('product',array('-1' => 'Please Select..')+$category,$categoryID,['class'=>'form-control','id' => 'category' ,'data-placeholder' => 'category','onchange' => 'fetchData()'])}}
                    {{--<select class="form-control select2" id="category" onchange="ajaxRecord()">
                        <option value="-1">Select Category</option>
                        @foreach($categoryName as $category)
                            <option value="{{ $category['id'] }}"
                            @if(isset($categoryId))
                                @if($categoryId == $category['id'])
                                    selected
                                @else

                                @endif
                            @endif
                            >{{ $category['name'] }}</option>
                        @endforeach
                    </select>--}}
                </div>
            </div>
        </div>
    </section>

    @if(isset($productInfo))
        <section class="content">
            <div class="box box-primary">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Product</h3>
                    </div>
                    <form role="form" action="{{ route('addproduct.update',['productId' => $productInfo['0']['product']['id']]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[name]" value="{{ $productInfo['0']['product']['name'] }}" placeholder="Enter Name">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[sku]" value="{{ $productInfo['0']['product']['sku'] }}" placeholder="Enter SKU">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[price]" value="{{ $productInfo['0']['price'] }}" placeholder="Enter Product Price">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[manuCity]" value="{{ $productInfo['0']['manuCity'] }}" placeholder="Enter Product Manufacturing City">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[pincode]" value="{{ $productInfo['0']['pincode'] }}" placeholder="Enter Pincode">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[gstNo]" value="{{ $productInfo['0']['gstNo'] }}" placeholder="Enter GST Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[mrp]" value="{{ $productInfo['0']['mrp'] }}" placeholder="Enter Product MRP">
                                </div>
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[batchNo]" id="datepicker" value="{{ $productInfo['0']['batchNo'] }}" placeholder="Enter Product Batch Number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="text" class="form-control" name="product[weight]" value="{{ $productInfo['0']['weight'] }}" placeholder="Enter Product Weight in KG">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="submit" class="btn btn-lg btn-primary" id="btnSubmit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif
    @include('ajaxrecordDisplay')
    <div id="record">
    </div>
@endsection
@section('scripts')
    <!-- For Selecting dropdown and display Product -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*Set Time Out For Flesh Message*/
            setTimeout(function(){
                $('#flash').remove();
            }, 5000);

            fetchData();

            /*Date  Picker*/
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
        function fetchData(){
            var categoryId = document.getElementById('category').value;
            if(categoryId == "-1"){
                document.getElementById("btnSubmit").disabled = true;
            }
            else{
                $.ajax({
                    url: '{{ url("recorddisplay") }}',
                    type: 'POST',
                    data: {categoryId: categoryId, "_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        $("#record").html(data);
                    }
                });
            }
        }
    </script>
@endsection


