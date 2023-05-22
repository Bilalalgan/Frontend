<?php include "header.php" ?> <!-- header -->
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <h2 class="admin-heading text-center">Raporlar</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                  <a href="rapor_tarihe_gore.php" class="card-link"><h5 class="card-title mb-0">Tarihe Göre Rapor</h5></a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                  <a href="rapor_aylara_gore.php"  class="card-link"><h5 class="card-title mb-0">Aylara Göre Rapor</h5></a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body text-center">
                  <a href="tum_odunc_alma_islemleri.php" class="card-link"><h5 class="card-title mb-0">Tüm Ödünç Alma İşlemleri</h5></a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
