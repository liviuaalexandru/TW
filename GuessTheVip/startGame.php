<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  background-color: #004d4d
}
img{
  position: absolute;
  top:10%;
  left:42%;
}

.example {
    display: flex;
    transition: all .5s;
    user-select: none;
    background: linear-gradient(to bottom, white, black);
}
*{
    box-sizing: border-box;
}
input[type=text]{
  width: 15%;
  height: 5%;
  border-radius: 5px;
  position: absolute;
  top:55%;
  left: 41.5%;
}
input[type="submit"]{
  width: 5%;
  height: 4%;
  border-radius: 5px;
  position: absolute;
  top: 63%;
  left: 46%;
  background-color: #00b300;
  border-color: #00b300;
  text-decoration-color: #bfbfbf;
  text-emphasis-color: #bfbfbf;
}
numberOfPoints{
  position: absolute;
  top: 30%;
  left:70%;
}
</style>

<script>
function myFunction() {
    confirm("You win 1 point!");
}
</script>
</head>

<body>

    <font color="#ffb84d"><numberOfPoints><h2>You have <?php echo "0"?> points</h2></numberOfPoints>

    <center><img src="tom_cruise.png"></center>

    <input type="text" name="answer" placeholder="Please enter your answer"><br>

    <form action="/GuessTheVip/userAccount.php">
        <input type="submit" onclick="myFunction()" value="Send !">
    </form>

</body>

</html>
