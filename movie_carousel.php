<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>







<?php 
  include 'admin/db_connect.php';
  $movies = $conn->query("SELECT * FROM movies where '".date('Y-m-d')."' BETWEEN date(date_showing) and date(end_date) order by rand() limit 10");
?>

     
<div class="animation">
      <center><h3 class="text-primary fade-in">Now Showing</h3></center>
    </div>
                 

<div id="movie-carousel-field">

  <div class="list-prev list-nav">
    <a href="javascript:void(0)" class="text"><i class="fa fa-angle-left"></i></a>
  </div>
  <div class="list">
    <?php while($row=$movies->fetch_assoc()): ?>
        <div class="movie-item">
          <img class="" src="assets/img/<?php echo $row['cover_img']  ?>" alt="<?php echo $row['title'] ?>" >
          <div class="mov-det">
            <button type="button" class="btn btn-primary" data-id="<?php echo $row['id'] ?>">Reserve Seat</button>
          </div>
        </div>
    <?php endwhile; ?>
  </div>
   <div class="list-next list-nav">
    <a href="javascript:void(0)" class="text"><i class="fa fa-angle-right"></i></a>
  </div>
</div>

<style>
  /* CSS animation */
  @keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  .fade-in {
    animation: fade-in 1s ease infinite alternate;
  }
</style>


<script>
  
  $('#movie-carousel-field .list-next').click(function(){
    $('#movie-carousel-field .list').animate({
    scrollLeft:$('#movie-carousel-field .list').scrollLeft() + ($('#movie-carousel-field .list').find('img').width() * 3)
   }, 'slow');
  })
  $('#movie-carousel-field .list-prev').click(function(){
    $('#movie-carousel-field .list').animate({
    scrollLeft:$('#movie-carousel-field .list').scrollLeft() - ($('#movie-carousel-field .list').find('img').width() * 3)
   }, 'slow');
  })
  $('.mov-det button').click(function(){
    location.replace('index.php?page=reserve&id='+$(this).attr('data-id'))
  })
</script>




        <!-- About-->
      
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">At Your Service</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Quality Shows</h3>
                            <p class="text-muted mb-0">Our shows are updated regularly!!!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Up to Date</h3>
                            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Ready to Deploy</h3>
                            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Made with Popularity</h3>
                            <p class="text-muted mb-0">Is it really open source if it's not made with popularity?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Download our App at Play Store!</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Partner with us & get listed on Book Entertainment!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2024 - BOOK ENTERTAINMENT</div></div>
        </footer>