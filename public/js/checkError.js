//const inputField = document.querySelectorAll("form-control");

document.getElementById("my-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const phoneNumberInput = document.getElementById("phone_number");

    // Verifica la validità dell'input
    if (
        phoneNumberInput.toString().length < 9 ||
        phoneNumberInput.toString().length > 16
    ) {
        //phoneNumberInput.classList.add("error");
        const errorMessage = phoneNumberInput.validationMessage;

        console.log("Errore di validazione:", errorMessage);
        phoneNumberInput.classList.add("error");
        // Previeni l'invio del form
    }
});
