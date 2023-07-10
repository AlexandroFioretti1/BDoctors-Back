

const readElement = document.querySelectorAll('.read');

const cardBodyElement = document.querySelectorAll('.card-body')

const readArray = Array.from(readElement)

readArray.forEach(readText)
function readText(read, index) {
    read.addEventListener("click", function () {
        const messageId = read.dataset.messageId
        //console.log(messageId);

        if (cardBodyElement[index].classList.contains('d-none')) {
            cardBodyElement[index].classList.remove('d-none')
            cardBodyElement[index].classList.add('d-block')

            // axios.patch('/messages/' + messageId, { read: true })
            //     .then(response => {
            //         console.log(response.data);


            //     })
            //     .catch(error => {

            //         console.error(error);
            //     });

        } else {
            cardBodyElement[index].classList.remove('d-block')
            cardBodyElement[index].classList.add('d-none')
        }
    })


};