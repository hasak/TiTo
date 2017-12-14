<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 13.12.2017.
 * Time: 21:01
 */

if($ad)
    $hjm="/admin";
else $hjm="javascript:void(0);";
echo'<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/"><span class="fl flaticon-running"></span> Trčanje i To</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/"><span class="fa fa-fw fa-home"></span> Naslovna</a></li>
        <li><a href="#"><span class="fa fa-fw fa-user"></span> Profil</a></li>
        <li><a href="#"><span class="fa fa-fw fa-info-circle"></span> O nama</a></li>
        <li><a href="#"><span class="fa fa-fw fa-envelope"></span> Kontakt</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/ap"><span class="fa fa-fw fa-cog fa-spin"></span> Admin Panel</a></li>
        <li><a href="#"><span class="fa fa-fw fa-sign-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>';