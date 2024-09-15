
<?php
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'adminrecord';

// Server is localhost with
// port number 3306
$servername='localhost';
$conn = mysqli_connect($servername, $user,
        $password, $database);

// Checking for connections

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$mytable = array();
$tableid = array();
$sql = " SELECT * FROM carouseltable ;";

 $result = $conn->query($sql);

 //Store table records into an array
 while( $row = $result->fetch_assoc() ) {
 $mytable[] = $row;
 }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<form class="form" method="get" action="test1.php" >
    <div class="selectbox selectbox--unselect" data-option="">
      <div class="selectbox__displayWord">
        -- Select --
      </div>
    
    <div class="option-container">
      <?php foreach($mytable as $table)  { ?>
      
        <button class="dropdown-item" type="submit" value="<?php echo $table['cid']?>" name="img" id="img">carousel<?php echo $table['cid']?></button>

     <?php }?>
     
    </div>
    </div>
    <button class="form__submit-button" type="submit">Submit</button>
      </form>
</div>



<style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

:root {
  --select-theme: #ffe3de;
  --select-theme-hover: #d18375;
  --option-color: #0d323b;
}

body {
  font-family: "Roboto", sans-serif;
  background-color: #ff8e7a;
}

.container {
  padding: 32px;
}
.container__title {
  font-size: 25px;
  font-weight: 600;
  margin: 16px;
  text-align: center;
}
.form {
  display: flex;
  justify-content: center;
  align-items: center;
}
.selectbox {
  position: relative;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  max-width: 300px;
}
.option-container {
  background-color: var(--select-theme);
  color: var(--option-color);
  width: 100%;
  max-height: 0;
  opacity: 0;
  transition: all 0.3s ease;
  border-radius: 8px;
  overflow: hidden;
}

.selectbox--active .option-container {
  max-height: 240px;
  opacity: 1;
  overflow-y: scroll;
}

.selectbox__displayWord,
.option-container__option {
  padding: 12px 24px;
  cursor: pointer;
  user-select: none;
}

.selectbox__displayWord {
  position: relative;
  background-color: var(--select-theme);
  color: var(--option-color);
  border-radius: 8px;
  height: 40px;
}
.selectbox__displayWord::after {
  position: absolute;
  top: 50%;
  right: 16px;
  content: "";
  background: url("https://image.flaticon.com/icons/svg/271/271210.svg");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center center;

  height: 16px;
  width: 16px;
  color: #f5f6fa;
  transform: translateY(-50%);
  transition: all 0.4s;
}
.selectbox--active .selectbox__displayWord::after {
  transform: translateY(-50%) rotateZ(180deg);
}
.selectbox--unselect .selectbox__displayWord {
  color: gray;
}
.selectbox--shake {
  animation: shake 0.3s forwards;
}
.option-container {
  position: absolute;
  top: 50px;
  left: 0;
  width: 100%;
}
.option-container__option:hover {
  background-color: var(--select-theme-hover);
}
.option__radio {
  display: none;
}
.option__label {
  cursor: pointer;
}

.form__submit-button {
  height: 40px;
  padding: 12px;
  outline: 0;
  border: none;
  border-radius: 8px;
  margin-left: 20px;
  background-color: rgb(187, 67, 59);
  color: white;
  cursor: pointer;
  transition: background 0.3s;
}
.form__submit-button:hover {
  background-color: rgb(255, 252, 241);
  color: black;
}

@keyframes shake {
  10%,
  90% {
    transform: translate3d(-1px, 0, 0);
  }

  20%,
  80% {
    transform: translate3d(2px, 0, 0);
  }

  30%,
  50%,
  70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%,
  60% {
    transform: translate3d(4px, 0, 0);
  }
}
</style>

<script>
    const selectbox = document.querySelector(".selectbox");
const selectboxDisplay = document.querySelector(".selectbox__displayWord");
const submitbtn = document.querySelector(".form__submit-button");

const optionList = document.querySelectorAll(".option-container__option");

selectboxDisplay.addEventListener("click", (e) => {
  e.stopPropagation();
  selectbox.classList.toggle("selectbox--active");
});

function shakeBox() {
  selectbox.classList.add("selectbox--shake");
  setTimeout(() => {
    selectbox.classList.remove("selectbox--shake");
  }, 300);
}

optionList.forEach((option, index) => {
  option.addEventListener("click", (e) => {
    e.stopPropagation();

    let label = option.querySelector("label");
    selectboxDisplay.innerHTML = label.innerHTML;
    selectbox.setAttribute("data-option", label.getAttribute("data-value"));
    selectbox.classList.remove("selectbox--active", "selectbox--unselect");
  });
});

submitbtn.addEventListener("click", () => {
  if (selectbox.classList.contains("selectbox--unselect")) shakeBox();
});

window.addEventListener("click", () => {
  selectbox.classList.remove("selectbox--active");
});
</script>
</body>
</html>


<?php
if(isset($_GET['img']))
{
$val1=$_GET['img']; 
$sql = "SELECT cimg FROM carouseltable WHERE cid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $val1);
    $stmt->execute();
    $result1 = $stmt->get_result();

    // Fetch the image path
 

     if ($row = $result1->fetch_assoc()) { ?>
     <div class="gallery">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['cimg']);?>" width="800" height="400" margin-left="50px" />
     </div>
        <button type="button" class="btn btn-success" style="margin-top:10px" data-toggle="modal" data-target="#exampleModalCenter">Change</button>

<?php } }?>

