document
    .getElementById("my-form-register")
    .addEventListener("submit", function (event) {
        function checkError(input, error) {
            event.preventDefault();
            const errorMessage = input.validationMessage;
            error.classList.remove("d-none");
            console.log("Errore di validazione:", errorMessage);
            input.classList.add("error");
        }

        function checkErrorRequired(inputValue, input, error) {
            if (inputValue == "") {
                checkError(input, error);
            }
        }

        /* name */
        const nameInput = document.getElementById("name");
        const nameInputValue = nameInput.value;
        const nameError = document.getElementById("nameError");
        const nameErrorRequired = document.getElementById("nameErrorRequired");

        // surname

        const surnameInput = document.getElementById("surname");
        const surnameInputValue = surnameInput.value;
        const surnameError = document.getElementById("surnameError");
        const surnameErrorRequired = document.getElementById(
            "surnameErrorRequired"
        );

        //address
        const addressInput = document.getElementById("address");
        const addressInputValue = addressInput.value;
        const addressError = document.getElementById("addressError");
        const addressErrorRequired = document.getElementById(
            "addressErrorRequired"
        );

        //Email
        const emailInput = document.getElementById("email");
        const emailInputValue = emailInput.value;
        const emailError = document.getElementById("emailError");
        const emailErrorRequired =
            document.getElementById("emailErrorRequired");

        //Password
        const PasswordInput = document.getElementById("password");
        const PasswordInputValue = PasswordInput.value;
        const PasswordError = document.getElementById("passwordError");
        const passwordErrorRequired = document.getElementById(
            "passwordErrorRequired"
        );

        //confirmPassword
        const confirmPasswordInput =
            document.getElementById("password-confirm");
        const confirmPasswordInputValue = confirmPasswordInput.value;

        //check required

        //surname
        checkErrorRequired(nameInputValue, nameInput, nameErrorRequired);
        checkErrorRequired(
            surnameInputValue,
            surnameInput,
            surnameErrorRequired
        );

        //address
        checkErrorRequired(
            addressInputValue,
            addressInput,
            addressErrorRequired
        );

        //password
        checkErrorRequired(emailInputValue, emailInput, emailErrorRequired);
        checkErrorRequired(
            PasswordInputValue,
            PasswordInput,
            passwordErrorRequired
        );

        //name, surname and address validation
        function checkErrorlenght(inputValue, input, error, length) {
            if (inputValue.length > length) {
                checkError(input, error);
            }
        }

        checkErrorlenght(nameInputValue, nameInput, nameError, 50);
        checkErrorlenght(surnameInputValue, surnameInput, surnameError, 50);
        checkErrorlenght(addressInputValue, addressInput, addressError, 255);

        //password validation
        if (PasswordInputValue != confirmPasswordInputValue) {
            checkError(PasswordInput, PasswordError);
        }

        //email validation

        if (!emailInputValue.includes("@") || !emailInputValue.includes(".")) {
            checkError(emailInput, emailError);
        }

        //take At and Point index
        let positionAt = emailInputValue.indexOf("@") + 1;
        let positionPoint = emailInputValue.indexOf(".");

        //check if there is text beetween @ and .
        if (emailInputValue.substring(positionAt, positionPoint) == "") {
            checkError(emailInput, emailError);
        }

        //check if there is text beetween start and @
        if (positionAt - 1 == 0) {
            checkError(emailInput, emailError);
        }

        //check if there is text beetween . and end
        if (positionPoint == emailInputValue.length - 1) {
            checkError(emailInput, emailError);
        }
    });
