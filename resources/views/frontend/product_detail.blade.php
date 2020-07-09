@extends('frontend.master')
@section('content')
  <div class="container">
    <h2 class="text-center">Product Detail</h2>
    <div class="row">

      <div class="col-md-7">
 <div class="card">

  <img class="card-img-bottom" src="{{asset($product->photo)}}" alt="Product Photo" style="height: 300px; width: 300px;">
</div>
    </div>
    <div class="col-md-5">
      <table class="table">
        <th>
          <h3>{{$product->name}}</h3>
        </th>
        <tr>
          <td>Price</td>
          <td>{{$product->price}} Ks</td>
        </tr>
        <tr>
          <td>Category</td>
          <td>{{$product->seller->category->name}}</td>
        </tr>
        <tr>
          <td>Shop Name</td>
          <td>{{$product->seller->name}}</td>
        </tr>
        <tr>
          <td>Description</td>
          <td>{{$product->description}}</td>
        </tr>
        <tr>
          <td style="vertical-align: middle;">Quantity</td>
          <td><button class="btn btn-outline-secondary plus_btn" data-id="${i}"><i class="fas fa-plus"></i></button>           
            1        
            <button class="btn btn-outline-secondary minus_btn" data-id="${i}"><i class="fas fa-minus"></i></button></td>
        </tr>
        <tr>
          <td>
            <button data-id="{{$product->id}}" data-name="{{$product->name}}" data-photo="{{$product->photo}}" data-price="{{$product->price}}" data-discount="{{$product->discount}}" 
            data-sellerid="{{$product->seller_id}}" class="btn btn-indigo addtocart">Add to cart</button>
          </td>
          <td>
             <button type="button" class="btn btn-outline-info btn-rounded waves-effect">Buy Now</button>
          </td>
       </tr>
      </table>
    </div>
  </div>
</div>

<!-- Related product -->
<section class="details-card mt-5">
  <div class="container">

      <div class="text-center">
        <h3 >Related Products</h3>
      </div>

   <div class="row">
    @foreach ($relatedProducts as $relatedProduct)
    <div class="col-md-3">
      <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">{{$relatedProduct->name}}
          <p class="card-text">{{$relatedProduct->price}} Ks</p></div>
          
          <div class="card-img">
            <img src="{{asset($relatedProduct->photo)}}" style="width: 252px; height: 200px;">
            <div class="card-footer bg-transparent border-success text-center"><a href="#" class="btn btn-primary">Buy</a></div>
          </div>

        </div>
      </div>
      @endforeach
    </div>
    
  </div>
</section>

@endsection