document
    .querySelectorAll('.delete-admin')
    .forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault();

            const id = this.getAttribute('data-id');

            fetch(`/delete-admin/${id}`, {
                method: 'DELETE'
            }).then(() => {
                const tr = this.parentNode.parentNode;

                tr.parentNode.removeChild(tr);
            });
        });
    });

document
    .querySelectorAll('.delete-theme')
    .forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault();

            const id = this.getAttribute('data-id');

            fetch(`/delete-theme/${id}`, {
                method: 'DELETE'
            }).then(() => {
                const tr = this.parentNode.parentNode;

                tr.parentNode.removeChild(tr);
            });
        });
    });

document
    .querySelectorAll('.delete-question')
    .forEach(function (element) {
        element.addEventListener('click', function (e) {
            e.preventDefault();

            const id = this.getAttribute('data-id');

            fetch(`/delete-question/${id}`, {
                method: 'DELETE'
            }).then(() => {
                const tr = this.parentNode.parentNode;

                tr.parentNode.removeChild(tr);
            });
        });
    });


