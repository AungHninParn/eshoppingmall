$(document).ready(function(){
  showTable();
	$('.mycustom').hide();
  cartnoti();

  $('.addtocart').on('click',function(){
    //alert('ok');
    var id=$(this).data('id');
    var name=$(this).data('name');
    var photo=$(this).data('photo');
    var price=$(this).data('price');
    var discount=$(this).data('discount');
    var userid=$(this).data('userid');
    var sellerid=$(this).data('sellerid');

    var product={
    id:id,
    name:name,
    price:price,
    photo:photo,
    discount:discount,
    qty:1,
    userid:userid,
    sellerid:sellerid
    }

  //console.log(product);

  var productString=localStorage.getItem("productlist");
  var productArray;

  if (productString==null) {
    productArray=Array();
  }else{
    productArray=JSON.parse(productString);
  }

  var status=false;
//  var sellerArr=Array();



  $.each(productArray,function(i,v){
    if (id==v.id) {
      status=true;
      v.qty++;
    }
    // if(sellerid!=v.sellerid){
    //   sellerArr.push(v.sellerid);
    // }
  })

  if(!status){
    productArray.push(product);

  }

  var productData=JSON.stringify(productArray);
  localStorage.setItem("productlist",productData);
  cartnoti();

  });//end of add to cart


function cartnoti(){
  var productString=localStorage.getItem("productlist");

  if (productString) {
    var productArray=JSON.parse(productString);
    var noti=productArray.length;

    $('.cartnoti').show();
    $('.cartnoti').html(noti);
  }else{
    $('.cartnoti').hide();
  }
}//end of  cartnoti


//cart page
$('.cart_show').on('click',function(){
  showTable();
  cartnoti();
}); //end of cart page

//remove product
$('#cart_table').on('click','.remove_btn',function(){

  var id=$(this).data('id');

  var productString=localStorage.getItem("productlist");
  var productArray=JSON.parse(productString);
  productArray.splice(id,1);
  var cart=JSON.stringify(productArray);

  localStorage.setItem("productlist",cart);
  showTable();
  cartnoti();
});

//add quantity
$('#cart_table').on('click','.qtyplus',function(){


  var id=$(this).data('id');
  var productString=localStorage.getItem("productlist");
  var productArray=JSON.parse(productString);
    $.each(productArray,function(i,v){
      if (i==id) {
        v.qty++;
      }
    })
    var cart=JSON.stringify(productArray);
    localStorage.setItem("productlist",cart);
    showTable();
    cartnoti();
});

//sub quantity
$('#cart_table').on('click','.qtyminus',function(){

  var id=$(this).data('id');

  var productString=localStorage.getItem("productlist");
  var productArray=JSON.parse(productString);
    $.each(productArray,function(i,v){
      if (i==id) {
        v.qty--;
        if (v.qty==0) {
          productArray.splice(id,1);
        }
      }
    })
    var cart=JSON.stringify(productArray);
    if(cart!='[]'){
      localStorage.setItem("productlist",cart);
    showTable();
    cartnoti();
  }else{
    localStorage.setItem("productlist",cart);
    location.reload();
  }
    
});

function showTable(){
 
  var productString=localStorage.getItem("productlist");
    if(productString!='[]' && productString){

    var productArray=JSON.parse(productString);
    if(productArray !=0){

      var mytable='';
      var total=0;

      $.each(productArray, function(i,v){
        if (v) {
          var id=v.id;
          var name=v.name;
          var photo=v.photo;
          var price=v.price;
          var discount=v.discount;
          var photo=v.photo;
          var qty=v.qty;
          var subtotal=qty*price;
          total+=subtotal;

       mytable+=`<tr>
                <td>
                  ${name}
                </td>
                <td>
                  ${price}
                </td>
               <td>
                  <button class="qtyminus" data-id="${i}" type="button"><i class="fa fa-minus"></i></button>
                          <input class="quantity text-center" min="0" name="quantity" value="${qty}" type="number" style="width: 50px;">
                          <button class="qtyplus" data-id="${i}" type="button"><i class="fa fa-plus"></i></button>
                </td>
                <td>
                  ${subtotal}
                </td>
                </tr>
              `;
        }
          
      }); //end each


    $('#cart_table').html(mytable); 
    
    $('#total').html(total);
    }
    
  }
  else{

     $('.checkout_btn').hide();
     localStorage.clear();
  }
}//end of show table

$('.checkout_btn').click(function(){

  let loStr=localStorage.getItem('productlist');
  let note=document.getElementById("note").value;//get note from input
  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
    });
  $.post('/orders',{data:loStr,note:note},function(response){
    //console.log(response);
    alert(response.status);
    localStorage.clear();
    location.reload();
  
  })
});//end of checkout table

}); //end of document



//for registration
function myFunction() {
      var e = document.getElementById("status");
      var user = e.options[e.selectedIndex].value;
    //  alert(user);
      
      if(user==2){
        $('.mycustom').show();
      }
      else{
        $('.mycustom').hide();
      }
     
    }
	
//for notifications
function markNotificationAsRead(){
  $.get('/markasRead');
}