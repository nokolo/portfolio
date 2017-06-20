console.clear();

function validateform() {
	var lastName = document.getElementById("lastname");
    var firstName = document.getElementById("firstname");
    var email = document.getElementById("email");
    var website = document.getElementById("website");
    if (firstName.value.length == 0) {
        firstName.focus();
        return false;
    }
    if (lastName.value.length == 0) {
        lastName.focus();
        return false;
    }
    if (email.value.length == 0) {
        lastName.focus();
        return false;
    }
    if (website.value.length == 0) {
        lastName.focus();
        return false;
    }
    return true;
}