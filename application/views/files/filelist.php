<div class="container top">
    <h3><?php echo $title; ?></h3>
    <h4>Rechercher un fichier</h4>
    <div id="files">
        <input type="text" class="form-control search" placeholder="Rechercher..."><br>
        <label>Trier par</label><br>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="name">Nom</button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="author">Auteur</button>
            <button type="button" class="btn btn-primary btn-sm sort" data-sort="publidate">Date de publication</button>
        </div>
        <br><br>
        <table class="table table-hover">
            <thead>
            <th>Fichier</th>
            <th>Auteur</th>
            <th>Date de publication</th>
            </thead>
            <tbody class="list">
            <?php
            foreach ($files as $file) {
                echo '<tr><td class="name"><a href ="' . base_url() . 'file/' . $club['id'] . '/' . $file['id'] . '">' . $file['name'] . '</a></td><td class="author"><a href="' . base_url() . 'user/' . $file['pseudo'] . '">' . $file['pseudo'] . '</a></td><td class="publidate">' . date('d/m/y H:i:s', $file['publidate']) . '</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>