<?php 
// Ovo je komenter, koristi se za opis koda, ne izvrsavaju se naredbe koje su oznacene kao komentar

// 1. Koncept PROMENLJIVIH odnosno VARIJABLI. Varijable pretstavljaju polja u memoriji koja cuvaju odredjeni podatak
// Polja mogu da prime vrste podataka kao sto su BROJEVI, TEKSTUALNE VREDNOSTI, DATUMI, itd.
$ime = "Polje u memoriji za podatak 'ime'"; // ; oznacava kraj linije koda
$broj = 1;
// 2. NIZOVI pretstavljaju skup vise promenljivih vrednosti, odnosno vise memorijskih polja u okviru jedne promenljive
$imena = array('Pera', 'Aleksa', 'Jovan');
//Promenljive u okviru niza se broje od 0. Konkretnoj Promenljivoj u okviru niza se pristupa navodjenjem rednog broja u okviru zagrade []

echo "Ja se zovem " . $imena[0] . "."; // Ispisace se na ekranu "Ja se zovem Pera."
// echo je ugradjena funkcija u okviru programskog jezika i oznacava ispis na ekranu, postoje na desetine ovakvih ugradjenih funkcija koje omogucavaju programiranje. . Predstsvlja komandu spajanja teksta i varijabli prilikom stampanja na ekranu.

// 3. USLOVNE ODREDBE 
if ($broj < 20) { // {} predstavljaju granice bloka koda, odnosno pocetak i kraj bloka koda
    // Blok koda koji se izvrsava ako je uslov iz zagrade tacan
    echo "Broj je manji od 20";
} else { // Blok koda koji se izvrsava ukoliko uslov iz zagrade nije tacan
    echo "Broj je 20 ili veci";
}

// 4. PETLJE, ondosno PONAVLJAJUCI ISKAZI. Blok koda se izvrsava onoliko puta (ponavlja), koliko je navedeno u zagradi
while($broj <= 5) {
    // Sve u okviru ovog bloka ce se izvrsiti 5 puta
    echo $broj . ", "; // ispisace se na ekranu: 1, 2, 3, 4, 5, 
    $broj++; // Brojac, koji se uvecava za 1. Kako bi se kontrolisao broj ponavljanja definisan u zagradi
}

// 5. FUNKCIJE predstavljaju blok koda koji se izvrsava kada se ta funkcija pozove. Funkcije mogu da prime podatak, odnosno promenljivu koja se dalje koristi u okviru Funkcije, odnosno bloka koda koji je napisan u okviru funkcije
function napisiIme($ime) {
    echo $ime;  // ispisuje se na ekranu: Polje u memoriji za podatak 'ime' 
}
  
napisiIme($ime); // Pozivanje funkcije navodjenjem imena funkcije i zagrade nakon naziva, kao i podatak koji se salje u funkciju.


















?>