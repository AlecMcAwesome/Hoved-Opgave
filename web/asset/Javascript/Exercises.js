window.onload = function(){
    showExercises();

    function showExercises() {
        $.ajax({
            type: 'GET',
            url: "http://localhost:8000/api/exercises/get",
            data: 'data',
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        })
    }



// Get the modal
    var modal = document.getElementById('myModal');


// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
    $('.showModal').onclick = function() {
        modal.style.display = "block";
        console.log('clicked')
    };

// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
            if (event.target = modal) {
                modal.style.display = "none";
            }
        }

};

