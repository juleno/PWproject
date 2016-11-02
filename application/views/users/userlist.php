<div class="container top">
    <h3>Liste des utilisateurs</h3>
    <table class="table table-hover">
        <thead>
        <th>Photo</th>
        <th>ID</th>
        <th>Pseudo</th>
        <th>Mail</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Score</th>
        <th>Mail valide</th>
        <th>Admin ?</th>
        <th>Date inscription</th>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            echo '<tr><td><img height="25px" src="' . $user['profilpic'] . '"></td><td>' . $user['id'] . '</td><td>' . $user['pseudo'] . '</td><td>' . $user['mail'] . '</td><td>' . $user['firstname'] . '</td><td>' . $user['lastname'] . '</td><td>' . $user['score'] . '</td><td>' . $user['mailvalid'] . '</td><td>' . $user['isadmin'] . '</td><td>' . date('d/m/y H:i:s', $user['inscridate']) . '</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>