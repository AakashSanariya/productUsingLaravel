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


