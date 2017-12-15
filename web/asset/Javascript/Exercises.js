var baseurl = 'http://localhost:8000';
$(document).ready(function () {


    showExercises();


    $(document).on('click', '.toggleFavorite', function () {
        var id = $(this).closest('div.rcorners').attr('id');
        var name = $('p.name').attr('id');
        toggleFavorites(id, name);
    });

    function showExercises() {
        $.ajax({
            type: 'GET',
            url: baseurl + "/api/exercises/get",
            data: 'data',
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            }
        })
    }


    function toggleFavorites(id, name){
        var data = {};
        data.exid = id;
        data.name = name;
        console.log(data);
        $.ajax({
            type: 'put',
            url: baseurl + 'api/exercises/' + id,
            dataType: 'json',
            data: JSON.stringify(data),
            success: function (response) {
                console.log(response);
            }
        })
    }

    function changeButton() {

    }
});

