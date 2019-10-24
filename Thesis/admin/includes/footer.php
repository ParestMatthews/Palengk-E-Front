</div>
</div>

<footer class="container-fluid text-center footer">
  <p>© <?php echo date("Y"); ?> Palengk-E All Rights Reserved</p>
</footer>

<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

$(document).ready(function(){
    $('.footer').css('margin-top', $(document).height() - ( $('.wrapper').height() + $('.footer').height()) + 100 );
});

</script>
</body>
</html>
