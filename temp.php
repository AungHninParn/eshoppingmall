<select class="custom-select mr-sm-2" name="subcategory_id">
							<option >Choose Subcategory</option>
		         		        @foreach($subcategories as $row)
				        			<option value="{{$row->id}}" @if($row->id==$item->subcategory_id) {{'selected'}} @endif >{{$row->name}}</option>

					        	@endforeach
						</select>
						----------
<ul class="menu-category">
                @foreach($categories as $category)
                <li class="dropdown-submenu">
                  <a href="#" class="droplink elc">{{$category->name}}<i class="fa fa-angle-right someicon"></i>
                  </a>
                  @if(count($category->subcategories)>0)
                    <ul class="menu-category sub-menu">
                        @foreach($category->subcategories as $subcategory)
                        <li class=""><a href="{{route('shop',$subcategory->id)}}" class="droplink">{{$subcategory->name}}</a></li>
                        @endforeach         
                    </ul>
                  @endif                 
                </li>
                @endforeach
              </ul>


              -------
              <select class="custom-select mr-sm-2" name="category_id">
						    <option selected>Choose Category</option>
					        @foreach($categories as $row)
				        	
				        	@if($row->id==$product->category_id)
				        			<option selected value="{{$row->id}}">{{$row->name}}</option>
				        			@else
				        			<option value="{{$row->id}}">{{$row->name}}</option>
				        			@endif
					        @endforeach
					</select>

					--------------
					<div class="md-form mb-3">

                  <label data-error="wrong" data-success="right" for="form32"></label>
                                      <select class="custom-select mr-sm-2" name="seller_id">
						    <option selected>Choose Seller</option>
					        @foreach($sellers as $row)

				        	<option value="{{$row->id}}">{{$row->name}}</option>
					        @endforeach
					</select>
                </div>



                --------------

      
$user = User::find(1);
            $message = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is our example notification tutorial',
            'thanks' => 'Thank you for visiting codechief.org!',
    ];

    $user->notify(new NotiMessage($message)); 



    {"data":"my test","user_id":"Hi Artisan"}     

{"data":"my test","user_name":{"id":4,"name":"hnin hnin","email":"hello@gae.com","email_verified_at":null,"phone":"09673456123","address":"yangon","created_at":"2020-07-08T08:12:51.000000Z","updated_at":"2020-07-08T08:12:51.000000Z"}}

{"data":"my test","user_name":"hnin hnin","seller_id":1}




    <!--  @foreach(Auth::user()->unreadNotifications as $notification)
              <a class="dropdown-item" href="{{route('orderlist')}}">
                     {{$notification->data['user_name']}} orderd your product.
              </a>
            @endforeach -->