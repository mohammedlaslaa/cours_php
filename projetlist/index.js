$(document).ready(function () {
    $(".formsend").hide();
    $(".adduser").click(function () {
        $(".formsend").show();
        $(".table, .adduser, .downuser").hide()
    })

    $(".formsend").submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var serializedData = form.serialize();
        $.ajax({
            url: "traitement.php",
            type: 'POST',
            data: serializedData
        }).done(function (data) {
            let datajson = JSON.parse(data)
            // $(".formsend").html("<p class='mt-5 p-3 bg-success text-white'>Success !</p>");
            $('.tbapp').append(`<tr><th>${datajson['lastid']}</th><th>${datajson['lastname']}</th><th>${datajson['firstname']}</th><th>${datajson['mail']}</th><th><a href=listescourses?id=${datajson['lastid']}>Voir les listes</a></th>
            <th> Actif <a href=?desactivateuser=${datajson['lastid']}>Désactiver</a></th>
            <th><a href=updateuser?id=${datajson['lastid']}>Modifier un utilisateur</a></th>
            <th><a href=deleteuser?id=${datajson['lastid']}>Supprimer</a></th></tr>`)
            setTimeout(function () {
                $(".formsend").hide();
                $(".table, .adduser, .downuser").show()
            }, 500)
        }).fail(function () {
            $(".formsend").prepend("<p class='mt-5 p-3 bg-danger text-white'>Opération échouée !</p>");
        });
    });

    $(".formupdate").submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var serializedData = form.serialize();
        console.log(serializedData)
        $.ajax({
            url: "traitementupdate.php",
            type: 'POST',
            data: serializedData,
            success: function (data) {
                alert('OK')
            },
            error: function (err) {
                alert('error !')
            }
        })
    })
})
