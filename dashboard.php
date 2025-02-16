<?php
include (".include/header.php");
$title = "Dashboard";
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include ',includes/toast_notification.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Card untuk menampilkan tabel postingan -->
     <div class="card">
        <!-- Tabel dengan baris yang dapat di-hover -->
         <div class="card">
            <!-- Header Tabel -->
             <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Semua Postingan</h4>
</div>
<div class="card-body">
    <!-- Tabel responsif -->
     <div class="table-responsive text-nowrap">
        <table id="datatable" class="table-hover">
            <thead>
                <tr class="text-center">
                    <th width="50px">#</th>
                    <th>Judul Post</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th width="150px">Pilihan</th>
</tr>
</thead>
<tbody class="table-border-bottom-0">
<!-- Menampilkan data dari tabel database --> 
 <?php
 $index = 1; // Variabel untuk nomor urut 
 /* Query untuk mengambil data dari tabel 
 post,user,dan categories*/ 
 $query = "SELECT posts.*, users.name as user_name,
 categories.category_name FROM posts
 INNER JOINN users ON posts.user_id = users.user_id
 LEFT JOIN categories ON posts.category_id = categories.category_id
 WHERE posts.user_id = $userid";
 // Eksekusi query
 $exec = mysqli_query($conn, $query);

 // Perulangan untuk menampilkan setiap baris hasil query
 while ($post = mysqli_fetc_assoc($exec)) :
?>
<tr>
    <td><?= $index++; ?></td>
    <td><?= $post['post_title']; ?></td>
    <td><?= $post['user_name']; ?></td>
    <td><?= $post['category_name']; ?></td>
    <td>
        <div class="dropdown">
            <!-- Tombol dropdown untuk pilihan -->
             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toogle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
 </button>
 <!-- Menu dropdown --> 
  <div class="dropdowwn-menu">
    <!-- Pilhan Edit --> 
     <a href="edit_post.php?post_id=<?= $post['id_post']; ?>"
class="dropdown-item">
<i class="bx bx-edit-alt me-2"></i> Edit
 </a>
 <!-- Pilihan Delete --> 
  <a href="#" class="dropdown-item" data-bs-toggle="modal"
  data-bs-target="#deletepost <?= $post['id_post']; ?>">
  <i class="bx bx-trash me-2"></i> Delete 
 </a>
 </div>
 </div>
 </td>
 </tr>
 <!-- Modal untuk hapus konten blog -->
  <div class="modal fade" id="deletePost_<?= $post['id_post']; ?>"
  tabindex="-1" aria hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title">Hapus Post?</5>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
 </div>
 <div class="modal-body">
    <form action="proses_post.php" method="POST">
        <div>
            <p>Tindakan ini tidak bisa dibatalkan/</p>
            <input type="hidden name="postId" value="<?=
            $post['id_post']; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="delete" class="btn btn-primary">Hapus</button>
 </div>
 </form>
 </div>
 </div>
 </div>
 </div>
 <?php endwhile; ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
 <!-- Akhir tabel dengan baris yang dapat di-hover --> 
 </div>
 </div>

 <?php
 include (".includes/footer.php");
 ?>z