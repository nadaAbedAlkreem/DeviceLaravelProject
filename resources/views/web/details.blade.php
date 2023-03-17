@extends('web.layout.app')
@section('content')
 

<style>
  /* ----- Variables ----- */
$color-primary: #4c4c4c;
$color-secondary: #a6a6a6;
$color-highlight: #ff3f40;
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
/* ----- Global ----- */
* {
	box-sizing: border-box;
}
.button {
  transition-duration: 0.4s;
}

.button:hover {
  background-color:#008CBA;  
  color: white;
}

html,
body {
	height: 100%;
}

body {
	display: grid;
	grid-template-rows: 1fr;
	font-family: "Raleway", sans-serif;
 }

h3 {
	font-size: 0.7em;
	letter-spacing: 1.2px;
	color: $color-secondary;
}

img {
			max-width: 100%;
			filter: drop-shadow(1px 1px 3px $color-secondary);
		}

/* ----- Product Section ----- */
.product {
	display: grid;
	grid-template-columns: 0.9fr 1fr;
	margin: auto;
	padding: 2.5em 0;
	min-width: 600px;
	background-color: white;
	border-radius: 5px;
}

/* ----- Photo Section ----- */
.product__photo {
	position: relative;
}

.photo-container {
	position: absolute;
	left: -2.5em;
	display: grid;
	grid-template-rows: 1fr;
	width: 100%;
	height: 100%;
	border-radius: 6px;
  margin-left:   85px;
	box-shadow: 4px 4px 25px -2px rgba(0, 0, 0, 0.3);
}

.photo-main {
	border-radius: 6px 6px 0 0;
  
	.controls {
 		padding: 0.8em;
		color: #fff;
 
	}
 
}

.photo-album {
	padding: 0.7em 1em;
	border-radius: 0 0 6px 6px;
	background-color: #fff; 

	ul {
		display: flex;
 	}

	li {
		float: left;
		width: 55px;
		height: 55px;
		padding: 7px;
		border: 1px solid $color-secondary;
		border-radius: 3px;
	}
}


/* ----- Informations Section ----- */
.product__info {
	padding: 0.8em 0;
  margin-left:  80px;

  
}

.title {
	h1 {
		margin-bottom: 0.1em;
 		font-size: 1.5em;
		font-weight: 900;
	}

	span {
		font-size: 0.7em;
		color: $color-secondary;
	}
}

.price {
	margin: 1.5em 0;
	color: $color-highlight;
	font-size: 1.2em;

	span {
		padding-left: 0.15em;
		font-size: 2.9em;
	}
}

.variant {
	overflow: auto;

	h3 {
		margin-bottom: 1.1em;
	}

	li {
		float: left;
		width: 35px;
		height: 35px;
		padding: 3px;
		border: 1px solid transparent;
		border-radius: 3px;
		cursor: pointer;

		&:first-child,
		&:hover {
			border: 1px solid $color-secondary;
		}
	}

	li:not(:first-child) {
		margin-left: 0.1em;
	}
}

.description {
	clear: left;
	margin: 2em 0;

	h3 {
		margin-bottom: 1em;
	}

	ul {
		font-size: 0.8em;
		list-style: disc;
		margin-left: 1em;
	}

	li {
		text-indent: -0.6em;
		margin-bottom: 0.5em;
	}
}
 

 .image {
  width:44% ; 
  height: 40% ; 

  
 }

 .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }

</style>

 
 <section class="product">
	<div class="product__photo">
		<div class="photo-container">
			<div class="photo-main" >
	 
        <div class="slideshow-container" >

        @if(!empty($infoProduct))
        @foreach($infoProduct as $row)
        @if(!empty($row->image))
        @foreach($row->image as $image)
        <div class="mySlides text-center"  > 
          <img src='{{asset("my_custom_symlink_1/$image->image_url") }}' class="image">
        </div>
			</div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
 
  @endforeach
 
		</div>
	</div>
	<div class="product__info">
  <a href="{{route('index')}}" >Home \</a>
  @if(!empty($row->category))
      <a href="">{{ $row->category->name }} \</a> 
    @endif
       <a href="">{{$row->name}}</a>
		<div class="title">
   
			<h1> {{$row->name}}</h1>
			<span>COD: {{$row->code}}</span>
      <span>
 
