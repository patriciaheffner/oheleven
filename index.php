<?php
session_start();


if(!$_SESSION["a"]){
  $_SESSION["a"] = rand(1,50);
  $_SESSION["b"] = rand(1,50);
}

$name = '';
$email = '';
$message = '';
$result = '';
$error = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $check = intval($_POST['secCheck']);

  if($check !== ($_SESSION["a"] + $_SESSION["b"])) {
    $error .= '<p class="text-err">Please recheck the anti-spam value.<br></p>';
  }

  if($error == '') {
    $from = 'ohelevencreative@gmail.com';
    $to = 'ohelevencreative@gmail.com';
    $subject = 'Message from contact form';
    $body = "From: $name ($email) \n Message: \n $message";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From <'.$from.'>' . "\r\n";

    if(mail($to,$subject,$body,$headers)){
      $result = '<div>Your inquiry has successfully been submitted. We will be in touch with you shortly.</div>';
      $name= '';
      $email= '';
      $message='';
      $secCheck='';
      
    } else {
      $result = '<div>Mail was not sent</div>';
    }
    
  } else {
    $result = '<div class="alert">'.$error.'</div>';
  }
}
?>





<!DOCTYPE html>
<html>
  <head>
  <link href='css/style.css' rel='stylesheet' type='text/css'>
  
  <link rel="apple-touch-icon" sizes="57x57" href="/favico/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favico/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favico/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favico/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favico/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favico/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favico/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favico/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favico/apple-icon-180x180.png">

  <link rel="icon" type="image/png" sizes="32x32" href="/favico/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favico/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favico/favicon-16x16.png">


<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='assets/scripts/scrollScript.js'  type='text/javascript'></script>

  </head>
  <header>
    <div class="brand-title">
        <div class='oec-leaves'></div>
        <p>bespoke calligraphy <span class="voga-font">&amp;</span> design</p>
      </div>
  </header>
  <body>

  <nav id="menu">
    <span class="voga-logo">oe</span>
<!--     <ul>
        <li><a href="#aboutTarget">about</a></li>
        <li><a href="#servicesTarget">services</a></li>
        <li><a href="#contactTarget">contact</a></li>
    </ul> -->
  </nav>

  <div class="wrapper-row">
    <section class="left gp-12 images">
      <div class="photo-credit">shanell photography</div>
    </section>
    <section class="middle gp-1 images">
      <div class="photo-credit dark">shanell photography</div>
    </section>
    <section class="right gp-5 images">
      <div class="photo-credit">shanell photography</div>
    </section>
  </div>
  
  <div class="wrapper-row">
    <section class="left gp-14 images">
      <div class="photo-credit">shanell photography</div>
    </section>
    <section class="middle gp-3 images">
      <div class="photo-credit">shanell photography</div>
    </section>
    <section id="aboutTarget" class="right">
      <div class="text-div right-text">
        <p class="sub-head">about</p>
        <p>Oh Eleven is a creative design studio focused on making for the individual. Each and every piece, down to each written letter, is designed specifically and thoughtfully to the client.<br/><br/> We believe in crafting by hand &amp; using the best quality materials to tell your story.</p>
    </div>
    </section>
  </div>

  <div class="wrapper-row">
    <section class="left gp-8 images">
      <div class="photo-credit">shanell photography</div>
    </section>
    <section class="middle gp-13 images">
      <div class="photo-credit dark">shanell photography</div>
    </section>
     <section class="right gp-7 images">
      <div class="photo-credit dark">shanell photography</div>
    </section>
  </div>

  <div class="wrapper-row">
    <section class="left gp-6 images">
      <div class="photo-credit">shanell photography</div>
    </section>
    <section id="servicesTarget" class="middle">
      <div class="text-div">
        <p class="sub-head">Services</p>
          <p>custom invitation suites</p>
          <p>suite calligraphy</p>
          <p>envelope calligraphy</p>
          <p>spot calligraphy</p>
          <p>customized lettered vows &amp; goods</p>
          <p>day of signage</p>
      </div>
    </section>
    <section class="right gp-9 images">
        <div class="photo-credit">shanell photography</div>
      </section>
  </div>


  <div class="wrapper-row">
    <section id="contactTarget" class="left ">
      <div class="text-div right-text">
          <p class="sub-head">contact</p>
          <p>Have a project in mind? We love using new materials, as well as experimenting with techniques &amp; styles. Please submit the form below and we will be in touch with you shortly. </p>
    
    <iframe name="bananagrams" style="display:none;"></iframe>
    <form method="post" id="contactForm" action="index.php" class="form-container" target="bananagrams">
      <div>
        <label for="name">Name</label>
        <input
          type="text"
          name="name"
          id="name"
          value="<?php echo $name;?>"
          placeholder="name"/>
          <p class="text-danger">Please enter your name.</p>
      </div>
      <div>
        <label for="email">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          value="<?php echo $email;?>"
          placeholder="email"/>
          <p class="text-danger">Please enter your email.</p>
      </div>
      <div>
        <label for="message">Message</label>
        <textarea
          name="message"
          id="message"
          placeholder="say hello!"
          rows="4"><?php echo $message;?></textarea>
          <p class="text-danger">Please enter a message.</p>
      </div>
     

      <div>
        <label for="secCheck">
          <?php echo $_SESSION["a"] . ' + ' .$_SESSION["b"] ; ?>
        </label>
        <input
          type="text"
          name="secCheck"
          id="secCheck" />
          <p class="text-danger">Please recheck your calculations.</p>
      </div>

      <div>
        <div><?php echo $result; ?></div>
      </div>
      <div id='locVal'><?php echo ($_SESSION["a"] + $_SESSION["b"]); ?></div>
      <div id="successMsg" ></div>
      <div><input type="submit" value="Send" id="submit" name="submit"/></div>
  </form>
  </section>

  <section class="middle pp-1 images">
    <div class="photo-credit dark">samantha leigh studios</div>
  </section>
  
  <section class="right pp-3 images">
    <div class="photo-credit">samantha leigh studios</div>
  </section>
