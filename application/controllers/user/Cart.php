<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Ongkir_model', 'ongkir');
    }

    public function index()
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $alamat = $this->user->getAlamatByEmail($google['email']);
            if (!$alamat->num_rows()) {
                $alamat = '';
                $alamatongkir = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($google['email'])->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        } else {
            $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'));
            if (!$alamat->num_rows()) {
                $alamat = '';
                $alamatongkir = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'))->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        }
        $getProvince = $this->ongkir->getProvinceOngkir();
        $province = $getProvince->rajaongkir->results;
        $data = [
            "title" => "A3Mall | Cart",
            "page" => "user/transaction/cart/index",
            "user" => $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array(),
            "keranjang" => $this->cart->contents(),
            "alamat" => $alamat,
            "alamatongkir" => $alamatongkir,
            "province" => $province
        ];

        $this->load->view('user/templates/app', $data, FALSE);
    }

    public function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('variation'),
            'name' => $this->input->post('name_product'),
            'price' => $this->input->post('price_product'),
            'qty' => $this->input->post('quantity'),
            'photo' => $this->input->post('photo_product'),
            'kd_product' => $this->input->post('kd_product'),
            'weight' => $this->input->post('weight_product')
        );
        $this->cart->insert($data);
        // echo $this->show_cart(); //tampilkan cart setelah added
        // var_dump($data);
    }

    public function add_to_cart_unit()
    {
        $data = array(
            'id' => $this->input->post('variation'),
            'name' => $this->input->post('name_product'),
            'price' => $this->input->post('price_product'),
            'qty' => $this->input->post('quantity'),
            'photo' => $this->input->post('photo_product'),
            'kd_product' => $this->input->post('kd_product'),
            'weight' => $this->input->post('weight_product')
        );
        $this->cart->insert($data);
        // echo $this->show_cart(); //tampilkan cart setelah added
        // var_dump($data);
    }

    public function total_cart()
    {
        $google = $this->session->userdata('user_data');
        if ($google) {
            $alamat = $this->user->getAlamatByEmail($google['email']);
            if (!$alamat->num_rows()) {
                $alamat = '';
                $alamatongkir = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($google['email'])->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        } else {
            $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'));
            if (!$alamat->num_rows()) {
                $alamat = '';
                $alamatongkir = '';
            } else {
                $alamat = $this->user->getAlamatByEmail($this->session->userdata('email'))->row_array();
                $getAlamat = $this->ongkir->getAlamatOngkir($alamat['kabupaten_alamat'], $alamat['kecamatan_alamat']);
                $alamatongkir = $getAlamat->rajaongkir->results;
            }
        }
        if ($alamat == '') {
            $tombol = '<button class="btn px-5 py-2 yellow-button" disabled>Pesan</button>';
        } else {
            $tombol = '<a href="' . base_url('user/Checkout/addToCheckout') . '" class="btn px-5 py-2 yellow-button">Pesan</a>';
        }

        $total = '
            <div class="container">
                <div class="row">
                    <div class="col my-auto">
                        <h5 class="fw-bold">Produk (' . $this->cart->total_items() . ')</h5>
                    </div>
                    <div class="col my-auto justify-content-end d-flex">
                        <p class="my-auto me-5">Total: <span class="yellow-text h5 fw-bold ms-3"> Rp.' . number_format($this->cart->total(), '0', ',', '.')  . '</span></p>
                        ' . $tombol . '
                    </div>
                </div>
            </div>

       ';
        return $total;
    }

    // public function cobacart()
    // {
    //     $keranjang = $this->cart->contents();

    //     foreach ($keranjang as $keranjang) {

    //         var_dump($variation['name_variation']);
    //     }
    // }

    public function getCart()
    {
        $this->load->model('Barang_model', 'barang');
        $keranjang = $this->cart->contents();
        $output = '';
        $no = 0;
        // $foto = $this->barang->getProductByKd($keranjang['id']);
        foreach ($keranjang as $keranjang) {
            // $fotproduk = $foto['photo_product'];
            $variation = $this->db->get_where('variation_product', array('id_variation' => $keranjang['id']))->row_array();
            $no++;
            $output .= '
        <div class="row mb-5 keranjang-grid">
        <div class="col-md-2">
            <div class="img text-center">
                <img src="' . base_url("assets/images/produk/" . $keranjang['photo']) . '"alt="" />
            </div>
        </div>
        <div class="col-md my-auto">
            <div class="row">
                <div class="col-md py-1">
                    <p>' . $keranjang['name'] . '</p>
                </div>
                <div class="col-md py-1 text-center isi-keranjang my-auto">
                <p class="fw-light text-secondary my-auto">Variasi:' . $variation['name_variation'] . '</p>
            </div>
                <div class="col-md py-1 text-center isi-keranjang my-auto">
                    <p class="my-auto">Rp.' . number_format($keranjang['price'], '0', ',', '.') . '</p>
                </div>
                <div class="col-md py-1 text-center isi-keranjang my-auto">
                    <div class="input-group inline-group border-1 border border-dark">
                        <div class="input-group-prepend">
                            <button data-qty="' . $keranjang['qty'] . '" id="' . $keranjang['rowid'] . '" class="kurang_qty btn text-dark btn-minus">
                                <i class="bi bi-dash"></i>
                            </button>
                        </div>
                        <input class="form-control quantity border-0 text-center" min="0" name="quantity" value="' . $keranjang['qty'] . '" type="number" readonly />
                        <div class="input-group-append">
                            <button data-qty="' . $keranjang['qty'] . '" id="' . $keranjang['rowid'] . '" class="tambah_qty btn text-dark btn-plus">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md py-1 text-center isi-keranjang my-auto">
                    <p class="yellow-text my-auto">Rp.' . number_format($keranjang['price'] * $keranjang['qty'], '0', ',', '.') . '</p>
                </div>
                <div class="col-md py-1 text-center isi-keranjang my-auto">
                    <button id="' . $keranjang['rowid'] . '"  class="hapus_cart btn my-auto hapus" >Hapus</button>
                </div>
            </div>
        </div>
    </div>
        ';
        }
        return $output;
    }

    public function show_items()
    {
        $items = '<span id="total_items" class="cart-basket d-flex align-items-center justify-content-center">' . $this->cart->total_items() . '</span>';

        return $items;
    }



    function load_cart()
    { //load data cart
        echo $this->getCart();
    }

    function load_total()
    { //load total cart
        echo $this->total_cart();
    }

    function load_items()
    {
        echo $this->show_items();
    }


    function tambah_qty()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => $this->input->post('qty') + 1,
        );
        $this->cart->update($data);
        echo $this->getCart();
    }

    function kurang_qty()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => $this->input->post('qty') - 1,
        );
        $this->cart->update($data);
        echo $this->getCart();
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->getCart();
    }
}



/* End of file Dashboard.php */
