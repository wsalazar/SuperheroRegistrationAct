

var error = window.location.search.substring(1).split('=');
if (error[0]) {
    document.getElementById("loginStatus").className = 'loginError';
    document.getElementById("loginStatus").innerHTML = 'Incorrect Credentials';
}

/**
 * Makes ajax request to see if user exists in db.
 */
function doesUsernameExist()
{
    var username = document.getElementsByName("username")[0].value;
    var request = new XMLHttpRequest();
    var submitButton;
    request.open("POST", 'validateUsername.php', true);
    var payload ='username='+username;
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.onreadystatechange = function()
    {
        if (request.readyState==4 && request.status==200) {
            var user = JSON.parse(request.responseText);
            if (user[0] != undefined) {
                document.getElementById("usernameRegisteredStatus").className = 'error';
                document.getElementById("usernameRegisteredStatus").innerHTML = 'User exists';
                submitButton = document.getElementsByName("clickMe")[0];
                submitButton.disabled = true
            } else {
                document.getElementById("usernameRegisteredStatus").className = '';
                document.getElementById("usernameRegisteredStatus").innerHTML = '';
                submitButton = document.getElementsByName("clickMe")[0];
                submitButton.disabled = false;
            }
        }
    };
    request.send(payload);
}
/**
 * validates username on keyup to check if username has any special characters.
 */
function validateUsername()
{
    var username = document.getElementsByName("username")[0].value;
    var isValid = username.search(/[^a-z0-9]/gi);
    var submitButton = document.getElementsByName("clickMe")[0];

    if (isValid != -1) {
        document.getElementById("usernameRegisteredStatus").className = 'error';
        document.getElementById("usernameRegisteredStatus").innerHTML = 'No special characters';
        submitButton.disabled = true
    } else {
        document.getElementById("usernameRegisteredStatus").className = '';
        document.getElementById("usernameRegisteredStatus").innerHTML = '';
        submitButton.disabled = false
    }
}

/**
 * Validates password to make sure it is of appropriate length
 */
function validatePassword()
{
    var passwordObj = document.getElementsByName("password")[0];
    var passwordStatusObj = document.getElementById("password-status");
    var submitButton = document.getElementsByName("clickMe")[0];
    var password = passwordObj.value;
    if (password.length < 8) {
        passwordStatusObj.className = 'error';
        passwordStatusObj.innerHTML = "Too short";
        submitButton.disabled = true;
    } else {
        passwordStatusObj.className = '';
        passwordStatusObj.innerHTML = "";
        submitButton.disabled = false;
    }
}

/**
 * If any of the spans in the form have an error class on them form will not submit.
 * @returns {boolean}
 */
function checkErrors()
{
    var usernameRegisteredStatus = document.getElementById("usernameRegisteredStatus").className;
    var passwordStatus = document.getElementById("password-status").className;
    if (usernameRegisteredStatus == 'error' || passwordStatus == 'error') {
        return false;
    } else {
        return true;
    }
}

