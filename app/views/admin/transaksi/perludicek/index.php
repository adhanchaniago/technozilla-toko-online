  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Perlu Dicek</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Orderan Perlu Dicek</h4>

                          </div>
                          <div class=" card-body">
                              <?php
                                \App\Helpers\Flash::getFlash();
                                ?>
                              <div class="table-responsive">
                                  <table class="table table-striped" id="table-1">
                                      <thead>
                                          <tr class="text-center">
                                              <th class="text-center">No.</th>
                                              <th>Invoice</th>
                                              <th>Customer</th>
                                              <th>Total</th>
                                              <th>Status</th>
                                              <th>Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach ($data['order'] as $key => $order) : ?>
                                              <tr>
                                                  <td><?= 1 + $key++; ?></td>
                                                  <td><?= $order['o_invoice']; ?></td>
                                                  <td><?= $order['c_nama']; ?></td>
                                                  <td>Rp. <?= number_format(($order['o_total']), 0, ".", ",") ?></td>

                                                  <td>
                                                      <?= $order['s_nama']; ?>
                                                  </td>
                                                  <td class="text-center">
                                                      <a href="<?= url('admin/transaksi/detail/' . $order['o_invoice'] . '/perludicek/' . $order['o_status_id']) ?>" class="btn btn-warning">Konfirmasi Pembayaran</a>
                                                  </td>

                                              </tr>
                                          <?php endforeach; ?>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>


  <!-- The Modal -->
  <div id="myModal" class="modal">

      <!-- The Close Button -->
      <span class="close">&times;</span>

      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01">

      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
  </div>