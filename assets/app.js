function login(showhide) {
    if (showhide === "show")
        document.getElementById('popupbox').style.visibility = "visible";
    else
        document.getElementById('popupbox').style.visibility = "hidden";
}

function resetpassword(showhide) {
    if (showhide === "show")
        document.getElementById('popupbox-resetpassword').style.visibility = "visible";
    else
        document.getElementById('popupbox-resetpassword').style.visibility = "hidden";
}

