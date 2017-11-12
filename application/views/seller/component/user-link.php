<?php if($user): ?>
<a href="" class="user-link">
	<img src="<?php echo $this->config->item('f_user_avatar') . $user->avatar ?>" alt="">
	<span><?php echo $user->username ?></span>
</a>
<?php else: ?>
	<a class="user-link">...</a>
<?php endif; ?>
