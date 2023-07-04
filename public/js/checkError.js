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
    const specializationError = document.getElementById("specializationError");

    /* at least one checked function */
    const atLeastOneChecked = checkboxInputsArray.some(function (checkbox) {
        return checkbox.checked;
    });

    // Check if number is beetwen  9 and 16 */
    if (
        phoneNumberInputValue.toString().length < 9 ||
        phoneNumberInputValue.toString().length > 16
    ) {
        // Prevent form sent
        event.preventDefault();

        const errorMessage = phoneNumberInput.validationMessage;
        console.log("Errore di validazione:", errorMessage);
        phoneNumberInput.classList.add("error");
        phoneNumberError.classList.remove("d-none");
    }
    /* check if address is biggest then 255 */
    if (addressInputValue.length > 255) {
        // Prevent form sent
        event.preventDefault();
        const errorMessage = addressInput.validationMessage;
        addressError.classList.remove("d-none");

        console.log("Errore di validazione:", errorMessage);
        addressInput.classList.add("error");
    }
    if (!atLeastOneChecked) {
        // Prevent form sent
        event.preventDefault();
        specializationError.classList.remove("d-none");
    }
});
