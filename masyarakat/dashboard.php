<table class="responsive-table" border="2" style="width: 100%;">
    <tr>
        <td><h4 class="grey-text hide-on-med-and-down">Tulis Pengaduan</h4></td>
    </tr>
    <tr>
        <td style="padding: 20px;">
            <form method="POST" enctype="multipart/form-data">
                <div class="complaint-form-box">
             <div class="select-complaint">Sampaikan Laporan Anda</div>
            <label for="classification_complaint" class="choose-classification">Pilih Klasifikasi Laporan</label>
            <div class="btn-group btn-complaint-type" id="classification_complaint" data-toggle="buttons">
                <label class="btn btn-default">
                <input type="radio" name="classification_id" value="1" class="sr-only" required /><span>PENGADUAN</span></label>
                <label class="btn btn-default">
                <input type="radio" name="classification_id" value="3" class="sr-only" required /><span>ASPIRASI</span></label>
                <label class="btn btn-default">
                <input type="radio" name="classification_id" value="2" class="sr-only" required  /><span>PERMINTAAN INFORMASI</span></label>
            </div>
        </div>
                <textarea class="materialize-textarea" name="laporan" placeholder="Tulis Pengaduan/Aspirasi/Permintaan informasi"></textarea><br><br>
                <label>Gambar</label><br>
   <div class="responsiv-uploader-fileupload style-file-single "
    data-control="fileupload"
    data-template="#uploaderTemplatefileUploader"
    data-unique-id="fileUploader"
    data-file-types=".jpg,.jpeg,.bmp,.png,.webp,.gif,.svg,.js,.map,.ico,.css,.less,.scss,.ics,.odt,.doc,.docx,.ppt,.pptx,.pdf,.swf,.txt,.xml,.ods,.xls,.xlsx,.eot,.woff,.woff2,.ttf,.flv,.wmv,.mp3,.ogg,.wav,.avi,.mov,.mp4,.mpeg,.webm,.mkv,.rar,.xml,.zip">

    <!-- Field placeholder -->
    <input type="file" name="foto" value="browse" /><br><br>
        <span class="text-muted">Upload Lampiran (max 5MB)</span>
    </div>

</div>
                <input type="submit" name="kirim" value="Kirim" class="btn">
            </form>
    </tr>
</table>
<tr>
<td><h4 class="grey-text hide-on-med-and-down">Hasil pengaduan</h4></td>
</tr>
<td>
            
            <table border="3" class="responsive-table striped highlight">
                <tr>
                    <td>No</td>
                    <td>NIK</td>
                    <td>Nama</td>
                    <td>Tanggal Masuk</td>
                    <td>Status</td>
                    <td>Opsi</td>
                </tr>
                <?php 
                    $no=1;
                    $pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.nik='".$_SESSION['data']['nik']."' ORDER BY pengaduan.id_pengaduan DESC");
                    while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $r['nik']; ?></td>
                        <td><?php echo $r['nama']; ?></td>
                        <td><?php echo $r['tgl_pengaduan']; ?></td>
                        <td><?php echo $r['status']; ?></td>
                        <td>

<!-- ditanggapi -->
        <div id="tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="white-text">Detail</h4>
            <div class="col s12">
                <p>NIK : <?php echo $r['nik']; ?></p>
                <p>Dari : <?php echo $r['nama']; ?></p>
                <p>Petugas : <?php echo $r['nama_petugas']; ?></p>
                <p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
                <p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
                <?php 
                    if($r['foto']=="kosong"){ ?>
                        <img src="../img/mafu.png" width="100">
                <?php   }else{ ?>
                    <img width="100" src="../img/<?php echo $r['foto']; ?>">
                <?php }
                 ?>
                <br><b>Pesan</b>
                <p><?php echo $r['isi_laporan']; ?></p>
                <br><b>Respon</b>
                <p><?php echo $r['tanggapan']; ?></p>

            </div>
            </script>
      <div class="container">
        <div class="text-center text-muted h3 mg-0 mg-b-30" style="color: white">JUMLAH LAPORAN SEKARANG</div>

        <div class="row-flex flex-tablet text-center">
            <div class="post post-counter" style="margin-left: auto;margin-right: auto;">
                <div class="counter-count">
                    <span class="numscroller" data-min='0' data-max='169457' data-delay='2' data-increment='1000'></span></div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
</section>

<section class="responsive-table" style="background-image: url(https://www.google.com/url?esrc=s&q=&rct=j&sa=U&url=https://stock.adobe.com/images/abstract-pale-pink-and-blue-round-elements-with-shadow-background-light-color-gradient-texture-for-software-design-web-apps-wallpaper-sunrise-or-sunset-concept/200364917&ved=2ahUKEwjVqfzAqM79AhVO-TgGHcVmCSg4FBCviQN6BAgIEAI&usg=AOvVaw095beySJ3mh0NyfuYj9IyU);">
    <div class="container">

          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>

<!-- ditanggapi -->

                    </tr>
                <?php   }
                 ?>
            </table>
<?php 
    
     if(isset($_POST['kirim'])){
        $nik = $_SESSION['data']['nik'];
        $tgl = date('Y-m-d');


        $foto = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        $folder = './../img/';
        $listeks = array('jpg','png','jpeg');
        $pecah = explode('.', $foto);
        $eks = $pecah['1'];
        $size = $_FILES['foto']['size'];
        $nama = date('dmYis').$foto;

        if($foto !=""){
            if(in_array($eks, $listeks)){
                if($size<=500000){
                    move_uploaded_file($source, $folder.$nama);
                    $query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','$nama','proses')");

                    if($query){
                        echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
                        echo "<script>location='index.php';</script>";
                    }

                }
                else{
                    echo "<script>alert('Ukuran Gambar Tidak Lebih Dari 5MB')</script>";
                }
            }
            else{
                echo "<script>alert('Format File Tidak Di Dukung')</script>";
            }
        }
        else{
            $query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','noImage.png','proses')");
            if($query){
                echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
                echo "<script>location='index.php';</script>";
            }
        }

     }

 ?>