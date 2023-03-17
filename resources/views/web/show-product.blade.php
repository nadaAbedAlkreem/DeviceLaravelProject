 
 <style>
 .grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-gap: 5px;
   padding: 35px;
   margin-left : 8% ; 
}
.box{
    width:600px;
    margin:0 auto;
   }
.grid-container > div {
   text-align: center;
  padding: 15px 0;
  font-size: 30px;
}
 
</style>
@extends('web.layout.app')
@section('content')

 

  
<div class="maincontent-area">
        <!-- <div class="zigzag-bottom"></div> -->
<div class="container">
  <div class="row">
      <div class="latest-product">
          <div class="product-carousel">
                 <div id="item-lists">
                           @include('web.content-show-product')
                 </div>
             </div>
         </div>
    </div>
</div>

 
 @endsection

@section('ShowProductPaginationJs')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
 
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    
    $(document).ready(function()
    {     
                     

        $(document).on('click', '.pagination a',function(event)
        {
             event.preventDefault();
  
            $('.pagination a').removeClass('active');
            $(this).addClass('active');
  
            var myurl = $(this).attr('href');
 
            console.log(myurl);
            console.log(myurl.split('page='));
             var page= myurl.split('page=')[1];
              getData(page);

  
        });
  
    });
  
    function getData(page){
 
        $.ajax(
        {
            
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
      
 
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@stop
