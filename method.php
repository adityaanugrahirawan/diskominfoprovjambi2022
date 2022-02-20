<?php
require_once "koneksi.php";
class Pegawai 
{

	public  function get_pgw()
	{
		global $mysqli;
		$query="SELECT * FROM tbl_pegawai";
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get List Pegawai Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function get_pgw($id=0)
	{
		global $mysqli;
		$query="SELECT * FROM tbl_pegawai";
		if($id != 0)
		{
			$query.=" WHERE id=".$id." LIMIT 1";
		}
		$data=array();
		$result=$mysqli->query($query);
		while($row=mysqli_fetch_object($result))
		{
			$data[]=$row;
		}
		$response=array(
							'status' => 1,
							'message' =>'Get Pegawai Successfully.',
							'data' => $data
						);
		header('Content-Type: application/json');
		echo json_encode($response);
		 
	}

	public function insert_pgw()
		{
			global $mysqli;
			$arrcheckpost = array('nip' => '', 'nama' => '', 'jenkel' => '', 'tgl_lahir' => '', 'golongan'   => '', 'jabatan'   => '', 'unit_kerja'   => '', 'kesempatan'   => '', 'status_pegawai'   => '', 'status_aktif'   => '');
			$hitung = count(array_intersect_key($_POST, $arrcheckpost));
			if($hitung == count($arrcheckpost)){
			
					$result = mysqli_query($mysqli, "INSERT INTO tbl_pegawai SET
					nip = '$_POST[nip]',
					nama = '$_POST[nama]',
					jenkel = '$_POST[jenkel]',
					tgl_lahir = '$_POST[tgl_lahir]',
					golongan = '$_POST[golongan]',
					jabatan = '$_POST[jabatan]',
					unit_kerja = '$_POST[unit_kerja]',
					kesempatan = '$_POST[kesempatan]',
					status_pegawai = '$_POST[status_pegawai]',
					status_aktif = '$_POST[status_aktif]'");
					
					if($result)
					{
						$response=array(
							'status' => 1,
							'message' =>'Pegawai Added Successfully.'
						);
					}
					else
					{
						$response=array(
							'status' => 0,
							'message' =>'Pegawai Addition Failed.'
						);
					}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	function update_pgw($id)
		{
			global $mysqli;
			$arrcheckpost = array('nip' => '', 'nama' => '', 'jenkel' => '', 'tgl_lahir' => '', 'golongan'   => '', 'jabatan'   => '', 'unit_kerja'   => '', 'kesempatan'   => '', 'status_pegawai'   => '', 'status_aktif'   => '');
			$hitung = count(array_intersect_key($_POST, $arrcheckpost));
			if($hitung == count($arrcheckpost)){
			
		        $result = mysqli_query($mysqli, "UPDATE tbl_pegawai SET
		        nip = '$_POST[nip]',
		        nama = '$_POST[nama]',
		        jenkel = '$_POST[jenkel]',
		        tgl_lahir = '$_POST[tgl_lahir]',
		        golongan = '$_POST[golongan]',
		        jabatan = '$_POST[jabatan]',
		        unit_kerja = '$_POST[unit_kerja]',
		        kesempatan = '$_POST[kesempatan]',
		        status_pegawai = '$_POST[status_pegawai]',
		        status_aktif = '$_POST[status_aktif]'
		        WHERE id='$id'");
		   
				if($result)
				{
					$response=array(
						'status' => 1,
						'message' =>'Pegawai Updated Successfully.'
					);
				}
				else
				{
					$response=array(
						'status' => 0,
						'message' =>'Pegawai Updation Failed.'
					);
				}
			}else{
				$response=array(
							'status' => 0,
							'message' =>'Parameter Do Not Match'
						);
			}
			header('Content-Type: application/json');
			echo json_encode($response);
		}

	function delete_pgw($id)
	{
		global $mysqli;
		$query="DELETE FROM tbl_pegawai WHERE id=".$id;
		if(mysqli_query($mysqli, $query))
		{
			$response=array(
				'status' => 1,
				'message' =>'Pegawai Deleted Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'message' =>'Pegawai Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}

 ?>