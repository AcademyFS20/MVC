<?php ob_start(); ?>

<main>
 

<div class="container">
        <h2 class="titre">Let's Chat</h2>
        <p class="parg1">Lorem ipsum dolor sit Lorem ipsum dolor sit, amet consectetur adipisicing elit.
             Quam laborum odio unde enim obcaecati, inventore omnis possimus commodi quasi ad aliquid,
              quas laboriosam neque dolor eligendi. Est debitis odit saepe Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus,
               exercitationem? Explicabo culpa quos,
               sint quidem quaerat id tempore commodi doloribus veniam libero rem voluptatibus illo quam quae facilis minima exercitationem?</p>
    </div>
        <div class="signup">
            <img  class="logo1" src="./assets/air-canada-logo.png"/>
            <h3 class="title">SIGN UP</h3>


            <?php if ($data['status']): ?>
        <p class="error" style='color:red'>
                <?=$data['error']?>
        </p>
        <?php else: ?>
           <?='';?>
        <?php endif;?>


        <form method="POST" enctype="multipart/form-data">
            
             <input type="text"  class="input-container"   value="<?php if (isset($data['fname'])): echo $data['fname'];endif;?>" name="fname" placeholder="Enter your First Name"/>
            <input type="text"  class="input-container"  value="<?php if (isset($data['lname'])): echo $data['lname'];endif;?>" name="lname" placeholder="Enter your Last Name"/>
            <input type="text" class="input-container" value="<?php if (isset($data['email'])): echo $data['email'];endif;?>" name="email" placeholder="Enter your Email"/>
            <input type="password" class="input-container" name="password" placeholder="Enter your password" />
            <input type="file" class="input-container"  name="img" value="choose your avatar"/> 
            <input class="bttn" type="submit" name='signup' value="CREATE AN ACCOUNT"/>
        </form>

            <a class="parg" href="<?= \Provider\Request::route("login")?>">Already have An Account</a>
        </div>
   
    </main>
    
<?php
$content=ob_get_clean();
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'templates/template.php';