</div>
    



    <div class="wrapper-row">
      <section class="left pp-11 images">
        <div class="photo-credit dark">samantha leigh studios</div>
      </section>
      <section class="middle pp-2 images">
        <div class="photo-credit dark">samantha leigh studios</div>
      </section>
      <section class="right pp-8 images">
        <div class="photo-credit dark">samantha leigh studios</div>
      </section>
    </div>


    <div class="wrapper-row">


      <section class="left poh-lighter images">
        <div class="photo-credit">michelle jones photography</div>
      </section>
      
      <section class="two-thirds">
        <div class="text-div">
        <p class="sub-label">Patricia Okrasinski Heffner</p>
        <p class="sub-label">Owner, Oh Eleven</p>
          <p>Patricia  grew up in Michigan, where she attended university and met her husband, Patrick. They were married September 2016 in Detroit, Michigan and have lived in Alexandria, Virginia for five years.</p>
          <p>She is a self-taught calligrapher. From early childhood, Patricia has been creating art in a variety of media. Her passion for lettering and calligraphy grew as she was planning her own wedding; she sourced unconventional materials, lettered and designed her own wedding calligraphy.</p>
          <p>By day, Patricia is a software engineer. She started Oh Eleven as a creative outlet/passion project, to share her lettering and design aesthetic with others. In her dream life, she would commute to her (backyard) art studio with a dog in tow. </p>

          <p>She has a ridiculous love for: dogs, rainy days, nail polish, paper / stationery, antique jewelry, pens, ink, watercolor / goauche, midcentury modern, art deco, minimalist design</p>

        </div>
      </section>
    </div>


  <div class="wrapper-row footer">
    <section>
      <div class="text-div center">

        <div id="mc_embed_signup">
          <p>Let's keep in touch! Subscribe to our mailing list.</p>
          <form class="form-container small" action="https://oheleven.us17.list-manage.com/subscribe/post?u=db2f7a6b975a49e17ec26e28f&amp;id=5b4da57349" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
            
            <div style="width: 25%; margin: 0 auto">
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>

            <input type="text" value="" name="FNAME" class="email" id="mce-FNAME" placeholder="first name">
            <input type="text" value="" name="LNAME" class="email" id="mce-LNAME" placeholder="last name">
          </div>
  
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_db2f7a6b975a49e17ec26e28f_5b4da57349" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
              </div>
          </form>
        </div>
        <p>See what else we've been working on.</p>
        <p class="insta-link"><a href="https://www.instagram.com/ohelevencreative/" target="_blank">insta | ohelevencreative</a></p>
      </div>
    </section>
   
  </div>
  
  </body>
</html>