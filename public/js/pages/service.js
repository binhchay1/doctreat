var services = ['#keep', '#training', '#gym', '#feat', '#groom', '#salon'];

$(document).ready(function () {
    $('#descriptionLabel').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let title = button.data('title');
        let type = button.data('type');
        let element = '#' + type;
        let modal = $(this);

        for (let i = 0; i < services.length; i++) {
            let elementCheck = document.querySelector(services[i]);
            let hasBlock = elementCheck.classList.contains('d-block');
            let hasNone = elementCheck.classList.contains('d-none');
            if (hasBlock == true) {
                $(services[i]).removeClass('d-block');
            }

            if (hasNone == false) {
                $(services[i]).addClass('d-none');
            }
        }

        modal.find('.modal-header #description-modal-title').text(title);
        $(element).removeClass('d-none');
        $(element).addClass('d-block');
    });
});