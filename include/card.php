 <!--reusable cards-->
 <div class="container mycards">
   <div class="row row-cols-1 row-cols-md-3 g-4">
     <?php
      $db = mysqli_connect("localhost", "root", "", "photos");
      $sql = "SELECT * FROM images";
      $sqli = "SELECT * FROM details";
      $electronics = True;
      $otherresults = mysqli_query($db, $sqli);
      $result = mysqli_query($db, $sql);
      while ($row = mysqli_fetch_array($result) and $rowi = mysqli_fetch_array($otherresults)  ) {
        echo "<div class='card h-100 cardio'>";
        echo "<img src='./images/" . $row['image'] . "'>";
        echo "<p> Price:" . $rowi['price'] . "</p>";
        echo "<p> Location:" . $rowi['location'] . "</p>";
        echo "<p> Phone:" . $rowi['number'] . "</p>";
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