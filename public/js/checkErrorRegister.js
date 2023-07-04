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
            console.log("Errore di validazione:", errorMessage);
            nameInput.classList.add("error");
        }

        //surname validation
        if (surnameInputValue.length > 50) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = surnameInput.validationMessage;
            surnameError.classList.remove("d-none");
            console.log("Errore di validazione:", errorMessage);
            surnameInput.classList.add("error");
        }

        //address validation
        if (addressInputValue.length > 255) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = addressInput.validationMessage;
            addressError.classList.remove("d-none");
            console.log("Errore di validazione:", errorMessage);
            addressInput.classList.add("error");
        }

        //password validation
        if (PasswordInputValue != confirmPasswordInputValue) {
            // Prevent form sent
            event.preventDefault();
            const errorMessage = PasswordInput.validationMessage;
            PasswordError.classList.remove("d-none");
            console.log("Errore di validazione:", errorMessage);
            PasswordInput.classList.add("error");
        }
    });
