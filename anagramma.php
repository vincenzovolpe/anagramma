<?php

class ANAGRAMMA
{
    // Proprietà
    private string $needle = "";
    private string $haystack = "";

    // Metodi

    // Costruttore
    public function __construct($needle, $haystack)
		{   
           
			$this->needle = $needle;
            $this->haystack = $haystack;
		}	

    // Settaggio prima stringa    
	public function getNeedle() {
		return $this->needle;
	}		

    // Settaggio seconda stringa
    public function getHaystack() {
		return $this->haystack;
	}	

    /* Metodo per controllare se la stringa s2 contiene l'anagramma della stringa s1 come sua sottostringa */
    public function anagramma(string $s1, string $s2): bool
    {   
        // Variabile usata per memorizzare l'anagramma eventualmente trovato in una sottostringa della seconda stringa inserita a video dall' utente
        global $anagramma_trovato;

        // Variabile usata per valutare se la prima stringa è più lunga della seconda
        global $maggiore;

        $maggiore = 0;
        
        // Creiamo due array di 26 elementi quante sono le lettere dell'alfabeto (A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z) per memorizzare la frequenza delle lettere dell'alfabeto delle due stringhe, inizializzando inizialmente tutti i valori a zero
        $frequenza_caratteri_s2 = array_fill(0,26,0);
        $frequenza_caratteri_s1 = array_fill(0,26,0);
        
        // Memorizziamo in due variabili la lunghezza delle due stringhe inserite a video dall' utente
        $lunghezza_s1 = strlen($s1);
        $lunghezza_s2 = strlen($s2);

        // Controlliamo se la lunghezza ddella prima stringa supera la lunghezza della seconda in caso positivo mandiamo un alert a video uscendo dallo script
        if ($lunghezza_s1 > $lunghezza_s2)
        {
            $maggiore = 1; 
            return false;
        }

        // Creiamo gli indici per spostarci nell'array delle frequenze di caratteri
        $sinistra = 0;
        $destra = 0;

        // Memorizziamo la frequenza dei caratteri di s1 nel rispettivo array creato in precedenza e memorizziamo la frequenza dei caratteri relativamente ad una sottostringa di s2 di lunghezza pari a s1 nel rispettivo array creato in precedenza
        while ($destra < $lunghezza_s1)
        {
            $frequenza_caratteri_s1[ord($s1[$destra]) - ord('a')] += 1;
            $frequenza_caratteri_s2[ord($s2[$destra]) - ord('a')] += 1;
            $destra++;
        }
        $destra -= 1;
        
        // Tecnica dello Sliding Windows: manteniamo una finestra scorrevole di lunghezza pari alla lunghezza della stringa s1 utilizzando due indici (sinistra e destra) che puntano all'inizio e alla fine della sottostringa. La finestra scorrevole continua a muoversi in avanti. Ogni volta che sposta un carattere, possiamo ricalcolare l'hash della sottostringa corrente e verificare se è uguale all'hash della stringa s1. 
        while ($destra < $lunghezza_s2)
        {   
            // Controlliamo per ogni sottostringa di S2 di lunghezza uguale alla lunghezza di S1, se entrambi gli Hashmap risultano uguali
            if (($frequenza_caratteri_s1 === $frequenza_caratteri_s2))
            {   
                // Metto in una variabile l'anagramma trovato in una sottostringa di s2
                for ($i = $lunghezza_s1 - 1; $i > -1; $i--) { 
                    $anagramma_trovato .= $s2[$destra - $i];
                }
                return true;
            }
            $destra++;
            if ($destra != $lunghezza_s2)
            {
                $frequenza_caratteri_s2[ord($s2[$destra]) - ord('a')] += 1;
            }
            $frequenza_caratteri_s2[ord($s2[$sinistra]) - ord('a')] -= 1;
            $sinistra++;
        }
        return false;
    }
    
}


if (isset($_POST['primastringa']) && $_POST['secondastringa'] ) {

    // Trasformo le stringhe in minuscolo (in modo che la logica sia case insensitive)
    $prima_stringa  =  strtolower($_POST['primastringa']);
    $seconda_stringa = strtolower($_POST['secondastringa']);

    // Istanzio un oggetto di tipo Anagramma passando al costruttore le due stringhe fornite dall' utente
    $anagramma = new ANAGRAMMA($prima_stringa, $seconda_stringa);


    if ($anagramma->anagramma($anagramma->getNeedle(), $anagramma->getHaystack()))
        {
            echo json_encode(array('success' => 1, 'stringa_uno' => $prima_stringa, 'anagramma_trovato' => $anagramma_trovato, 'stringa_due' => $seconda_stringa));
        }
    elseif($maggiore) 
        {
            echo json_encode(array('success' => 0, "maggiore" => $maggiore));
        }
    else {
        echo json_encode(array('success' => 0, "maggiore" => $maggiore));
    }
} else {

    echo json_encode(array('success' => 0, "maggiore" => $maggiore));

}

?>
