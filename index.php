
<?php
include('./php/connection.php');
?>
<!DOCTYPE html>
<html class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <title>Agro Farm</title>

    <link rel ="stylesheet" href="./css/index.css" />
    <link rel="icon" href="./docs/images/logo/logo_title.png" type="image/icon type">
    <link rel ="stylesheet" href="./vendor/aos/aos.css">

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


  <div id="product" data-aos="zoom-in-right"  data-aos-duration="1500"  data-aos-easing="ease-in-sine">
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


<!----About us-->
<div id="aboutus" data-aos="fade-right"  data-aos-duration="1000"  data-aos-easing="ease-in-sine" class="p-10">
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
    <img src="./docs/images/aboutus/aboutus.jpg" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center blur-sm">
    <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
      <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
      <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Who are we?</h2>
        <p class="mt-6 text-lg leading-8 text-gray-300">Our goal as an organic vegetable farm is to deliver veggies free of chemicals and preservatives. Pet animals are another thing we deal with</p>
      </div>
      <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
        <p href="#">Follow Us on <span aria-hidden="true">&rarr;</span></p>
          <a href="#">Facebook </a>
          <a href="#">Whatsapp </a>
        </div>
        <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
          <div class="flex flex-col-reverse">
            <dt class="text-base leading-7 text-gray-300">mins Delivery time</dt>
            <dd class="text-2xl font-bold leading-9 tracking-tight text-white">30</dd>
          </div>
          <div class="flex flex-col-reverse">
            <dt class="text-base leading-7 text-gray-300">days per week available</dt>
            <dd class="text-2xl font-bold leading-9 tracking-tight text-white">7</dd>
          </div>
          <div class="flex flex-col-reverse">
            <dt class="text-base leading-7 text-gray-300">Happy Clients</dt>
            <dd class="text-2xl font-bold leading-9 tracking-tight text-white">300+</dd>
          </div>
          <div class="flex flex-col-reverse">
            <dt class="text-base leading-7 text-gray-300">Product Quality</dt>
            <dd class="text-2xl font-bold leading-9 tracking-tight text-white">A+</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</div>



  <!--footer start-->



  <section class="bg-gray-100" id="contactus">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
        <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Visit Our Location</h2>
            <p class="mt-4 text-lg text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <div class="mt-16 lg:mt-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="relative h-0 overflow-hidden mb-6" style="padding-bottom: 56.25%;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29406.64246221055!2d87.76416386201629!3d22.88272612337931!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1726754675957!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
                <div>
                    <div class="max-w-full mx-auto rounded-lg overflow-hidden">
                        <div class="px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-900">Our Address</h3>
                            <p class="mt-1 text-gray-600">Arambagh,West Bengal</p>
                        </div>
                        <div class="border-t border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-900">Hours</h3>
                            <p class="mt-1 text-gray-600">Monday - Friday: 9am - 5pm</p>
                            <p class="mt-1 text-gray-600">Saturday: 10am - 4pm</p>
                            <p class="mt-1 text-gray-600">Sunday: Closed</p>
                        </div>
                        <div class="border-t border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-900">Contact</h3>
                            <p class="mt-1 text-gray-600">Email: info@example.com</p>
                            <p class="mt-1 text-gray-600">Phone: +1 23494 34993</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





  <!--footer end-->
 

<!----JS files-->

  <script src="js/index.js"></script>
  <script src="./vendor/aos/aos.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  
  <script>
    AOS.init(); // Initialize ANIMATION ON SCROLLING 
  </script>


  

</body>

</html>