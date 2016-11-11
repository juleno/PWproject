<div class="container top">
    <h3>Explorer les clubs publics</h3>
    <div id="clubs">
        <input type="text" class="form-control search" placeholder="Rechercher... (club, langage, date)"><br>
        <label>Trier par</label><br>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="name">Nom</button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="lastactivity">Dernière activité
            </button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="nbmembers">Nombre de membres</button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="clubdate">Date de création</button>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Dernière activité</th>
                <th>Nombre de membres</th>
                <th>Date de création</th>
            </tr>
            </thead>
            <tbody class="list">
            <?php
            foreach ($clubs as $club) {
                echo '<tr><td class="name"><a href="' . base_url() . 'club/' . $club['id'] . '">' . $club['name'] . '</a></td><td class="desc">' . $club['desc'] . '<br><span class="label label-success">PHP</span>&nbsp;<span class="label label-warning">HTML</span>&nbsp;<span class="label label-info">CSS</span>&nbsp;</td><td class="lastactivity">' . date('d/m/Y H:i', $club['clubdate']) . '</td><td class="nbmembers">5</td><td class="clubdate">' . date('d/m/Y H:i', $club['clubdate']) . '</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>