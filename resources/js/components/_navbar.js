//Navbar burger
const toggle = document.querySelector('.navbar-burger')

toggle.addEventListener('click', event => {
    let target = document.querySelector(event.target.dataset.target)

    event.target.classList.toggle('is-active')
    target.classList.toggle('is-active')
})
