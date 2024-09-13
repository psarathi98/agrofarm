
<?php
include('./php/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Agro Farm</title>

    <link rel ="stylesheet" href="./css/index.css" />

    <link rel="icon" href="./docs/images/logo/logo_title.png" type="image/icon type">
  </head>

<body>

  
<!--navbar starting-->
<?php
 include("navbar.php");
 
?>
<!--navbar ending-->

  

<!--carousel starting-->
<?php
$mytable = array();
        $sql = " SELECT * FROM carouseltable ;";
        $result = $mysqli->query($sql);

        //Store table records into an array
        while( $row = $result->fetch_assoc() ) {
        $mytable[] = $row;
        }   ?>  
  <div class="slider">
      <div class="list">
        <?php            
        foreach($mytable as $table)  {
         ?>
            <div class="item">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($table['cimg']); ?>" alt="image<?php echo $table['cid']?>">
            </div>
        <?php
              }
                
         ?>
          
      </div>

      <!--button prev and next-->
      <div class="buttons">
          <button id="prev"><</button>
      <button id="next">></button>
      </div>
      <!--Dots (if 5 items => 5 dots)-->
      <ul class="dots">
         <li class="active"></li>
         <li></li>
         <li></li>
         <li></li>
         <li></li> 
      </ul>
  </div>
  <!--Carousel ending-->

  <!----Products Starting-->


  <div id="product">
  <main class="main bd-grid" >

    <!--Fetch products from database-->

  <?php
        $mytable = array();
        $sql = " SELECT * FROM product ;";
        $result = $mysqli->query($sql);

        //Store table records into an array
        while( $row = $result->fetch_assoc() ) {
        $mytable[] = $row;
        }            
                foreach($mytable as $table)  {
        ?>

      <article class="card">
          <div class="card__img">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($table['productimage']); ?>" alt="">
          </div>
          <div class="card__name">
              <button class = "btn-primary">ORDER HERE</button>
          </div>
          <div class="card__precis">
           <!---   <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
              
              <div>
                <span class="card__preci card__preci--now"><?php echo $table['productname']?></span>
                  <span class="card__preci card__preci--now">₹<?php echo $table['productprice']?></span>
              </div>
            <!---  <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
          </div>
      </article>
        <?php
                    }
                
                ?>

      </main>
  </div>


    

  <!--footer start-->
 


  <script src="js/index.js"></script>
  

</body>

</html>