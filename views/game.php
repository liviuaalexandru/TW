<?php view( 'inc.head' ) ?>
<style>
    body {
        background-color: #004d4d;
    }

    img {
        position: absolute;
        top: 10%;
        left: 42%;
    }

    * {
        box-sizing: border-box;
    }

    input[type=text] {
        width: 15%;
        height: 5%;
        border-radius: 5px;
        position: absolute;
        top: 55%;
        left: 41.5%;
    }

    .btn-answer {
        width: 5%;
        height: 6%;
        border-radius: 5px;
        position: absolute;
        top: 63%;
        left: 46%;
        background-color: #00b300;
        border-color: #00b300;
        text-decoration-color: #bfbfbf;
        text-emphasis-color: #bfbfbf;
        text-align: center;
    }

    .btn-answerPopup{
        width: 10%;
        height: 7%;
        border-radius: 5px;

        top: 80%;
        left: 46%;
        background-color: #00b300;
        border-color: #00b300;
        text-decoration-color: #bfbfbf;
        text-emphasis-color: #bfbfbf;
        text-align: center;
    }

    .numberOfPoints {
        position: absolute;
        color: #ffb84d;
        top: 30%;
        left: 70%;
    }
</style>
<?php view('inc.nav') ?>
<h2 class="numberOfPoints">You have <?php echo game()->score ?> points</h2>
<img class="text-center" src="<?php echo $quizz->image; ?>" style="width: 189px">
<form action="/game/answer" method="post">
    <input type="text" name="answer" placeholder="Please enter your answer"><br>
    <button type="submit" class="button btn-answer">Send!</button>
</form>
<a href="javascript:quizzHelper('show');" class="button button-reset-password">Help</a>

<div id="popupbox-quizzHelper">
    <form action="/game/answer" method="post" class="text-center">
        <a href="javascript:quizzHelper('hide');" class="closeButton">X</a>
        <input type="radio" name="answer" value="Brad Pitt">Brad Pitt<br>
        <input type="radio" name="answer" value="Tom Cruise">Tom Cruise<br>
        <input type="radio" name="answer" value="Marika Monroe">Marika Monroe<br>
        <button type="submit" class="button btn-answerPopup">
            Send!
        </button>

    </form>
</div>
<?php view( 'inc.footer' ) ?>
