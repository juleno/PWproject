<div class="container top">
    <h1 class="top"><?php echo $club['name'] ?></h1>

    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <p class="lead">Club crée par le <?php echo date("d/m/Y", $club['clubdate']) ?></p>
                <em>
                    <?php echo $club['desc'] ?>
                </em><br><br><h4><?php echo $club['strlabel'] ?></h4><br>
                <a href="#">35 collaborateurs &raquo;</a>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                           aria-expanded="false" aria-controls="collapseOne">
                            Ajouter une publication
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <form action="">
                            <label for="name">Titre :</label>
                            <input type="text" class="form-control" name="title" id="title" required><br>

                            <label for="comment">Contenu :</label>
                            <textarea class="form-control" rows="7" id="content" name="content" required></textarea><br>
                        </form>
                        <form action="abc.php" class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>
                        </form>
                        <hr>
                        <button type="submit" class="btn btn-primary pull-right">Publier</button>
                    </div>
                </div>
            </div>

            <h3>Dernières publications</h3>
            <?php
            echo '<pre><h4>InsertionInteger.java</h4><h5>Ajouté par juleno</h5><code class="java">';
            echo '
package fr.istic.prg1.tp3;

import java.util.Scanner;

public class InsertionInteger {

	private static final int SIZE_MAX = 10;
	private int size;
	private int[] array = new int[SIZE_MAX];
	
	//on initialise size à 0 dans le constructeur
	public InsertionInteger() {
		this.size = 0;
	}
	
	//on créer un tableau d\'entiers copié à partir de array
	public int[] toArray() {
		int[] copie = new int[size];
		for (int i = 0; i < size; i++) {
			copie[i] = array[i];
		}
		return copie;	
	}
	
	public boolean insert(int value) {
		//on vérifie si value est déjà dans array
		for (int i : array) {
			if (value == i) {
				return false;
			} 
		}
		//et si le tableau est plein
		if (size == SIZE_MAX) {
			return false;
		} else {
			//sinon on ajoute value
			array[size] = value;
			//on incremente size
			size++;
			//puis on réorganise la tableau
			triTableau(size, array);
			return true;
		}
	}
	
	public void createArray(Scanner scanner) {
		//tant que le scanner ne lit pas -1 ont lit l\'entier suivant 
		int nombre = scanner.nextInt();
		while(nombre != -1) {
			//et on l\'ajoute au tableau
			insert(nombre);
			nombre = scanner.nextInt();
		}
		scanner.close();
		
	}
	
	public void triTableau(int taille, int[] tab) {
		//algorithme de tri vu en td
		int k = taille - 1;
		boolean echange = true;
		while (k > 0 && echange) {
			echange = false;
			for (int i = 0; i < k; i++) {
				if (tab[i] > tab[i + 1]) {
					int x = tab[i];
					tab[i] = tab[i + 1];
					tab[i + 1] = x;
					echange = true;
				}
			}
			--k;
		}
	}
	
	@Override
	public String toString() {
		//on affiche chaque valer du tableau séparée d\'un espace
		String sortie = "";
		for (int i : array) {
			sortie += " " + String.valueOf(i);
		}
		return sortie;
		
	}
	
}

    ';
            echo '</code></pre>';
            ?>
        </div>
        <div class="col-md-4" id="sidebar">
            <div class="well pull-right">
                <p>Hello</p>
            </div>
        </div>

    </div>
</div>