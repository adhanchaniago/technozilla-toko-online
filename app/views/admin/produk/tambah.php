  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Tambah Produk</h1>
          </div>
          <div class="section-body">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card">
                          <form action="<?= url('admin/produk/store') ?>" method="POST" enctype="multipart/form-data">
                              <div class="card-header">
                                  <h4>Tambah Produk Baru</h4>
                                  <a href="<?= url('admin/produk') ?>" class="btn btn-primary ml-auto">Lihat Produk</a>
                              </div>
                              <div class="card-body">

                                  <div class="form-row">
                                      <div class="form-group col-md-7">
                                          <label>Nama Produk</label>
                                          <input type="text" class="form-control" name="nama">
                                      </div>
                                      <div class="form-group col-md-5">
                                          <label>Kategori</label>
                                          <select class="form-control" name="kategori">
                                              <option>-Pilih kategori-</option>
                                              <?php foreach ($data['kategori'] as $kategori) : ?>
                                                  <option value="<?= $kategori['id'] ?>"><?= $kategori['nama']; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label>Merk</label>
                                          <select class="form-control" name="merk">
                                              <option>-Pilih Merk-</option>
                                              <?php foreach ($data['merk'] as $merk) : ?>
                                                  <option value="<?= $merk['id'] ?>"><?= $merk['nama']; ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label>Gambar Thumbnail</label>
                                          <input type="file" class="form-control" name="gambar" required>
                                      </div>
                                  </div>

                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label>Stok</label>
                                          <input type="number" class="form-control" min="0" name="stok">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label>Harga</label>
                                          <input type="number" class="form-control" min="0" name="harga">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label>Deskripsi</label>
                                      <textarea class="form-control" name="deskripsi"></textarea>
                                  </div>

                              </div>
                              <div class="card-footer text-right">
                                  <a href="<?= url('admin/produk') ?>" class="btn btn-warning mr-2">Kembali</a>
                                  <button class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

          </div>
      </section>
  </div>