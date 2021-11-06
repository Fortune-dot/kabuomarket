 <!--reusable cards-->
 <div class="container mycards">
   <div class="row row-cols-1 row-cols-md-3 g-4">
     <?php
      //Get Heroku ClearDB connection information
      $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
      $cleardb_server = $cleardb_url["host"];
      $cleardb_username = $cleardb_url["user"];
      $cleardb_password = $cleardb_url["pass"];
      $cleardb_db = substr($cleardb_url["path"], 1);
      $active_group = 'default';
      $query_builder = TRUE;
      // Connect to DB
      $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db,);

      $sql = "SELECT * FROM drip";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        echo "<div class='card h-100 cardio'>";
        echo "<img src='./images/" . $row['image'] . "'>";
        echo "<p> Price:" . $row['price'] . "</p>";
        echo "<p> Location:" . $row['location'] . "</p>";
        echo "<p> Phone:" . $row['number'] . "</p>";
        echo "<p> Description:" . $row['text'] . "</p>";
      ?>
       <div class="card-footer bg-transparent border-success">
         <div class="btn-group" role="group" aria-label="Basic example">
           <button type="button" class="btn btn-primary">VERIFIED</button>
           <a href="<?php $rowi['number'];  ?>"><button type="button" class="btn btn-success">Call</button></a>
         </div>
       </div>
     <?php
        echo "</div>";
      }
      ?>

   </div>
 </div>
 </div>