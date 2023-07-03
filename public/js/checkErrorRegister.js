document
    .getElementById("my-form-register")
    .addEventListener("submit", function (event) {
        console.log("prova");
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

        //Password
        const PasswordInput = document.getElementById("password");
        const PasswordInputValue = PasswordInput.value;
        const PasswordError = document.getElementById("passwordError");

        //confirmPassword
        const confirmPasswordInput =
            document.getElementById("password-confirm");
        const confirmPasswordInputValue = confirmPasswordInput.value;
        const confirmPasswordError = document.getElementById(
            "password-confirm-error"
        );

        //name validation
        if (nameInputValue.length > 50) {
            const errorMessage = nameInput.validationMessage;
            nameError.classList.remove("d-none");
            nameError.classList.add("d-block");
            console.log("Errore di validazione:", errorMessage);
            nameInput.classList.add("error");

            // Previeni l'invio del form
            event.preventDefault();
        }

        //surname validation
        if (surnameInputValue.length > 50) {
            const errorMessage = surnameInput.validationMessage;
            surnameError.classList.remove("d-none");
            surnameError.classList.add("d-block");
            console.log("Errore di validazione:", errorMessage);
            surnameInput.classList.add("error");

            // Previeni l'invio del form
            event.preventDefault();
        }

        //address validation
        if (addressInputValue.length > 255) {
            const errorMessage = addressInput.validationMessage;
            addressError.classList.remove("d-none");
            addressError.classList.add("d-block");
            console.log("Errore di validazione:", errorMessage);
            addressInput.classList.add("error");

            // Previeni l'invio del form
            event.preventDefault();
        }

        //password validation

        if (PasswordInputValue != confirmPasswordInputValue) {
            const errorMessage = PasswordInput.validationMessage;
            PasswordError.classList.remove("d-none");
            PasswordError.classList.add("d-block");
            console.log("Errore di validazione:", errorMessage);
            PasswordInput.classList.add("error");

            // Previeni l'invio del form
            event.preventDefault();
        }
    });
