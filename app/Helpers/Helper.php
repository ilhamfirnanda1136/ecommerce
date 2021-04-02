<?php
namespace App\Helpers;

class Helper {
    public static function formatTanggal($tgl) 
    {	 
		if($tgl != null) {
			$bulanArray =array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			if (strpos( $tgl,'/') !== false) {
				$tgle = explode('/',$tgl);
				$tanggal = $tgle[1] < 10 ? '0'.$tgle[1] : $tgle[1];
				return $tanggal.'-'.$bulanArray[$tgle[0]].'-'.$tgle[2];
			} else {
				$tgle = explode('-',$tgl);
				$bulan = $tgle[1] < 10 ? str_replace('0','',$tgle[1]) : $tgl[1];
				return $tgle[2].'-'.$bulanArray[$bulan].'-'.$tgle[0];
			}
		}
		return '';
	} 
	public static function Romawi($bulan)
	{
		$rowawiArray = array('','I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII');
		$bulanData   = $bulan < 10 ? str_replace('0','',$bulan) : $bulan;
		return $rowawiArray[$bulanData];
	}
	public static function hari()
	{
	$hari = date("D"); 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
	
		return  $hari_ini ;
	}

	protected static function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) { 
			$temp = self::penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = self::penyebut($nilai/10)." puluh". self::penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . self::penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = self::penyebut($nilai/100) . " ratus" . self::penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . self::penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = self::penyebut($nilai/1000) . " ribu" . self::penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = self::penyebut($nilai/1000000) . " juta" . self::penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = self::penyebut($nilai/1000000000) . " milyar" . self::penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = self::penyebut($nilai/1000000000000) . " trilyun" . self::penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	public static function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(self::penyebut($nilai));
		} else {
			$hasil = trim(self::penyebut($nilai));
		}     		
		return $hasil;
	}
}