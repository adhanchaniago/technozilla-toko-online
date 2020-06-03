  <!-- Main Content -->
  <div class="main-content">
      <section class="section">
          <div class="section-header">
              <h1>Pesanan Dibatalkan</h1>
          </div>

          <div class="section-body">

              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Pesanan Selesai</h4>

                          </div>
                          <div class=" card-body">
                              <?php
                                \App\Helpers\Flash::getFlash();
                                ?>
                              <div class="table-responsive">
                                  <table class="table table-striped" id="table-1">
                                      <thead>
                                          <tr class="text-center">
                                              <th>No.</th>
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

                                                      <a href="<?= url('admin/transaksi/detail/' . $order['o_invoice'] . '/' . 'pembatalan/' . $order['o_status_id']) ?>" class="btn btn-warning">Lihat Detail</a>
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