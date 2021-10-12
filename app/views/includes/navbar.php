<nav>
    <div class = "logo">
    <a href="<?php echo URLROOT?>"><h2>BREVIS</h2></a>
    </div>
    
    <ul class= "log">
        <?php if(!isset($_SESSION['user_id'])) : ?>
            <li>
            <a href="<?php echo URLROOT?>">Home</a>
            </li>
          <?php else : ?>
                <li>
                <a href="<?php echo URLROOT?>/includes/index">Home</a>
                </li>
          <?php endif; ?>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
     </ul>
     <ul>
     <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="btn-login">
            <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
            </li>
          <?php else : ?>
            <li class="btn-login">
            <a href="<?php echo URLROOT; ?>/users/register">Sign Up</a>
            </li>
            <li class="btn-login">
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
    </ul>  
</nav>
