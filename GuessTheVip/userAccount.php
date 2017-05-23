<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
img {
    width: 100%;
    height: auto;
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
.row::after {
    content: "";
    clear: both;
    display: block;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
html {
    font-family: "Lucida Sans", sans-serif;
}
.header {
    background-color: #9933cc;
    color: #ffffff;
    padding: 15px;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.menu li:hover {
    background-color: #0099cc;
}
.aside {
    background-color: #33b5e5;
    padding: 15px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.footer {
    background-color: #0099cc;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
}
/* For desktop: */
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    [class*="col-"] {
        width: 100%;
    }
}
body{
  background-color: #004d4d
}
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: red;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #004d4d;
  position: absolute;
  top: 15%;
  left: 40%;

}


.button:hover {background-color: orange}

.button:active {
  background-color: dark;
  box-shadow: 0 5px dark  ;
  transform: translateY(4px);
}

highScorePlayer{
  position: absolute;
}
top10Players{
  position: absolute;
  top:30%;
  left: 40%;
}

table {
    font-family: arial;
    border-collapse: collapse;
    width: 70%;
    position: absolute;
    top:45%;
    left:20%;

}

td, th {
    border: 1px solid #004d4d;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #004d4d;
}

#popupbox{
margin: 0;
margin-left: 40%;
margin-right: 40%;
margin-top: 50px;
padding-top: 10px;
width: 20%;
height: 240px;
position: absolute;
background: black;
border: solid black 2px;
z-index: 9;
font-family: arial;
visibility: hidden;
border-radius: 10px;
}

input[type="submit"]{
  display: inline-block;
  padding: 5px 10px;
  font-size: 15px;
  box-shadow: 0 9px black;
  color: black;
  background-color: red;
  top: 65%;
  left: 25%;

}

a[type="resetPasswordButton"]{
  display: inline-block;
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

button[type="closeButton"]{
  font: 14px/100% arial, sans-serif;
  position: absolute;
  top:9px;
  left:85%;
  background-color: #004d4d;
  border-color: #004d4d;
  color: black;
  border-radius: 3px;

}

</style>
<script language="JavaScript" type="text/javascript">
function resetPassword(showhide){
if(showhide == "show"){
    document.getElementById('popupbox').style.visibility="visible";
}else if(showhide == "hide"){
    document.getElementById('popupbox').style.visibility="hidden";
}
}
</script>
</head>

<body>
  <div id="popupbox">
    <form name="changePassword" action="userAccount.php" method="post">
      <button type="closeButton"><a href="javascript:resetPassword('hide');">✖</a></button>
      <br>
      <center><font color="white">Password:</center>
      <center><input name="password" type="password" size="20" /></center>
      <center>New Password:</center>
      <center><input name="newPassword" type="password" size="20" /></center>
      <center>Confirm New Password:</center>
      <center><input name="confirmedNewPassword" type="password" size="20" /></center>
      <input type="submit" class="button"  name="submit" value="Change password" />


    </form>
  </div>

  <a href="javascript:resetPassword('show');" type="resetPasswordButton">Reset password</a>
    <form action="/GuessTheVip/startGame.php">
        <button class="button" >Start game!</button>
    </form>
    <font color="#ffb84d"><highScorePlayer><h1>Your high score: <?php echo "1"?></h1></highScorePlayer>
    <font color="#ffb84d"><top10Players><h1>Top 10 Players</h1></top10Players>
    <table>
      <tr>
        <th>Position</th>
        <th>UserName</th>
        <th>Score</th>
      </tr>
      <tr>
        <td>1</td>
        <td>John</td>
        <td>50</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Andrew</td>
        <td>45</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Dan</td>
        <td>40</td>
      </tr>
      <tr>
        <td>4</td>
        <td>Angeline</td>
        <td>35</td>
      </tr>
      <tr>
        <td>5</td>
        <td>Tom</td>
        <td>30</td>
      </tr>
      <tr>
        <td>6</td>
        <td>Justine</td>
        <td>25</td>
      </tr>
      <tr>
        <td>7</td>
        <td>Jasmine</td>
        <td>20</td>
      </tr>
      <tr>
        <td>8</td>
        <td>Jason</td>
        <td>15</td>
      </tr>
      <tr>
        <td>9</td>
        <td>Peter</td>
        <td>10</td>
      </tr>
      <tr>
        <td>10</td>
        <td>Abraham</td>
        <td>9</td>
      </tr>


</body>
</html>
