
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Agro Farm</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
    <!--<link rel="stylesheet" href="css/index.css">-->

   
<link rel ="stylesheet" href="./css/index.css" />
  </head>

<body>

  
<!--navbar starting-->
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" >
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">AgroFarm</span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">Login</button>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<!--navbar ending-->




  
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                  <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Sign in to our platform
                  </h3>
                  <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-4 md:p-5">
                  <form class="space-y-4" action="login.php" method="post">
                      <div>
                          <label for="userid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                          <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                      </div>
                      <div>
                          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                          <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                      </div>
                      <div class="flex justify-between">
                          <div class="flex items-start">
                              <div class="flex items-center h-5">
                                  <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                              </div>
                              <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                          </div>
                          <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                      </div>
                      <button type="submit" id="login" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                      <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                          Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div> 
  
  

<!--carousel starting-->
  <div class="slider">
      <div class="list">
          <div class="item">
              <img src=".\docs\images\carousel\AgroFarmCover.jpg" alt="image1">
          </div>
          <div class="item">
              <img src="https://images.pexels.com/photos/1379636/pexels-photo-1379636.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="image2">
          </div>
          <div class="item">
              <img src="https://static.vecteezy.com/system/resources/previews/001/862/190/non_2x/road-and-autumn-trees-free-photo.jpeg" alt="image3">
          </div>
          <div class="item">
              <img src="https://cdn.pixabay.com/photo/2015/06/19/21/24/avenue-815297_1280.jpg" alt="image4">
          </div>
          <div class="item">
              <img src="https://img.freepik.com/free-photo/abstract-autumn-beauty-multi-colored-leaf-vein-pattern-generated-by-ai_188544-9871.jpg?w=1060&t=st=1725691167~exp=1725691767~hmac=ad17b8d2288fcd82f2d859829bf8f6823350e1264ccbebabadfdd8ace7f33bad" alt="image5">
          </div>
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

  <main class="main bd-grid">
      <article class="card">
          <div class="card__img">
              <img src="https://png.pngtree.com/png-clipart/20230411/original/pngtree-duck-poultry-animal-transparent-on-white-background-png-image_9044367.png" alt="">
          </div>
          <div class="card__name">
              <button class = "btn-primary">ORDER HERE</button>
          </div>
          <div class="card__precis">
           <!---   <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
              
              <div>
                 
                  <span class="card__preci card__preci--now">Duck</span>
              </div>
            <!---  <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
          </div>
      </article>

      <article class="card">
          <div class="card__img">
              <img src="https://cdn0.iconfinder.com/data/icons/farm-34/1200/Single_15CartoonFermaKush-512.png" alt="">
          </div>
          <div class="card__name">
              <button class ="btn-primary">ORDER HERE</button>
          </div>
          <div class="card__precis">
            <!----  <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a>  -->
              <div>
                 
                  <span class="card__preci card__preci--now">Eggs</span>
              </div>
            <!---  <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
          </div>
      </article>

      <article class="card">
          <div class="card__img">
              <img src="https://png.pngtree.com/png-vector/20220926/ourmid/pngtree-organic-vegetables-tomatoes-png-image_6157172.png" alt="">
          </div>
          <div class="card__name">
              <button class ="btn-primary">ORDER HERE</button>
          </div>
          <div class="card__precis">
           <!----   <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
              
              <div>
                 
                  <span class="card__preci card__preci--now">tomatoes</span>
              </div>
           <!----   <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
          </div>
      </article>

      <article class="card">
          <div class="card__img">
              <img src="https://png.pngtree.com/png-clipart/20220927/original/pngtree-green-cucumber-vegetables-png-image_8633530.png" alt="">
          </div>
          <div class="card__name">
              <button class ="btn-primary">ORDER HERE</button>
          </div>
          <div class="card__precis">
        <!---      <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
              
              <div>
                  
                  <span class="card__preci card__preci--now">cucumber</span>
              </div>
        <!---      <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
          </div>
      </article>

      <article class="card">
        <div class="card__img">
            <img src="https://th.bing.com/th/id/R.400b050e59b8e5d6cd668b3007fee1a9?rik=CZ63A10dprLi6Q&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fcute-chicken-png-hd-specialists-in-farm-amp-animal-farm-chicken-png-chicken-png-926.png&ehk=PVT%2bRRXhpChI94i%2b0eM9J6Ciq62YCQkBp%2fOwVNolsxU%3d&risl=&pid=ImgRaw&r=0" alt="">
        </div>
        <div class="card__name">
            <button class ="btn-primary">ORDER HERE</button>
        </div>
        <div class="card__precis">
       <!---     <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
            
            <div>
               
                <span class="card__preci card__preci--now">Chicken</span>
            </div>
       <!---     <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
        </div>
    </article>

    <article class="card">
        <div class="card__img">
            <img src="https://dcassetcdn.com/design_img/3810229/80753/23541915/8qxg6nf119f3636ev6e4xbnqf4_image.png" alt="">
        </div>
        <div class="card__name">
            <button class ="btn-primary">ORDER HERE</button>
        </div>
        <div class="card__precis">
           <!--- <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
            
            <div>
                
                <span class="card__preci card__preci--now">Dairy Products</span>
            </div>
        <!----    <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
        </div>
    </article>

    <article class="card">
        <div class="card__img">
            <img src="https://png.pngtree.com/png-vector/20220521/ourmid/pngtree-vegetables-vegetable-veggie-farm-market-png-image_4645343.png" alt="">
        </div>
        <div class="card__name">
            <a class ="btn-primary" href="https://wa.me/7029155528">ORDER HERE</a>
        </div>
        <div class="card__precis">
         <!---   <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> !-->
            
            <div>
                
                <span class="card__preci card__preci--now">Vegetables</span>
            </div>
          <!---- <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> !-->
        </div>
    </article>

    <article class="card">
        <div class="card__img">
            <img src="https://webstockreview.net/images/clipart-goat-nigerian-dwarf-goat.png" alt="">
        </div>
        <div class="card__name">
            <button class ="btn-primary">ORDER HERE</button>
        </div>
        <div class="card__precis">
           <!---- <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a>  !-->
            
            <div>
               
                <span class="card__preci card__preci--now">Fresh Meat</span>
                
            </div>
         <!---   <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> !-->
        </div>
    </article>

    <article class="card">
        <div class="card__img">
            <img src="https://th.bing.com/th/id/R.3928891be8d69bbdb1cf211a3f8de326?rik=SzoGR4FgnBpXKA&riu=http%3a%2f%2fwww.pngall.com%2fwp-content%2fuploads%2f2018%2f04%2fRice-PNG-Photo.png&ehk=WdrjU0TooR93nPM6tBryTxj1npwUsA9nbmQHXXOTu50%3d&risl=&pid=ImgRaw&r=0" alt="">
        </div>
        <div class="card__name">
            <button class = "btn-primary">ORDER HERE</button>
        </div>
        <div class="card__precis">
         <!----   <a href="" class="card__icon" ><ion-icon name="heart-outline"></ion-icon></a> -->
            
            <div>
                
                <span class="card__preci card__preci--now">Rice</span>
            </div>
         <!----   <a href="" class="card__icon"><ion-icon name="cart-outline"></ion-icon></a> -->
        </div>
    </article>
  </main>


  <!--footer start-->
 


  <script src="js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</body>

</html>