/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap')

//Register .delete buttons to remove parent element
const deleteButtons = document.querySelectorAll('.delete')

deleteButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.target.parentElement.parentElement.removeChild(parent)
    })
})

//Image preview
const imgContainer = document.querySelectorAll('.image-upload')

imgContainer.forEach(function(img) {
    img.querySelector('input').addEventListener('change', function(event) {
        //Create file reader
        let reader = new FileReader()

        //Input file
        let file = event.target.files[0]

        let parent = event.target.closest('.image-upload')

        //Register eventlistener for reader
        //This event will be called once reader.readAsDataUrl has finished
        reader.addEventListener(
            'load',
            function() {
                //Hide upload button, (shows on hover)
                parent.classList.add('hidden')

                //Set uploaded file as background on
                parent.setAttribute(
                    'style',
                    `background: url(${reader.result});
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center;`,
                )
            },
            false,
        )

        if (file) {
            reader.readAsDataURL(file)
        }
    })
})
