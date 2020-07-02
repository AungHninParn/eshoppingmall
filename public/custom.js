$(document).ready(function(){
	$('.mycustom').hide();

});
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