import './bootstrap';

const submitcontent = document.querySelector('.--submit');

if(submitcontent) {
    submitcontent.addEventListener('click', () => {
        // submitcontent.submit()
        submitcontent.disabled = true;
    })
    }
    // mainform.prop('disabled', true)
