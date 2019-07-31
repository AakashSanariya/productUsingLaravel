@if(isset($product))
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Select Category</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <h4 class="box-info">Select Product</h4>
                <select class="form-control select2" onchange="editDetails()" id="productId">
                    <option selected value="-1">Please Select Product</option>
                    @foreach($product as $products)
                        <option value="{{ $products['id'] }}">{{ $products['name'] }}</option>
                    @endforeach
                        <option value="-2">Add Product</option>
                </select>
            </div>
        </div>
    </div>
</section>
    <section class="content">
        <div class="box box-primary" id="addProduct">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Product</h3>
                </div>
                <form role="form" action="{{ url('addproduct') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="product[name]" placeholder="Enter Name">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" name="product[sku]" placeholder="Enter SKU">
                            </div>
                            <div class="col-xs-4">
                                <input type="hidden" class="form-control" name="product[categoryId]"
                                       value="{{ $categoryId }}">
                            </div>
                            <div class="col-xs-4">
                                <input type="submit" class="btn btn-primary" id="btnSubmit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Product</h3>
                </div>

                <div class="box-body">
                    <table id="dataDisplay" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Manufac.City</th>
                            <th>Pincode</th>
                            <th>GST No</th>
                            <th>MRP</th>
                            <th>BatchNo</th>
                            <th>Weight</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($product))
                            @foreach($product as $products)
                                <tr>
                                    <td>{{ $products['name'] ? $products['name'] : 'Pending' }}</td>
                                    <td>{{ $products['sku'] ? $products['sku']: 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['price'] ? $products['ProductInformation']['price'] : 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['manuCity'] ? $products['ProductInformation']['manuCity'] : 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['pincode'] ? $products['ProductInformation']['pincode'] : 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['gstNo'] ? $products['ProductInformation']['gstNo'] : 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['mrp'] ? $products['ProductInformation']['mrp'] : 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['batchNo'] ? $products['ProductInformation']['batchNo'] : 'Pending' }}</td>
                                    <td>{{ $products['ProductInformation']['weight'] ? $products['ProductInformation']['weight'] : 'Pending' }}</td>
                                    <td>
                                        <button class="btn btn-primary"><a
                                                    href="{{ url('addproduct', ['id' => $products['ProductInformation']['id']]) }}">Edit</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <script src="{{ asset('js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#dataDisplay').DataTable();
        });
        $(document).ready(function () {
            var productId = document.getElementById("productId").value;
            if(productId == "-1"){
                $("#addProduct").hide();   
            }
        });
        function editDetails() {
            var productId = document.getElementById("productId").value;
            alert(productId);
            if(productId != "-1" && productId == "-2"){
                $("#addProduct").show();
            }
            else{
                $("#addProduct").hide();

            }
        }
        
    </script>
@endif