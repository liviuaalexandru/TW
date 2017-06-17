<?php view( 'inc.head' ) ?>
<style>
    .top10Players {
        position: absolute;
        top: 30%;
        left: 40%;
    }

    table.top-players {
        font-family: arial;
        border-collapse: collapse;
        width: 70%;
        position: absolute;
        top: 45%;
        left: 20%;

    }

    table.top-players td, table.top-players th {
        border: 1px solid #004d4d;
        text-align: left;
        padding: 8px;
    }


</style>

<?php view('inc.nav') ?>
<a href="/game" class="button button-play">Start game!</a>

<div class="text-warning">
    <h1 class="top10Players">Top 10 Players</h1>
	<?php if ( $players->isNotEmpty() ): ?>
        <table class="top-players">
            <tr>
                <th>Position</th>
                <th>UserName</th>
                <th>Score</th>
            </tr>
			<?php foreach ( $players as $key => $player ): ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $player->username; ?></td>
                    <td><?php echo $player->high_score; ?></td>
                </tr>
			<?php endforeach; ?>
        </table>
	<?php else: ?>
        <p>There are no top players at the moment</p>
	<?php endif; ?>
</div>

<div id="popupbox">
    <form action="/user/change-password" method="post" class="text-center">
        <a href="javascript:login('hide');" class="closeButton">X</a>
        <p>
            <label for="current_password">Password:</label>
            <br>
            <input name="current_password" id="current_password" type="password" required/>
        </p>
        <p>
            <label for="password">New Password:</label>
            <br>
            <input id="password" name="password" type="password" required/>
        </p>
        <p>
            <label for="username">Confirm New Password:</label>
            <br>
            <input name="password2" id="password" type="password" required/>
        </p>
        <button type="submit" class="button button-primary">
            Change Password
        </button>

    </form>
</div>
<?php view( 'inc.footer' ) ?>
