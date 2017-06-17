<?php view( 'inc.head' ) ?>
<style>
    body {
        background-color: #004d4d
    }

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

    .button-reset-password {
        padding: 15px 25px;
        font-size: 17px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: #fff;
        background-color: red;
        border: none;
        border-radius: 15px;
        position: absolute;
        top: 5%;
        left: 85%;

    }

</style>
<?php view( 'inc.nav' ) ?>


<a href="javascript:login('show');" class="button button-reset-password">Reset password</a>
<a href="/game" class="button button-play">Start game!</a>

<div class="container">

    <h1 class="text-warning">Hello, <?php echo auth()->username; ?>! Your high score: <?php echo auth()->high_score ?></h1>
    <ul>
        <?php $public_url = '/user/profile/public?user=' . auth()->id ?>
        <?php $json_url = $public_url . '&format=json' ?>
        <li class="text-warning">Public Profile: <a href="<?php echo $public_url; ?>" target="_blank"><?php echo $public_url; ?></a></li>
        <li class="text-warning">Public Profile(JSON): <a href="<?php echo $json_url; ?>" target="_blank"><?php echo $json_url; ?></a></li>
    </ul>

    <div class="text-warning">
        <h1 class="top10Players">Your Games</h1>
		<?php if ( $scores ): ?>
            <table class="top-players">
                <tr>
                    <th>Position</th>
                    <th>Score</th>
                </tr>
				<?php foreach ( $scores as $key => $item ): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $item->score; ?></td>
                    </tr>
				<?php endforeach; ?>
            </table>
		<?php else: ?>
            <p>There are no games at the moment</p>
		<?php endif; ?>
    </div>
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
