<?php view( 'inc.head' ) ?>
<style>
    body {
        background-color: #004d4d
    }

    .top10Players {

    }

    table.top-players {
        font-family: arial;
        border-collapse: collapse;
        width: 70%;
    }

    table.top-players td, table.top-players th {
        border: 1px solid #004d4d;
        text-align: left;
        padding: 8px;
    }

</style>
<?php view( 'inc.nav' ) ?>
<div class="container">
    <div class="text-warning">
        <h1 class="top10Players"><?php echo $user->username; ?> Games</h1>
		<?php if ( $scores ): ?>
            <h3>Highest Score: <?php echo $user->high_score; ?></h3>
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
<?php view( 'inc.footer' ) ?>
