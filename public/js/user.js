let form = document.forms.userForm;


function validateForm(){
    if (form.first_name.value == "") {
        alert(`first_name must be filled out`);
        return false;
    }
    if (form.last_name.value == "") {
        alert(`last_name must be filled out`);
        return false;
    }
    if (form.email.value == "") {
        alert(`email must be filled out`);
        return false;
    }
    if (form.gender.value != "male" || form.gender.value != "male") {
        alert(`gender must be filled out`);
        return false;
    }
    return true;
}