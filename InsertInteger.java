package fr.istic.prg1.tp3;

import java.util.Scanner;

public class InsertionInteger {
		
	private static final int SIZE_MAX = 10;
	
	private static int size;
	private static int[] array = new int[SIZE_MAX];
	
	public InsertionInteger() {}
	
	public int[] toArray() {
		
		int[] tabFinal = new int[size];
		for (int i =0 ; i<size ; i++) {
			tabFinal[i] = array[i];
		}
		System.out.println("TAB = "+java.util.Arrays.toString(tabFinal));
		return tabFinal;		
	}
	
	public static boolean insert(int value) {
		int identique = 0;
		for (int i = 0 ; i<size ; i++) {
			
			if(value == array[i]){
				identique = identique +1;
			}
		}
		
		if ((identique == 0) && (size<SIZE_MAX)) {
			array[size] = value;
			size = size+1;
			System.out.println("TAB = "+java.util.Arrays.toString(array)+" .... debut du tri : ");
			
			int cle;
			
			for (int i = 1; i < size; i++) {
				cle = array[i];
				int j = i;
				while ((j >= 1) && (array[j - 1] > cle)) {
					array[j]  = array[j - 1] ;
					j = j - 1;
				}
				array[j] = cle;
			}
			
			System.out.println("TAB trié = "+java.util.Arrays.toString(array));
			System.out.println("_________________");
			return true;
			
		} else {
			if (identique != 0){
				System.out.println("La valeur existe déja dans le tableau");
			}else if (size >= SIZE_MAX){
				System.out.println("La taille max est atteinte");
			}
			return false;
		}
			
	}
	
	public static void createArray(Scanner scanner) {
		
		while(scanner.hasNext()) {
			int value = scanner.nextInt();
			if(value > 0) {
				System.out.println("value traitée = "+value);
				insert(value);
				if (insert(value)==true) {
					System.out.println("insertion réalisée");
				} else {
					System.out.println("insertion non réalisée");
				}
			} else {
				break;
			}
		}
	}
	
	@Override
	public String toString() {
		
		
		return null;
		
	}

}