</span>

		</div>
		<div class="price">
			R$    
        @if(!empty($row->valueDiscount ))
           
    <?php   $discount_precent  = $row->price - ( $row->price * $row->valueDiscount ); 
                                 ?>
                                <div class="product-carousel-price">
                                    <ins> $ {{$discount_precent}}</ins> <del> $ {{$row->price}}</del>
                                </div> 
                                @endif     
                                @if(empty($row->valueDiscount ))
                             
                                <div class="product-carousel-price">
                                    <ins> $ {{$row->price}}</ins> 
                                </div> 
            @endif     
		</div>
 
		<div class="description">
  

                            <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p> {!! html_entity_decode($row->description) !!} </p>

                                             </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                <form id ="form-data" method = "post">
                                                    @csrf 
                                                    <input id = "id" name="id" value= "{{$row->id}}"  hidden>
                                                     <p><label for="email">Email</label> <input id = "email" name="email" type="email"></p>
                                                      <div class="rating-chooser">
                                                           <p>Your rating</p>
                                                           <span>
                                                           <fieldset class="rating">
                                                           <input type="radio" id="star5" name="rating" data-rating="5"  class = "submit_star"/><label class =  "submit_star full" for="star5" title="Awesome - 5 stars"></label>
                                                           <input type="radio" id="star4half" name="rating" data-rating="4.5" class ="submit_star"/><label class="submit_star   half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                                           <input type="radio" id="star4" name="rating" data-rating="4"  class = "submit_star"/><label class = "submit_star   full" for="star4" title="Pretty good - 4 stars"></label>
                                                           <input type="radio" id="star3half" name="rating" data-rating="3.5" class ="submit_star"/><label class="submit_star  half" for="star3half" title="Meh - 3.5 stars"></label>
                                                 <input type="radio" id="star3" name="rating" data-rating="3" class="submit_star" /><label class = "submit_star full" for="star3" title="Meh - 3 stars"></label>
                                                 <input type="radio" id="star2half" name="rating" data-rating="2.5" class ="submit_star" /><label class="submit_star  half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                                 <input type="radio" id="star2" name="rating" data-rating="2" class ="submit_star" /><label class = "submit_star full" for="star2" title="Kinda bad - 2 stars"></label>
                                                 <input type="radio" id="star1half" name="rating" data-rating="1.5" class = "submit_star" /><label class="submit_star  half" for="star1half" title="Meh - 1.5 stars"></label>
                                                 <input type="radio" id="star1" name="rating" data-rating="1" class ="submit_star"/><label class = "submit_star   full" for="star1" title="Sucks big time - 1 star"></label>
                                                 <input type="radio" id="starhalf"  name="rating" data-rating="0.5" class ="submit_star"/><label class="submit_star half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                                            </fieldset>
 
 
</span>         
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea id = "comment" name="comment"    cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit" class ="btn-submit"></p>
                                              </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
		</div>
		<button type="button"  class="btn btn-outline-light button">ADD TO CART</button>
    <button type="button" class="btn btn-outline-light button">ADD TO favrorite</button>
 
    @endif
    @endforeach
    @endif
	</div>
</div>
</section>
@endsection
     
    
@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
      $(document).ready(function() {
        var rating_data = 0;
        $(document).on('click', '.submit_star', function(){
 
           rating_data = $(this).data('rating');
           console.log(rating_data);
 
                });

       $('#form-data').submit(function(e){  
       e.preventDefault();
       $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }});
   
       var id_device = $("#id").val();
      var email = $("#email").val();
      var rating =	rating_data  ;
      var comment = $("#comment").val();
       if( email == ''){
            Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text: 'you should  fill email ',
                 })
 

                }
         if(rating == '' &&  comment == ''){
             Swal.fire({
                 icon: 'error',
                 title: 'Oops...',
                 text: 'you should  fill rate or comment ',
                 })
       }
         if( email  != '' && ( rating != '' ||  comment  != '')){
             console.log('YEStt');
  
               $.ajax(
                {
                  url: "/details/rate" ,
                   type: 'post',
                   contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                   dataType: "json",
                    data: {
            "id_device": id_device,
            "email": email,
            "rating": rating,
            "comment": comment,
            "_token": '{{csrf_token()}}'       
            },
        success: function (response){

            if(response.response){
             console.log('YES');

             Swal.fire(
               'Good job!',
                'You clicked the button!',
                'success')
     
          } 
        }
        , 
              error: function(xhr, ajaxOptions, thrownError){
                console.log(xhr);
                    alert(xhr.status);
                    alert(thrownError);
         } 
    });
  }
  
 
    
  
  });
    
 

    
});

 

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {


  
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
 
  // let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  // for (i = 0; i < dots.length; i++) {
  //   dots[i].className = dots[i].className.replace(" active", "");
  // }
  slides[slideIndex-1].style.display = "block";
  // dots[slideIndex-1].className += " active";
  // captionText.innerHTML = dots[slideIndex-1].alt;
}
// $(document).ready(function() {
//   $('#rateMe2').mdbRate();
// });

 

// });


</script>
@stop
 
