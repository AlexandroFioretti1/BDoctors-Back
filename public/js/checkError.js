//const inputField = document.querySelectorAll("form-control");

document.getElementById("my-form").addEventListener("submit", function (event) {
    /* phone number */
    const phoneNumberInput = document.getElementById("phone_number");
    const phoneNumberInputValue = phoneNumberInput.value;
    const phoneNumberError = document.getElementById("phoneNumberError");
    /* address */
    const addressInput = document.getElementById("address");
    const addressInputValue = addressInput.value;
    const addressError = document.getElementById("addressError");
    /* check input */
    const checkboxInputs = document.querySelectorAll(".form-check-input");
    const checkboxInputsArray = Array.from(checkboxInputs);
    const formGroup = document.querySelector(".formGroup");
    const specializationError = document.getElementById("specializationError");

    /* at least one checked function */
    const atLeastOneChecked = checkboxInputsArray.some(function (checkbox) {
        return checkbox.checked;
    });
    console.log(atLeastOneChecked);

    /*Verifica la validità dell'input
        Check if number is beetwen  9 and 16 */
    if (
        phoneNumberInputValue.toString().length < 9 ||
        phoneNumberInputValue.toString().length > 16
    ) {
        //phoneNumberInput.classList.add("error");
        const errorMessage = phoneNumberInput.validationMessage;
        console.log("Errore di validazione:", errorMessage);
        phoneNumberInput.classList.add("error");
        phoneNumberError.classList.remove("d-none");
        phoneNumberError.classList.add("d-block");
        // Previeni l'invio del form
        event.preventDefault();
    }
    /* check if address is biggest then 255 */
    if (addressInputValue.length > 255) {
        const errorMessage = addressInput.validationMessage;
        addressError.classList.remove("d-none");
        addressError.classList.add("d-block");
        console.log("Errore di validazione:", errorMessage);
        addressInput.classList.add("error");

        // Previeni l'invio del form
        event.preventDefault();
    }
    if (!atLeastOneChecked) {
        specializationError.classList.remove("d-none");
        specializationError.classList.add("d-block");
    }
});
