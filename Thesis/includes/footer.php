</div>
</div>

<footer class="container-fluid text-center footer">
  <p>© <?php echo date("Y"); ?> Palengk-E All Rights Reserved <a href="tos.php">Terms of Service</a> </p>
</footer>


<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

function detailsmodal(id){
  var data = {"id" : id};
  jQuery.ajax({
    url: '/Thesis/includes/detailsmodal.php',
    method: "post",
    data: data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#details-modal').modal('toggle');
    },
    error: function(){
      alert("someting when wrong!");
    }
  });
}


function update_cart(mode,edit_id){
  var data = {"mode":mode, "edit_id":edit_id};
  jQuery.ajax({
    url: '/Thesis/admin/parsers/update_cart.php',
    method: "post",
    data: data,
    success: function(){
      location.reload();
    },
    error: function(){
      alert("Something went wrong");
    }
  });
}


function add_to_cart(){
  jQuery('#modal_errors').html("");
  var quantity = parseInt(jQuery('#quantity').val());
  var stock = parseInt(jQuery('#stock').val());
  var error = '';
  var data = jQuery('#add_product_form').serialize();

  if (isNaN(quantity) || quantity < 1) {
    error += '<p class="text-danger text-center"> You must choose a quantity.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }
  else if (quantity > stock) {
    error += '<p class="text-danger text-center"> There is '+stock+' available.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }
  else{
    jQuery.ajax({
        url : '/Thesis/admin/parsers/add_cart.php',
        method : 'post',
        data: data,
        success: function(){
          location.reload();
        },
        error: function(){
          alert("Something went wrong");
        },
      });
    }

}

function add_to_cart2(){
  jQuery('#modal_errors').html("");
  var quantity = parseInt(jQuery('#quantity').val());
  var stock = parseInt(jQuery('#stock').val());
  var error = '';
  var data = jQuery('#add_product_form').serialize();

  if (isNaN(quantity) || quantity < 1) {
    error += '<p class="text-danger text-center"> You must choose a quantity.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }
  else if (quantity > stock) {
    error += '<p class="text-danger text-center"> There is '+stock+' available.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }
  else{
    jQuery.ajax({
        url : '/Thesis/admin/parsers/add_cart.php',
        method : 'post',
        data: data,
        success: function(){
          location.reload();
        },
        error: function(){
          alert("Something went wrong");
        },
      });
    }

}


$(document).ready(function(){
    $('.footer').css('margin-top', $(document).height() - ( $('.wrapper').height() + $('.footer').height()) + 100);
});

$('.close-div').on('click', function(){
    $(this).closest("#closediv").remove();
});

</script>

</body>
</html>
