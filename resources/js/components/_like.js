//Like posts with fetch
const like = document.querySelectorAll('.like')
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

like.forEach(button => {
    button.addEventListener('click', () => {
        button.classList.toggle('liked')

        const path = button.dataset.path

        fetch(path, {
            headers: {
                'Content-Type': 'application/json',
            },
            method: 'post',
            credentials: 'same-origin',
            body: JSON.stringify({
                '_token': csrf
            })
        })
    })
})
