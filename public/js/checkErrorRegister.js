document
    .getElementById("my-form-register")
    .addEventListener("submit", function (event) {
        /* name */
        const nameInput = document.getElementById("name");
        const nameInputValue = nameInput.value;
        const nameError = document.getElementById("nameError");

        // surname

        const surnameInput = document.getElementById("surname");
        const surnameInputValue = surnameInput.value;
        const surnameError = document.getElementById("surnameError");

        //address
        const addressInput = document.getElementById("address");
        const addressInputValue = addressInput.value;
        const addressError = document.getElementById("addressError");

        //Email
        const emailInput = document.getElementById("email");
        const emailInputValue = emailInput.value;
        const emailError = document.getElementById("emailError");

        //Password
        const PasswordInput = document.getElementById("password");
        const PasswordInputValue = PasswordInput.value;
        const PasswordError = document.getElementById("passwordError");

        //confirmPassword
        const confirmPasswordInput =
            document.getElementById("password-confirm");
        const confirmPasswordInputValue = confirmPasswordInput.value;

        //name validation
        if (nameInputValue.length > 50) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = nameInput.validationMessage;
            nameError.classList.remove("d-none");
            console.log("Errore di validazione 1:", errorMessage);
            nameInput.classList.add("error");
        }

        //surname validation
        if (surnameInputValue.length > 50) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = surnameInput.validationMessage;
            surnameError.classList.remove("d-none");
            console.log("Errore di validazione 2:", errorMessage);
            surnameInput.classList.add("error");
        }

        //address validation
        if (addressInputValue.length > 255) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = addressInput.validationMessage;
            addressError.classList.remove("d-none");
            console.log("Errore di validazione 3:", errorMessage);
            addressInput.classList.add("error");
        }

        //password validation
        if (PasswordInputValue != confirmPasswordInputValue) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = PasswordInput.validationMessage;
            PasswordError.classList.remove("d-none");
            console.log("Errore di validazione 4:", errorMessage);
            PasswordInput.classList.add("error");
        }

        //email validation

        if (!emailInputValue.includes("@") || !emailInputValue.includes(".")) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = emailInput.validationMessage;
            emailError.classList.remove("d-none");
            console.log("Errore di validazione 5:", errorMessage);
            emailInput.classList.add("error");
        }

        //take At and Point index
        let positionAt = emailInputValue.indexOf("@") + 1;
        let positionPoint = emailInputValue.indexOf(".");

        //check if there is text beetween @ and .
        if (emailInputValue.substring(positionAt, positionPoint) == "") {
            //Prevent form sent
            event.preventDefault();
            const errorMessage = emailInput.validationMessage;
            emailError.classList.remove("d-none");
            console.log("Errore di validazione 6:", errorMessage);
            emailInput.classList.add("error");
        }

        //check if there is text beetween start and @
        if (positionAt - 1 == 0) {
            //Prevent form sent
            event.preventDefault();
            const errorMessage = emailInput.validationMessage;
            emailError.classList.remove("d-none");
            console.log("Errore di validazione 7:", errorMessage);
            emailInput.classList.add("error");
        }

        //check if there is text beetween . and end
        if (positionPoint == emailInputValue.length - 1) {
            //Prevent form sent
            event.preventDefault();
            const errorMessage = emailInput.validationMessage;
            emailError.classList.remove("d-none");
            console.log("Errore di validazione 8:", errorMessage);
            emailInput.classList.add("error");
        }
    });
