$(document).ready(function () {
    restApi.initialize();
});

// restGetResult
// restPostResult
// restPutResult
// restDeleteResult

// <strong>Státus üzenet: </strong>

restApi = {

    statusMessage: document.getElementById('message'),

    initialize() {
        // this.showStatusMessage();

        if (typeof restGetResult.data !== 'undefined'){
            this.createParagraphGet();
            this.statusMessage.innerHTML = '<strong>' + restGetResult.message + '</strong>';
        }
        if (typeof restPostResult.data !== 'undefined'){
            this.statusMessage.innerHTML = '<strong>' + restPostResult.message + '</strong>';
        }
        if (typeof restPutResult.data !== 'undefined'){
            this.statusMessage.innerHTML = '<strong>' + restPutResult.message + '</strong>';
        }
        if (typeof restDeleteResult.data !== 'undefined'){
            this.statusMessage.innerHTML = '<strong>' + restDeleteResult.message + '</strong>';
        }
    },

    showStatusMessage() {
        if (restGetResult.message !== ''){

        }

        if (typeof restPostResult.message !== 'undefined'){
            this.statusMessage.innerHTML = '<strong>' + restPostResult.message + '</strong>';
        }

        if (typeof restPutResult.message !== 'undefined'){
            this.statusMessage.innerHTML = '<strong>' + restPutResult.message + '</strong>';
        }

        if (restDeleteResult.message !== ''){
            this.statusMessage.innerHTML = '<strong>' + restDeleteResult.message + '</strong>';
        }
    },

    createParagraphGet() {
        const container = document.getElementById('getResult');

        for (let i = 0; i < restGetResult.data.length; i++) {
            let paragraph = document.createElement('p');
            paragraph.innerHTML = '<strong class="red-text">ID: </strong> ' + restGetResult.data[i].id +
                '<strong class="red-text"> Név: </strong>' + restGetResult.data[i].employee_name +
                '<strong class="red-text"> Fizetés: </strong>' + restGetResult.data[i].employee_salary +
                '<strong  class="red-text"> Kor: </strong>'+ restGetResult.data[i].employee_age;
            container.appendChild(paragraph)
        }
    },
}