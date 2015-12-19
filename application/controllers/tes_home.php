<?php
include ("home.php");


function Welcome()

{

parrent::controllers();



//Menginisialisasi/mengaktifkan class testing

//yang sudah terdapat di dalam framework CodeIgniter

$this->load->library('unit_test');

//Memanggil fungsi Teks

$this->Test();
echo $this->unit->report();
}


//Memanggil fungsi Teks


function Test(){

//tes yang diinginkan

//dapat juga berupa pemanggilan fungsi

$test = simpan_hubungi;

//nilai yang diharapkan

$expected_result = true;

//nama tes

$test_name = 'Adds one plus one';

//melakukan testing sekaligus menampilkan hasilnya

echo $this->unit->run($test, $expected_result, $test_name);


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>