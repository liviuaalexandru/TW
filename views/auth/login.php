<div id="popupbox">

    <form action="/login" method="post" class="text-center">
        <a href="javascript:login('hide');" class="closeButton">X</a>
        <p>
            <label for="username">Username:</label>
            <br>
            <input name="username" id="username" required/>
        </p>
        <p>
            <label for="password">Password:</label>
            <br>
            <input id="password" name="password" type="password" required/>
        </p>

        <button type="submit" class="button button-primary">
            Login
        </button>
    </form>
</div>