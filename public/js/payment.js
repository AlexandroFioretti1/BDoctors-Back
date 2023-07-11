var button = document.querySelector("#submit-button");

braintree.dropin.create(
    {
        authorization: "sandbox_g42y39zw_348pk9cgf3bgyw2b",
        selector: "#dropin-container",
    },
    function (err, instance) {
        button.addEventListener("click", function () {
            instance.requestPaymentMethod(function (err, payload) {
                // Submit payload.nonce to your server
            });
        });
    }
);

// braintree.dropin.create(
//     {
//         // Step three: get client token from your server, such as via
//         //    templates or async http request
//         authorization: CLIENT_TOKEN_FROM_SERVER,
//         container: "#dropin-container",
//     },
//     (error, dropinInstance) => {
//         // Use 'dropinInstance' here
//         // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
//     }
// );
