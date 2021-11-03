<?php
abstract class Karyawan {
    protected $nama;
    protected $ttl;
    protected $jeniskelamin;
	protected $status;
	protected $level;
	protected $gaji;

	abstract function setGaji();

	public function getNama() {
		return $this->nama;
	}
	public function getTtl() {
		return $this->ttl;
	}
	public function getJensikelamin() {
		return $this->jeniskelamin;
	}
	public function getStatus() {
		return $this->status;
	}
	public function getLevel() {
		return $this->level;
	}
	public function getGaji() {
		return $this->gaji;
	}
}

class Fulltime extends Karyawan{
	public function __construct($nama, $ttl, $jeniskelamin, $level)
    {
		$this->nama = $nama;
		$this->ttl = $ttl;
		$this->jeniskelamin = $jeniskelamin;
		$this->status = "Fulltime";
		$this->level = $level;
    }

	function setGaji() {
		if($this->level === 'Junior') {
			$this->gaji = 2000000;
		} else if($this->level === 'Amateur') {
			$this->gaji = 3500000;
		} else if($this->level === 'Senior') {
			$this->gaji = 5000000;
		}
	}
}

class Parttime extends Karyawan{

	public function __construct($nama, $ttl, $jeniskelamin, $level)
    {
		$this->nama = $nama;
		$this->ttl = $ttl;
		$this->jeniskelamin = $jeniskelamin;
		$this->status = "Partime";
		$this->level = $level;
    }

	function setGaji() {
		if($this->level === 'Junior') {
			$this->gaji = 2000000/2;
		} else if($this->level === 'Amateur') {
			$this->gaji = 3500000/2;
		} else if($this->level === 'Senior') {
			$this->gaji = 5000000/2;
		}
	}
}

$karyawan1 = new Fulltime("Andi", "Jakarta, 11/01/1992", "Pria", "Senior");
$karyawan2 = new Fulltime("Cika", "Jayapura, 13/11/1998", "Wanita", "Amateur");
$karyawan3 = new Fulltime("Cantika", "Jember, 13/05/1999", "Wanita", "Junior");

$karyawan4 = new Parttime("Budi", "Jakarta, 12/11/1994", "Pria", "Senior");
$karyawan5 = new Parttime("Bella", "Malang, 1/01/2000", "Wanita", "Junior");
$karyawan6 = new Parttime("Dion", "Banten, 14/11/1999", "Pria", "Amateur");

$karyawan1->setGaji();
$karyawan2->setGaji();
$karyawan3->setGaji();
$karyawan4->setGaji();
$karyawan5->setGaji();
$karyawan6->setGaji();

$karyawan = array($karyawan1, $karyawan2, $karyawan3, $karyawan4, $karyawan5, $karyawan6);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Praktikum 4</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Data List Karyawan</h1></center>
	<table class="table-zebra-striping">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Level Karyawan</th>
                <th>Status</th>
                <th>Gaji Karyawan</th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($karyawan as $index => $value) { ?>
				<tr>
					<td><?php echo $index+1 ?></td>
					<td><?php echo $value->getNama() ?></td>
					<td><?php echo $value->getTtl() ?></td>
					<td><?php echo $value->getJensikelamin() ?></td>
					<td><?php echo $value->getLevel() ?></td>
					<td><?php echo $value->getStatus() ?></td>
					<td><?php echo $value->getGaji() ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>