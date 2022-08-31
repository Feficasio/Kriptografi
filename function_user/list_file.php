<?php
$kd_user = $_SESSION['kd_user'];
$query = mysqli_query($conn,"SELECT * FROM file WHERE kd_user='".$kd_user."' AND type ='encrypt'");
while ($row = mysqli_fetch_array($query)){
  echo"<tr>
  <th scope='row'>".$row['nama_lengkap']."</th>
  <td>".$row['alamat']."</td>
  <td>".$row['poli']."</td>
  <td>".$row['nama_file']."</td>
  <td><a href='../function_user/delete_file.php?id=".$row['kd_file']."' class='btn btn-sm btn-danger'>Hapus</a>
  <a href='../function_user/download.php?download_file=".$row['nama_file']."' class='btn btn-sm btn-success'>Download File</a></td>
  </tr>";
}
?>