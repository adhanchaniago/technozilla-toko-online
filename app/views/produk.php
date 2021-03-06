<?php
$db = new App\Core\DB;
$data['kategori'] =
    $this->db
    ->select('kategori.nama', 'COUNT(produk.kategori_id) as jumlah', 'kategori.slug')
    ->from('kategori')
    ->join('produk', 'kategori.id ', '=', ' produk.kategori_id')
    ->whereIsNull('produk.deleted_at')
    ->groupBy('kategori.id, produk.kategori_id')
    ->get();

$data['merk'] =
    $this->db
    ->select(
        'merk.nama',
        'COUNT(produk.merk_id) as jumlah',
        'merk.slug'
    )
    ->from('merk')
    ->join('produk', 'merk.id ', '=', ' produk.merk_id')
    ->whereIsNull('produk.deleted_at')
    ->groupBy('merk.id, produk.merk_id')
    ->get();
?>
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?= url('') ?>">Home</a>
                <span class="mx-2 mb-0">/</span>
                <strong class="text-black"><?= $data['judul']; ?></strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">

            <div class="col-md-9 order-2">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="float-md-left">
                            <h1 class="text-black h3"><?= $data['judul']; ?></h1>
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <?php foreach ($data['produk'] as $produk) : ?>
                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">
                                    <a href="<?= url($produk['p_slug']) ?>"><img src="<?= IMG_URL . $produk['p_gambar'] ?>" alt="Image placeholder" class="img-fluid"></a>
                                </figure>
                                <div class="p-2">
                                    <a href="<?= url($produk['p_slug']) ?>">
                                        <h6 class="text-dark"><?= stringLimit($produk['p_nama'], 50) ?></h6>
                                    </a>
                                    <p class="text-primary font-weight-bold h5"><?= rupiahFormat($produk['p_harga']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                <div class="border p-4 rounded mb-4">
                    <ul class="list-unstyled mb-0">
                        <ul class="list-unstyled mb-0">
                            <li class="">
                                <a href="<?= url('produk') ?>" class="d-flex"><span>Semua Produk</span>
                                    <span class="text-black ml-auto">(<?php $jumlah = 0;
                                                                        foreach ($data['merk'] as $merk) {
                                                                            $jumlah += $merk['jumlah'];
                                                                        }
                                                                        echo $jumlah; ?>)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </ul>
                </div>
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Kategori</h3>
                    <ul class="list-unstyled mb-0">
                        <?php foreach ($data['kategori'] as $kategori) : ?>
                            <li class="mb-1"><a href="<?= url('produk/kategori/' . $kategori['slug']) ?>" class="d-flex"><span><?= $kategori['nama']; ?></span> <span class="text-black ml-auto">(<?= $kategori['jumlah']; ?>)</span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Merk</h3>
                    <ul class="list-unstyled mb-0">
                        <?php foreach ($data['merk'] as $merk) : ?>
                            <li class="mb-1"><a href="<?= url('produk/merk/' . $merk['slug']) ?>" class="d-flex"><span><?= $merk['nama']; ?></span> <span class="text-black ml-auto">(<?= $merk['jumlah']; ?>)</span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>