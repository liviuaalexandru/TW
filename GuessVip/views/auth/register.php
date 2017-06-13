<?php view( 'inc.head', [ 'class' => 'bg-warning' ] ) ?>

    <form action="/register/user" method="post" class="text-center">
        <h1>
            To enjoy the experience of guessing celebrities create a new account!
        </h1>
        <label class="text-center"><b>Username</b></label>
        <br>
        <input type="text" placeholder="Enter Username" name="username" required>
         <br>
        <label><strong>Password</strong></label>
        <br>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>
        <label><strong>Confirm Password</strong></label>
        <br>
        <input type="password" placeholder="Confirm Password" name="password2" required>
        <br>
        <br>
        <button type="submit" class="button button-primary">Sign Up</button>
    </form>

<?php view( 'inc.footer' ) ?>