let form = document.forms.codeForm;


function validateForm(){
    if (form.code.value == "") {
        alert(`code must be filled out`);
        return false;
    }
    if (form.service.value == "" || form.phone.value == "") {
        alert(`try again later!!`);
        return false;
    }
    return true;
}