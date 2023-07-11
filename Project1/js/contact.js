document.querySelector('#btnSubmit').addEventListener("click", () => {

    let contactBox = document.querySelector('#contactBox');

    contactBox.innerHTML = `<div style="width:20rem">
        <h1 class="fw-normal d-flex flex-column text-center my-3 mx-2">Thank you for your concern!</h1>
        <p class="fw-normal d-flex flex-column text-center mb-3 mx-2">We will get back to you as soon as possible</p>        
        <div/>`;

})