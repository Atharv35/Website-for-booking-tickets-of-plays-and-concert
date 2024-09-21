<?php
include 'admin/db_connect.php';

// Check if the 'id' parameter is set and numeric
$mov = $conn->query("SELECT * FROM concert where id =".$_GET['id'])->fetch_array();

?>

<header class="masthead">
    <div class="container pt-5">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/img/<?php echo $mov['cover_img'] ?>" alt="" class="reserve-img">
                </div>
                <div class="col-md-8">
                    <div class="card bg-primary">
                        <div class="card-body text-white">
                            <h3><b><?php echo $mov['title'] ?></b></h3>
                            <hr>
                            <p class=""><small><b>Description: </b><i><?php echo $mov['description'] ?></i></small></p>

                        </div>
                    </div>
                    <div class="card bg-light mt-2">
                        <div class="card-body">
                            <h4>Reserve your seat Here</h4>
                            <form action="" id="save-reserve">
                                <input type="hidden" name="concert_id" value="<?php echo $_GET['id'] ?>">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="" class="control-label">Lastname</label>
                                        <input type="text" name="lastname" required="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="" class="control-label">Firstname</label>
                                        <input type="text" name="firstname" required="" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="" class="control-label">Contact #</label>
                                        <input type="text" name="contact_no" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="" class="control-label">Theater</label>
                                        <select class="browser-default custom-select" name="ts_id">
                                            <option value=""></option>
                                            <?php 
                                                $qry = $conn->query("SELECT * FROM theater order by name asc");
                                                while($row = $qry->fetch_assoc()):
                                            ?>  
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="display-other">
                                    
                                </div>
                                <div class="row">
                                    <button type="submit" class="col-md-2 btn btn-block btn-primary">Book</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    $('[name="ts_id"]').change(function(){
        $.ajax({
            url:'manage_reservec.php?id='+$(this).val()+'&mid=<?php echo $_GET['id'] ?>',
            success:function(resp){
                $('#display-other').html(resp)
            }
        })
    })
    $(document).ready(function(){
        $('#save-reserve').submit(function(e){
            e.preventDefault(); // Prevent form submission

            $('#save-reserve button').attr('disabled', true).html("Saving...");

            $.ajax({
                url:'admin/ajax.php?action=save_reserv',
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp == 1){
                        alert("Reservation successfully saved");
                        location.replace('index.php');
                    }
                }
            });
        });
    });
</script>


<style>
    .card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
.card > hr {
  margin-right: 0;
  margin-left: 0;
}
.card > .list-group {
  border-top: inherit;
  border-bottom: inherit;
}
.card > .list-group:first-child {
  border-top-width: 0;
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}
.card > .list-group:last-child {
  border-bottom-width: 0;
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-body {
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1.25rem;
}

.card-title {
  margin-bottom: 0.75rem;
}

.card-subtitle {
  margin-top: -0.375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link:hover {
  text-decoration: none;
}
.card-link + .card-link {
  margin-left: 1.25rem;
}

.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}
.card-header + .list-group .list-group-item:first-child {
  border-top: 0;
}

.card-footer {
  padding: 0.75rem 1.25rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
  margin-right: -0.625rem;
  margin-bottom: -0.75rem;
  margin-left: -0.625rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.625rem;
  margin-left: -0.625rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.25rem;
}

.card-img,
.card-img-top,
.card-img-bottom {
  flex-shrink: 0;
  width: 100%;
}

.card-img,
.card-img-top {
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-bottom {
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-deck .card {
  margin-bottom: 15px;
}
@media (min-width: 576px) {
  .card-deck {
    display: flex;
    flex-flow: row wrap;
    margin-right: -15px;
    margin-left: -15px;
  }
  .card-deck .card {
    flex: 1 0 0%;
    margin-right: 15px;
    margin-bottom: 0;
    margin-left: 15px;
  }
}

.card-group > .card {
  margin-bottom: 15px;
}
@media (min-width: 576px) {
  .card-group {
    display: flex;
    flex-flow: row wrap;
  }
  .card-group > .card {
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .card:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-top,
.card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-bottom,
.card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-top,
.card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
.card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}

.card-columns .card {
  margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
  .card-columns {
    -moz-column-count: 3;
         column-count: 3;
    -moz-column-gap: 1.25rem;
         column-gap: 1.25rem;
    orphans: 1;
    widows: 1;
  }
  .card-columns .card {
    display: inline-block;
    width: 100%;
  }
}

.accordion > .card {
  overflow: hidden;
}
.accordion > .card:not(:last-of-type) {
  border-bottom: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.accordion > .card:not(:first-of-type) {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.accordion > .card > .card-header {
  border-radius: 0;
  margin-bottom: -1px;
}
</style>
