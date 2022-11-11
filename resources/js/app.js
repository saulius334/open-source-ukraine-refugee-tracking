import './bootstrap';

const submitButton = document.querySelector('.--submit');
const formContent = document.querySelector('.--form');
const checkBoxPets = document.querySelector('.--checkBoxPets');


    function submitForm() {
        formContent.submit();
    }

if(submitButton) {
    submitButton.addEventListener('click', () => {
        submitForm();
        submitButton.disabled = true;
    })
}

if(checkBoxPets) {
    const inputPets = document.querySelector('.--inputPets');
    checkBoxPets.addEventListener('click', () => {
        inputPets.display = block;
    })
}
