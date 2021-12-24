<?php ob_start(); ?>
<main>

<div class="container">
        <h3 class="titre">Let's Chat</h3>
        <p class="parg1">Lorem ipsum dolor sit Lorem ipsum dolor sit, amet consectetur adipisicing Lorem ipsum dolor sit 
            amet consectetur adipisicing elit. Nemo modi recusandae fugiat nulla laboriosam, odit perferendis,
             magni veritatis alias ut sed nobis quo rem id beatae asperiores, qui vel itaque. Quam laborum odio
              unde enim obcaecati, inventore omnis possimus commodi quasi ad aliquid, quas laboriosam neque dolor 
              eligendi. Est debitis odit saepe?</p>
    </div>
        <div class="logindiv">
            <img  class="logo"src="./assets/air-canada-logo.png"/>
            
<div>
    <?php  if(isset($_SESSION['success'])) : ?>

        <?=  $_SESSION['success']; ?>
        <?php endif; ?>
</div>

            <h3 class="title">LOGIN</h3>
            <?php  if(isset($data['status'])) : ?>

                <?=$data['error']; ?>

                <?php endif;?>
            <form method="POST">
            <input  class="input-container" type="text"  name="email"  value="<?php if (isset($data['email'])): echo $data['email'];endif;?>"  placeholder="Enter your Email" />
            <input class="input-container" type="password" name="password"  value="<?php if (isset($data['password'])): echo $data['password'];endif;?>"  placeholder="Enter your password"  />
            <input  type="submit" name="login" class="btn" value="Login"/>
            </form>
            <a class="parg" href="<?= \Provider\Request::route("signup")?>">CREAT YOUR Account</a>
        </div>
    
    </main>
<?php
$content=ob_get_clean();
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'templates/template.php';
