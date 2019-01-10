<?php
function KovertHuruf($huruf){
    $huruf = strtr(
        $huruf,
        array(
            'se'         => '1',
            'satu'       => '1',
            'dua'       => '2',
            'tiga'     => '3',
            'empat'      => '4',
            'lima'      => '5',
            'enam'       => '6',
            'tujuh'     => '7',
            'delapan'     => '8',
            'sembilan'      => '9',
            'sepuluh'       => '10',
            'sebelas'    => '11',
            'dua belas'    => '12',
            'tiga belas'  => '13',
            'empat belas'  => '14',
            'lima belas'   => '15',
            'enam belas'   => '16',
            'tujuh belas' => '17',
            'delapan belas'  => '18',
            'sembilan belas'  => '19',
            'dua puluh'    => '20',
            'tiga puluh'    => '30',
            'empat puluh'     => '40',
            'lima puluh'    => '50', 
            'enam puluh'     => '60',
            'tujuh puluh'   => '70',
            'delapan puluh'    => '80',
            'sembilan puluh'    => '90',
            'ratus'   => '100',
            'ribu'  => '1000',
            'juta'   => '1000000',
            'milyar'   => '1000000000',
        )
    );
    $parts = preg_split('/[\s-]+/', $huruf);

	$_total = 0;
    $_total_temp = 0;
    foreach ($parts as $v) {
        if($v==100 && $_total_temp > 10){
            throw new Exception("Invalid Input!!!");
            
        }
        if ($v >= 100 ) {
            $_total_temp = $_total_temp * $v;
        }
        else{
            $_total_temp = $_total_temp + $v;
        }
        if($v > 100) {
            $_total += $_total_temp;
            $_total_temp = 0;
        }

    }
    return $_total + $_total_temp;
    

}

try {
    echo ("</br>input : lima ratus dua puluh lima");
    echo ("</br>output : ".number_format(KovertHuruf("lima ratus dua puluh lima")));    
    echo ("</br>input : tiga ratus lima puluh satu juta delapan ribu sembilan ratus empat");
    echo ("</br>output : ".number_format(KovertHuruf("tiga ratus lima puluh satu juta delapan ribu sembilan ratus empat")));
    echo ("</br>input : tujuh puluh tiga ribu delapan belas ratus lima puluh sembilan"); 
    echo ("</br>output : ".number_format(KovertHuruf("tujuh puluh tiga ribu delapan belas ratus lima puluh sembilan")));
   
}

catch(Exception $e) {
  echo '</br>Message: ' .$e->getMessage();
}
finally {
    echo ("</br>input : dua puluh tiga ribu lima ratus tiga puluh dua"); 
    echo ("</br>output : ".number_format(KovertHuruf("dua puluh tiga ribu lima ratus tiga puluh dua")));
}
