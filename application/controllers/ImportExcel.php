<?php defined('BASEPATH') or exit('No direct script access allowed');
require("./vendor/autoload.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ImportExcel extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("M_warga");
  }
  public function index()
  {
    $this->load->view("tools/importExcel.php");
  }

  function import()
  {
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($_FILES["excel"]['tmp_name']);
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    $warga = 0;
    $error = 0;
    $testdata = [];
    for ($i = 2; $i < count($sheetData); $i++) {
      $nama = $sheetData[$i]['1'];
      $nik = $sheetData[$i]['2'];
      $password = substr($sheetData[$i]['2'], 10, 6);
      $alamat =  $sheetData[$i]['5'];
      list($rt,) = explode("/", $sheetData[$i]['6']);
      $data = [
        "nama_warga" => $nama,
        "nik" => $nik,
        "email_warga" => "",
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "alamat" => $alamat,
        "rt" => $rt,
        "status" => "1"
      ];
      // array_push($testdata, $data);
      if ($this->M_warga->tambah_warga($data)) {
        $warga++;
      } else {
        $error++;
      }
    }
    // echo json_encode($testdata);
    echo "jumlah data yang berhasil di upload: " . $warga . " Jumlah data gagal diupload : " . $error;
  }
}
