<div class="container-fluid my-3 col-md-11">
    <?php
    if($history !=null) { 
    ?>
<h3 class="fs-4 mb-3 text-center">Historique des locations : </h3>
<div class="row">
            <div class="col">
                <table class="table bg-white rounded shadow-sm table-hover" style="width: 100%;">
                    <thead>
                        <th scope="col">Id Location</th>
                        <th scope="col">Proprietaire</th>
                        <th scope="col">Marque du vehicule</th>
                        <th scope="col">Debut</th>
                        <th scope="col">Fin</th>

                    </thead>
                    <tbody>
                            <?php foreach ($history as $e) : ?>
                                <tr>
                                    <td><?= $e["ID_LOCATION"] ?></td>
                                    <td><?= $e["PROPRIETAIRE"] ?></td>
                                    <td><?= $e["MARQUE_VOITURE"] ?></td>
                                    <td><?= $e["date_debut"] ?></td>
                                    <td><?= $e["date_fin"] ?></td>
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
        <h3 class="fs-4 mb-3 text-center">Pas encore d'historique</h3>
        </div>
        <?php
    }
    ?>
</div>

