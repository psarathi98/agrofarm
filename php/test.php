<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="myForm">
        <input type="text" name="data" placeholder="name" required>
        <input type="text" name="data2" placeholder="price" required>
       
        <button type="submit">Submit</button>
    </form>
    <div id="popup" class="popup" style="display:none;"></div>

  


<style>  /* styles.css */
.popup {
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    border-radius: 5px;
    z-index: 1000;
}

</style>


<script>// script.js
$(document).ready(function() {
    $('#myForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        $.ajax({
            type: 'POST',
            url: 'ajax.php', // The URL to your PHP script
            data: $(this).serialize(), // Serialize form data
            success: function(response) {
                // Show the popup with the response message
                $('#popup').text(response).fadeIn();
                setTimeout(function() {
                    $('#popup').fadeOut();
                }, 3000); // Hide the popup after 3 seconds
            },
            error: function() {
                $('#popup').text('An error occurred. Please try again.').fadeIn();
                setTimeout(function() {
                    $('#popup').fadeOut();
                }, 3000);
            }
        });
    });
});
</script>

</body>
</html>
