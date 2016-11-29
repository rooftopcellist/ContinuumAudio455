	<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
	<ul id="nav">
        <li><a href="home.php" <?php if ($currentPage == 'home.php') {echo 'id="here"'; } ?>>Home</a></li>
<!-- 
        <li><a href=" " <?php if ($currentPage == 'blog.php') {echo 'id="here"'; } ?>>Blog</a></li>
        <li><a href=" " <?php if ($currentPage == 'gallery.php') {echo 'id="here"'; } ?>>Gallery</a></li>
 -->
       <li><a href="My_registration_form.php" <?php if ($currentPage == 'register.php') {echo 'id="here"'; } ?>>Register</a></li>
        <li><a href="contact_us.php" <?php if ($currentPage == 'contact_us.php') {echo 'id="here"'; } ?>>Contact</a></li>
        
    </ul>