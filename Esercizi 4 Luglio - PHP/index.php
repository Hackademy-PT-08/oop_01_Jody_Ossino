<?php

// Traccia 1:
// - Crea una classe Company che abbia i seguenti attributi pubblici:

// name: nome dell’azienda;
// location: stato in cui è ubicata la sede dell’azienda;
// tot_employees: numero di dipendenti assunti in quella sede.


// - Crea 5 istanze di 5 aziende diverse


// - Crea un metodo che permetta di stampare a terminale la seguente frase: “L’ufficio Aulab con sede in Italia ha ben 50 dipendenti“; se la sede non ha dipendenti, allora stampa: “L’ufficio Aulab con sede in Italia non ha dipendenti“;
// - Definisci un attributo statico: 

// avg_wage, con valore 1500.


// - Implementa un nuovo metodo che, per ogni oggetto Company istanziato, calcoli la spesa annuale e la stampi per ogni oggetto. 

// - Implementa un metodo statico che permetta di stampare a terminale il totale assoluto di tutte le aziende messe insieme.


class Company {

    public $name;
    public $location;
    public $tot_employees;
    public static $avg_wage;
    public static $total_cost = 0;

    public function __construct($name, $location, $tot_employees = 1) {
        $this->name = $name;
        $this->location = $location;
        $this->tot_employees = $tot_employees;
        self::$avg_wage = 1500;
    }

    public function companyDetails(){

        if($this->tot_employees == 0){
            echo " Gli uffici di $this->name con sede in $this->location non hanno dipendenti! \n";
        } else echo " Gli uffici di $this->name con sede in $this->location ha ben $this->tot_employees dipendenti. \n";

    }

    public function calculateCost(){
     
        $businessExpenses_month = self::$avg_wage * $this->tot_employees;

        $businessExpenses_year = $businessExpenses_month * 12;

        echo " $this->name paga i suoi dipendenti " . self::$avg_wage . "€ al mese, le spese annuali di $this->name saranno pari a " . $businessExpenses_year . "€. \n";

        self::$total_cost += $businessExpenses_year;
    }

    public static function getTotalCost() {
        return self::$total_cost;
    }

}

$Aulab = new Company("Aulab", "Italia", 150);
$Google = new Company("Google", "California", 135.301);
$Apple = new Company("Apple", "California", 190.000);
$Microsoft = new Company("Microsoft", "California", 181.000);
$JtechInformatica = new Company("Jtech", "Italia", 0);



$Aulab->companyDetails();
$Google->companyDetails();
$Apple->companyDetails();
$Microsoft->companyDetails();
$JtechInformatica->companyDetails();


$Aulab->calculateCost();
$Google->calculateCost();
$Apple->calculateCost();
$Microsoft->calculateCost();
$JtechInformatica->calculateCost();


$total_cost = Company::getTotalCost();
echo " Il costo annuale totale di tutte le Aziende è di " . $total_cost . "€. \n";