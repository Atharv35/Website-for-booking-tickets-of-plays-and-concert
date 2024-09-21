<?php 
include 'admin/db_connect.php';
$concerts = $conn->query("SELECT * FROM concert WHERE '".date('Y-m-d')."' <= date_showing ORDER BY date_showing ASC");

echo '<header class="masthead"><div class="container-fluid"><div id="concerts">';
while($row = $concerts->fetch_assoc()): ?>
    <div class="concert-item">
        <img src="assets/img/<?php echo $row['cover_img'] ?>" alt="<?php echo $row['title'] ?>">
        <div class="concert-details">
            <h5><?php echo $row['title'] ?></h5>
            <p>Show Date: <?php echo $row['date_showing'] ?></p>
            <button type="button" class="btn btn-primary" data-id="<?php echo $row['id'] ?>">View Seats</button>
        </div>
    </div>
<?php endwhile;
echo '</div></div></header>';
?>

<script>
$('.concert-details button').click(function(){
    location.href = 'index.php?page=reserve_concert&id=' + $(this).attr('data-id');
})
</script>