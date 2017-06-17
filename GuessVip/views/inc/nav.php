<a href="/" class="button">Home</a>
<?php if ( auth_is_logged() ): ?>
	<a href="/user/profile" class="button">Profile</a>
	<a href="/logout" class="button">Logout</a>
	<?php else: ?>
	<a href="/register" class="button">Register</a>
<?php endif; ?>