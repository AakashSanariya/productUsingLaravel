@extends('app')
@section('content')
    <section class="content-header">
        <h1>
            Add Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Advanced Elements</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Select2</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <h4 class="box-info">Select Category</h4>
                    <select class="form-control select2" id="category">
                        @foreach($categoryName as $category)
                            <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </section>
    <div id="record"></div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function(){
            $("#category").change(function () {
                var categoryId = $("option:selected").val();
                $.ajax({
                    url: '{{ url("recorddisplay") }}',
                    type: 'POST',
                    data: {categoryId: categoryId, "_token": "{{ csrf_token() }}" },
                    success: function (data) {
                        alert(data);
                        $("#reord").html(data);
                    }
                });
            });
        });
    </script>
@endsection