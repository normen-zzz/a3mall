<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model', 'barang');
	}
	public function notificationMidtrans()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");
		$order_id = $result['order_id'];
		$detail_transaction = $this->db->get_where('detail_transaction', array('order_id' => $order_id))->row();
		$transaction = $this->db->get_where('transaction', array('kd_transaction' => $detail_transaction->kd_transaction))->result();
		$user = $this->db->get_where('users', array('email' => $detail_transaction->email_users))->row();
		$ongkir = 0;
		foreach ($transaction as $transaction) {
			$ongkir += $transaction->ongkir;
		}
		$data = [
			'status_code' => $result['status_code']
		];

		// $data['spp'] = $this->m_spp->sppWhere(['id' => $this->uri->segment(4)])->result_array();
		if ($result['status_code'] == 200) {
			$this->db->update('midtrans', $data, array('order_id' => $order_id));
			$this->db->update('detail_transaction', array('status' => 2), array('order_id' => $order_id));
			$this->db->update('users', array('saldo' => 0), array('email' => $detail_transaction->email_users));
		}

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/
	}
}

/* End of file Dashboard.php */
