<nav>
    <div class = "logo">
    <a href="<?php echo URLROOT?>"><h2>BREVIS</h2></a>
    </div>
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

