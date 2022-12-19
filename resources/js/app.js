import './bootstrap';

const submitButton = document.querySelector('.--submit');
const formContent = document.querySelector('.--form');


    function submitForm() {
        formContent.submit();
    }

if(submitButton) {
    submitButton.addEventListener('click', () => {
        submitForm();
        submitButton.disabled = true;
    })
}