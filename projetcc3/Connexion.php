
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
      $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
      if( $this.val() === '' ) {
        label.removeClass('active highlight'); 
      } else {
        label.removeClass('highlight');   
      }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
        label.removeClass('highlight'); 
      } 
      else if( $this.val() !== '' ) {
        label.addClass('highlight');
      }
    }

});

$('.tab a').on('click', function (e) {
   e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
    </script>
  <style>
    *, *:before, *:after {
    box-sizing: border-box;
  }
  
  html {
    overflow-y: scroll;
  }
  
  body {
    background-image: url("OIP.jpg");
    background-size: cover;
    font-family: 'Titillium Web', sans-serif;
  }
  
  a {
    text-decoration: none;
    color: #1ab188;
    transition: .5s ease;
  }
  a:hover {
    color: #179b77;
  }
  
  .form {
    background: rgba(19, 35, 47, 0.9);
    padding: 40px;
    max-width: 600px;
    margin: 40px auto;
    border-radius: 4px;
    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  }
  
  .tab-group {
    list-style: none;
    padding: 0;
    margin: 0 0 40px 0;
  }
  .tab-group:after {
    content: "";
    display: table;
    clear: both;
  }
  .tab-group li a {
    display: block;
    text-decoration: none;
    padding: 15px;
    background: rgba(160, 179, 176, 0.25);
    color: #a0b3b0;
    font-size: 20px;
    float: left;
    width: 50%;
    text-align: center;
    cursor: pointer;
    transition: .5s ease;
  }
  .tab-group li a:hover {
    background: #559cee;
    color: #ffffff;
  }
  .tab-group .active a {
    background: #1ab188;
    color: #ffffff;
  }
  
  .tab-content > div:last-child {
    display: none;
  }
  
  h1 {
    text-align: center;
    color: #ffffff;
    font-weight: 300;
    margin: 0 0 40px;
    margin-top: 20px;
  }
  
  label {
    position: absolute;
    transform: translateY(6px);
    left: 13px;
    color: rgba(255, 255, 255, 0.5);
    transition: all 0.25s ease;
    pointer-events: none;
    font-size: 22px;
  }
  label .req {
    margin: 2px;
    color: #1ab188;
  }
  
  label.active {
    transform: translateY(50px);
    left: 2px;
    font-size: 14px;
  }
  label.active .req {
    opacity: 0;
  }
  
  label.highlight {
    color: #ffffff;
  }
  
  input, textarea {
    font-size: 22px;
    display: block;
    width: 100%;
    height: 100%;
    padding: 5px 10px;
    background: none;
    background-image: none;
    border: 1px solid #a0b3b0;
    color: #ffffff;
    border-radius: 0;
    transition: border-color .25s ease, box-shadow .25s ease;
  }
  input:focus, textarea:focus {
    outline: 0;
    border-color: #1ab188;
  }
  
  textarea {
    border: 2px solid #a0b3b0;
    resize: vertical;
  }
  .titre{
    color:#559cee;
  }
  
  .field-wrap {
    position: relative;
    margin-bottom: 40px;
  }
  
  .top-row:after {
    content: "";
    display: table;
    clear: both;
  }
  .top-row > div {
    float: left;
    width: 48%;
    margin-right: 4%;
  }
  .top-row > div:last-child {
    margin: 0;
  }
  
  .button {
    border: 0;
    outline: none;
    border-radius: 0;
    padding: 15px 0;
    font-size: 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .1em;
    background: #559cee;
    color: #ffffff;
    transition: all 0.5s ease;
  }
  .button:hover, .button:focus {
    background: #afcae9;
  }
  
  .button-block {
    display: block;
    width: 100%;
  }
    </style>

    <title>Page de connexion</title>
</head>
<body>

  <h1 class="titre">GenuisGuideOFPPT</h1>

    <div class="form">
      
        <ul class="tab-group">
          <li class="tab"><a href="#login">Log In</a></li>
          <li class="tab"><a href="inscription.php">Sign In</a></li>
        </ul>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
          <div id="login">   
            <h1>Welcome Back!</h1>
            <form action="login.php" method="post">
              <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" name="email" required autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="password" name="pswd" required autocomplete="off"/>
            </div>
            <button class="button button-block"/>Log In</button>
            </form>
          </div>
        </div>
  </div> 
</body>
</html>