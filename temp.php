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