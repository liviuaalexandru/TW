<?php view( 'inc.head', [ 'class' => 'home' ] ) ?>

<section>
    <div class="container container-cover">
        <h1 class="text-welcome">Welcome to <?php echo config( 'name' ); ?> game!<br> Let's see how good you are at
            guessing celebrities!</h1>
        <p class="text-info">If you don't have an account you could create an account for free.</p>
		<?php if ( auth_is_logged() ): ?>
            <a href="/user/profile">Profile</a>
            |
		<?php else: ?>
            <a href="javascript: login('show');" class="btn btn-outline btn-xl">Sign in</a>
            |
            <a href="/register">Create New Account</a>
            |
		<?php endif; ?>
        <a href="/top">Top Players</a>
    </div>
</section>

<?php view( 'auth.login' ) ?>
<?php view( 'inc.footer' ) ?>
