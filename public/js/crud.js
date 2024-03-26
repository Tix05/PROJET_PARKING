$(window).on("load", function() {
    $('#message').hide()
   
});

function load_content(affichage,onglet) {
    $.ajax({
        url: 'http://localhost/PROJET_PARKING/app/controller/menuControlleur.php',  
        method: 'GET',            
        dataType: 'html',        
        data: { onglet: onglet },
        
        success: function(data) {
            $('#resultat').html(data);  
        },

        error: function(xhr, status, error) {
            console.error('Erreur Ajax:', status, error);
        }
    });
    $('#onglet_active').html(onglet)
}
function ajouter_location() {
    var formulaireValide = true;
    $("#location_formulaire :input").each(function () {
        if ($(this).val() === "") {
            formulaireValide = false;
             return false; 
        }
    });

    if (formulaireValide) {
        $.ajax({
        url: 'http://localhost/PROJET_PARKING/app/controller/locationControlleur.php',  
        method: 'POST',                    
        data: { 
                numPlace: $('#inputNumPlace').val(),
                nomVoiture: $('#inputVoiture').val(),
                nomProprietaire: $('#inputProprietaire').val(),
                contactProprietaire: $('#inputContact').val(),
                numMatriculation: $('#inputNumVoiture').val(),
                typeVehicule: $('#inputType').val(),
                coutLocation: $('#inputCout').val(),
                dateDebut: $('#inputDateDebut').val(),
                dateFin: $('#inputDateFin').val(),
              },
        
        success: function(data) {
            $('#resultat').html(data); 

        },

        error: function(xhr, status, error) {
            console.error('Erreur Ajax:', status, error);
        }
    });
        } else {
            alert("Veuillez remplir tous les champs du formulaire.");
    }   
}

function finirLocation(id_location) {
    $.ajax({
        url: 'http://localhost/PROJET_PARKING/app/controller/historiqueControlleur.php',  
        method: 'POST',            
        dataType: 'html',        
        data: { id_location: id_location },
        success: function(data) {
            $('#resultat').html(data);  
        },

        error: function(xhr, status, error) {
            console.error('Erreur Ajax:', status, error);
        }
    });
}
function ajouter_parking() {
    var formulaireValide = true;
    $("#parking_formulaire :input").each(function () {
        if ($(this).val() === "") {
            formulaireValide = false;
             return false; 
        }
    });

    if (formulaireValide) {
        $.ajax({
        url: 'http://localhost/PROJET_PARKING/app/controller/parkingControlleur.php',  
        method: 'POST',                    
        data: { 
                idQuartier: $('#inputIdQuartier').val(),
                numPlace: $('#inputNumPlace').val(),
                typePlace: $('#inputTypePlace').val(),
                disponibilite: $('#inputDisponibillite').val(),
              },
        
        success: function(data) {
            $('#resultat').html(data); 
            $('#message').show();
            $('#message').html("Insérée avec succès!");
            
        },

        error: function(xhr, status, error) {
            console.error('Erreur Ajax:', status, error);
        }
    });
        } else {
            alert("Veuillez remplir tous les champs du formulaire.");
    }   
}