<section id="nav-bar">
  <!-- Nav bar feature is provided by bootstrap -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Event Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <!-- Here the array of i is printed by echo
    $i array contains all menus extracted from database
    see $i in config.php
         -->
        <a class="nav-link" <?php echo "href='index.php?lang=$lang'";?> > <?php echo $i[0]; ?>
        
         </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $i[1]; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" <?php echo "href='calendar/index.php?lang=$lang'";?>    >
          	<?php echo $i[2];?>      </a>
          <a class="dropdown-item" <?php echo "href='calendar/index.php?lang=$lang'";?> ><?php echo $i[3]; ?></a>
          <a class="dropdown-item" <?php echo "href='calendar/index.php?lang=$lang'";?> ><?php echo $i[4]; ?></a>
        </div>
      </li>
       <li class="nav-item">
        <a class="nav-link" <?php echo "href='forum.php?lang=$lang'";?> >Guestbook</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $i[5]; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" <?php echo "href='contact.php?lang=$lang'";?> ><?php echo $i[6]; ?></a>
      </li>
      
    </ul>
  </div>
</nav>
</section>