
<div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$nbr_parking?></h3>
                                <p class="fs-5">Parking installé</p>
                            </div>
                            <i class="fas fa-map-marker-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$parking->nombre_parking_louees()?></h3>
                                <p class="fs-5">Parking louées</p>
                            </div>
                            <i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$pourcentage?>%</h3>
                                <p class="fs-5">Locations en <?=$annee?></p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Parking louer :</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <th scope="col">Voiture</th>
                                <th scope="col">Proprietaire</th>
                                <th scope="col">Numéro de Parking</th>
                                <th scope="col">Date de debut</th>
                                <th scope="col">Date fin</th>
                            </thead>
                            <tbody>
                                <?php
                                if( $data != null) {
                                    foreach( $data as $e) {
                                        if($e["l_fin"] == date("Y-m-d")) {
                                            echo '<tr class="table-danger">';
                                        }else{
                                            echo'<tr>';
                                        }
                                    ?>
                                        <td><?= $e["v_marque"] ?></td>
                                        <td><?= $e["p_nom"] ?></td>
                                        <td><?= $e["n_place"] ?></td>
                                        <td><?= $e["l_debut"] ?></td>
                                        <td><?= $e["l_fin"] ?></td>
                                        <td><button class="btn btn-danger" onclick="finirLocation(<?= $e['location_id'] ?>)">Finir Location</button></td>
                                    <?php
                                    }
                                }else{
                                    echo '<td>Aucun liste definie</td>';
                                }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            