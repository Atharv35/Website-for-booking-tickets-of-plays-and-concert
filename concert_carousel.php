<?php 
  include 'admin/db_connect.php';
  $today = date('Y-m-d');
  $concerts = $conn->query("SELECT * FROM concert WHERE date_showing > '$today' ORDER BY date_showing ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    background-color: #1a1a1a; /* Dark background for theater ambiance */
}

#concert-carousel-field {
    position: relative;
    width: 90%; /* Control overall carousel width */
    margin: 100px auto; /* Center-align the carousel */
    overflow: hidden; /* Hide any overflow */
    background: #000; /* Black background for better visibility of content */
    flex-grow: 1;
}

#concert-carousel-field .list {
    display: flex;
    justify-content: flex-start; /* Align items to the start of the flex container */
    align-items: center; /* Vertical alignment */
    overflow-x: auto; /* Horizontal scrolling */
    padding: 40px 0; /* Vertical padding */
}

#concert-carousel-field .movie-item {
    flex: none; /* Do not allow flex sizing */
    width: 200px; /* Fixed width for each item */
    margin-right: 20px; /* Space between items */
    position: relative; /* Needed for positioning inner elements absolutely */
    transition: box-shadow 0.3s ease; /* Smooth transition for shadow */
    border-radius: 8px; /* Rounded corners for aesthetics */
    overflow: hidden; /* Ensures no content spills out */
}

#concert-carousel-field .movie-item img {
    width: 100%; /* Ensure image covers the full width of its container */
    height: 300px; /* Fixed height for uniformity */
    object-fit: cover; /* Ensures the image covers the area without distortion */
    display: block; /* Removes bottom space/gap */
}

#concert-carousel-field .movie-item:hover {
    box-shadow: 0 4px 8px rgba(255,255,255,0.5); /* Adds a light shadow effect on hover */
}

#concert-carousel-field .mov-det {
    position: absolute;
    width: 100%; /* Full width of the parent */
    bottom: 0; /* Align to the bottom */
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent overlay */
    color: white; /* Text color */
    text-align: center; /* Center text alignment */
    padding: 10px; /* Padding for text */
    transition: transform 0.3s ease, opacity 0.3s ease; /* Smooth transition for transform and opacity */
    transform: translateY(100%); /* Initially hidden by translating down */
    opacity: 0; /* Initially transparent */
}

#concert-carousel-field .movie-item:hover .mov-det {
    transform: translateY(0); /* Move into visible position */
    opacity: 1; /* Make fully opaque */
}

.list-prev, .list-next {
    position: absolute;
    top: 50%; /* Center vertically */
    z-index: 10; /* Ensure they are above other content */
    color: #fff; /* Icon color */
    cursor: pointer; /* Cursor indicates clickable */
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background for visibility */
    padding: 10px 20px; /* Clickable area */
    border-radius: 50%; /* Rounded shape */
    transform: translateY(-50%); /* Perfect vertical centering */
}

.list-prev { left: 10px; }
.list-next { right: 10px; }

.fa {
    font-size: 24px; /* Icon size */
}
.text-primary {
        margin: 60px 0; /* Vertical margin for "Now Showing" heading */
    }

    @keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  .fade-in {
    animation: fade-in 1s ease infinite alternate;
  }
    </style>
</head>
<body>
  

     
<div class="animation">
      <center><h3 class="text-primary fade-in">Now Showing</h3></center>
    </div>

<div id="concert-carousel-field">

  <div class="list-prev list-nav">
    <a href="javascript:void(0)" class="text"><i class="fa fa-angle-left"></i></a>
  </div>
  <div class="list">
    <?php while($row=$concerts->fetch_assoc()): ?>
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

<script>
  
  $('#concert-carousel-field .list-next').click(function(){
    $('#concert-carousel-field .list').animate({
    scrollLeft:$('#concert-carousel-field .list').scrollLeft() + ($('#concert-carousel-field .list').find('img').width() * 3)
   }, 'slow');
  })
  $('#concert-carousel-field .list-prev').click(function(){
    $('#concert-carousel-field .list').animate({
    scrollLeft:$('#concert-carousel-field .list').scrollLeft() - ($('#concert-carousel-field .list').find('img').width() * 3)
   }, 'slow');
  })
  $('.mov-det button').click(function(){
    location.replace('index.php?page=reserve_concert&id='+$(this).attr('data-id'))
  })
</script>
<footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © 2024 - BOOK ENTERTAINMENT</div></div>
        </footer>

</body>
</html>