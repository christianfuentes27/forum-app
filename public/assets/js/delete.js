(function () {

    document.addEventListener('click', clickDocument);

    function clickDocument(event) {
        var target = event.target;
        if(target.tagName === 'A' && target.classList.contains('deletePost')) {
            let name = target.dataset.name;
            let url = target.dataset.url;
            confirmDelete(name, url);
        }
    }

    function confirmDelete(name, url) {
        let form = document.getElementById('deleteForm');
        if(confirm('Delete ' + name + '?')) {
            form.action = url;
            form.submit();
        }
    }

})();