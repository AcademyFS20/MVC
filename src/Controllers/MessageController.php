<?php

namespace Chat;

use Provider\Renderer;
use Provider\Session;

class MessageController
{
    private $connected;

    public function __construct()
    {

        $this->connected = new UserController();
    }

    public function index()
    {

      $email=$_SESSION['email'];
      $username=$_SESSION['name'];
      $id=$_SESSION['id'];
      Renderer::render('chat',"chatbox",compact('email','username','id'));

        // debug($this->connected->getUserConnected('test@test.ma'));

    }
}
