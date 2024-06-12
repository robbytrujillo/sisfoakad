<nav class="navbar navbar-light bg-light">

  <?php foreach($identitas as $id) : ?>
  <a class="navbar-brand"><strong><?php echo $id->judul_website ?></strong></a>
  <span class="small"><?php echo $id->alamat ?> - <?php echo $id->email ?> - <?php echo $id->telepon ?></span>
  <?php endforeach; ?>

  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-item nav-link" href="#">BERANDA <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">TENTANG KAMPUS</a>
      <a class="nav-item nav-link" href="#">INFORMASI</a>
      <a class="nav-item nav-link" href="#">FASILITAS</a>
      <a class="nav-item nav-link" href="#">GALERI</a>
      <a class="nav-item nav-link" href="#">KONTAK</a>
    </div>
  </div>
</nav>