<div id="tag_container">
                          <div class="grid-container">
                             @if(!empty($data))
                             @foreach($data as $row)
                             <div class="single-product">
                                 <div class="product-f-image">
                                      @foreach($row->image as $image)
 
                                     @if($image->is_main == 1)
                                     <img  src='{{asset("my_custom_symlink_1/$image->image_url") }}'alt="">
                                      @endif
                                      @endforeach 
                                      <div class="product-hover">
                                        <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="{{route('details', ['id' =>$row->id  ])}}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                      </div>
                                 </div>            
                             </div>
                                       @endforeach
                                           @endif
                                           <div class="d-flex justify-content-center"> 
                                           <div class = "pagination">      {!! $data->links()   !!}  </div>
                                           </div>
 
                           
                            </div>
 </div>