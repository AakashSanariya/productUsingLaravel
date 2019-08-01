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