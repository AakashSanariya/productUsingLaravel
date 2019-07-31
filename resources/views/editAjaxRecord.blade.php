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
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap-datepicker.min.css") }}">
    <!-- datepicker -->
    <script src="{{ asset("js/bootstrap-datepicker.min.js") }}"></script>
    <script>
        /*Date  Picker*/
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endif