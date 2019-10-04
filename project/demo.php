<!DOCTYPE html>
<html>
<head>
  <title></title>

</head>
<body>
  <style type="text/css">

.container{
  padding: 1em 0;
  float: left;
  width: 50%;
}

.content {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: auto;
  overflow: hidden;
}

.content .content-overlay {
  background: rgba(0,0,0,0.3);
  position: absolute;
  height: 99%;
  width: 100%;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.content:hover .content-overlay{
  opacity: 1;
}

.content-image{
  width: 100%;
}

.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.content:hover .content-details{
  top: 50%;
  left: 50%;
  opacity: 1;
}

.content-details h3{
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.15em;
  margin-bottom: 0.5em;
  text-transform: uppercase;
}



.fadeIn-bottom{
  top: 50%;
  left: 50%;
}

  </style>
<div class="container">
  <div class="content">
    <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
      <div class="content-overlay"></div>
      <img class="content-image" src="images/usa.png">
      <div class="content-details fadeIn-bottom">
        <h3 class="content-title">This is a title</h3>
      </div>
    </a>
  </div>
</div>
<div class="container-fluid">
  <?php
$str = "Home,Events,Action 1,Action 2,Action 3,About,Contact US";
print_r (explode(",",$str));


?> 
</div>
</body>
</html>