
<div class="container-fluid my-3">
    <?php
    if($donne != null) {

    ?>
    <form id="location_formulaire">
        <div class="row g-3">
        <div class="input-box col-md-3">
            <label for="inputNumPlace"  class="fw-bold" style="margin-bottom: 10px;">Numéro de parking</label><br>
            <select name="inputNumPlace" id="inputNumPlace" class="rounded" style="width: 250px; height: 45px;" required>
            <?php foreach ($donne as $e) : ?>
                <option value=<?= $e["id_p"] ?>><?= $e["p_num"] ?></option>
            <?php endforeach; ?>
            </select>
        </div> 
            <div class="col-md-3">
                <label for="inputVoiture" class="form-label fw-bold">Voiture</label>
                <input type="text" class="form-control" id="inputVoiture" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-3">
                <label for="inputProprietaire" class="form-label fw-bold">Proprietaire</label>
                <input type="text" class="form-control" id="inputProprietaire" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-3">
                <label for="inputContact" class="form-label fw-bold">Contact du proprietaire</label>
                <input type="text" class="form-control" id="inputContact" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-4">
                <label for="inputNumVoiture" class="form-label fw-bold">Numéro de matriculation</label>
                <input type="text" class="form-control" id="inputNumVoiture" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-4">
                <label for="inputType" class="form-label fw-bold">Type de vehicule</label>
                <input type="text" class="form-control" id="inputType" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-4">
                <label for="inputCout" class="form-label fw-bold">Cout du location</label>
                <input type="text" class="form-control" id="inputCout" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-6">
                <label for="inputDateDebut" class="form-label fw-bold">Date de Début de Location</label>
                <input type="date" class="form-control fw-bold" id="inputDateDebut" style="height: 50px; font-size: 16px;" required>
            </div>
            <div class="col-md-6">
                <label for="inputDateFin" class="form-label fw-bold">Date de Fin de Location</label>
                <input type="date" class="form-control fw-bold" id="inputDateFin" style="height: 50px; font-size: 16px;" required>
            </div>
        </div>
    </form>
            <div class="d-flex justify-content-center mt-3">
            <button onclick="ajouter_location()" class="btn btn-primary" style="font-size: 18px; height: 40px; min-width: 200px; margin-bottom: 20px;">Ajouter</button>
            </div>
        <h3 class="fs-4 mb-3 fw-bold">Parking Disponible :</h3>
        <div class="row">
            <div class="col">
                <table class="table bg-white rounded shadow-sm table-hover" style="width: 100%;">
                    <thead>
                        <th scope="col">Numéro du parking</th>
                        <th scope="col">Type de place</th>
                    </thead>
                    <tbody>
                        
                            <?php foreach ($donne as $e) : ?>
                                <tr>
                                    <td><?= $e["p_num"] ?></td>
                                    <td><?= $e["p_place"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    
    <?php
    }else{
        ?>
        <div class=" p-3 bg-white shadow-sm d-flex justify-content-center align-items-center rounded">
        <h3 class="fs-4 mb-3 text-center">Pas de parking disponible</h3>
        </div>
    <?php
    }
    ?>
</div>
