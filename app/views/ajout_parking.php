<form id="parking_formulaire" class="text-center">
    <h3 class="fs-4 mb-3 text-center fw-bold" style="margin-top: 20px;">Ajouter un parking :</h3>
    <div class="shadow-sm d-flex justify-content-around align-items-center fs-5 fw-bold" id="message" style="display: none !important; background-color: #43bb8f; height: 50px !important;">
    </div>
    <div class="row g-3 justify-content-center" style="margin-top: 30px;">
        <div class="col-md-6 col-lg-4">
            <label for="inputIdQuartier" class="form-label fw-bold">Id Quartier</label>
            <select name="inputIdQuartier" id="inputIdQuartier" class="form-select rounded" style="width: 100%; height: 45px;" required>
                <option value=1>1 : Mahamasina</option>
                <option value=2>2 : 67Ha</option>
            </select>
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="inputNumPlace" class="form-label fw-bold">Numéro du parking</label>
            <input type="number" class="form-control" id="inputNumPlace" style="height: 45px; font-size: 16px;" required>
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="inputTypePlace" class="form-label fw-bold">Type du place</label>
            <select name="inputTypePlace" id="inputTypePlace" class="form-select rounded" style="width: 100%; height: 45px;" required>
                <option value="normale">Normale</option>
                <option value="handicapé">Handicapé</option>
            </select>
        </div>
    </div>
</form>
<div class="d-flex justify-content-center mt-3">
    <button onclick="ajouter_parking()" class="btn btn-primary" style="font-size: 18px; height: 40px; min-width: 200px;">Ajouter</button>
</div>
