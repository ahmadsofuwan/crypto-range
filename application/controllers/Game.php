<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Game extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->login) {
			redirect(base_url('Auth'));
		}
		if ($this->role !== '2') {
			redirect(base_url('Auth'));
		}
		$this->limitRange = 10;

		$this->oneMonthFee = array(
			1000,
			900,
			800,
			700,
			600,
			500,
			400,
			300,
			200,
			100,
		);
		$this->twoMonthFee = array(
			1000,
			900,
			800,
			700,
			600,
			500,
			400,
			300,
			200,
			100,
		);
		$this->threeMonthFee = array(
			1000,
			900,
			800,
			700,
			600,
			500,
			400,
			300,
			200,
			100,
		);
	}

	public function index()
	{
		$account = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];

		if ($account['status'] == 0) {

			$commpany = $this->getDataRow('profile_company')[0];
			if ($account['crypto'] >= $commpany['feeactive']) {
				$this->set('account', array('pkey' => $this->id), array('crypto', 'crypto - ' . $commpany['feeactive'], false));
				$this->update('account', array('status' => 1), array('pkey' => $this->id));
				$this->session->set_flashdata('active', true);
				$this->session->set_flashdata('msg', 'your account has been done burn ' . $commpany['feeactive'] . ' Matic');
				$this->referalFee($commpany['feeactive']); //pembagian ke reff
			} else {
				$reff = $this->getDataRow('account', 'phone', array('pkey' => $account['refkey']))[0];
				$this->session->set_flashdata('nonActive', true);
				$this->session->set_flashdata('msg', 'your account is not active, Burn ' . $commpany['feeactive'] . ' Matic for Activate!');
				$this->session->set_flashdata('reff', '<a href="https://wa.me/' . $reff['phone'] . '" target="_blank">WhastApp Upline</a>');
			}
		}

		$data = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];

		$data['html']['reff'] = $this->follower($this->id);
		$data['html']['data'] = $data;
		$data['html']['nav'] = 'home';
		$data['url'] = 'public/body';
		$this->templatePublic($data);
	}
	public function range()
	{
		$joint = array(
			array('account', 'account.pkey=range.refkey', 'left')
		);

		$select = 'range.*,
		account.username as username,
		account.pkey as userkey,
		';

		$rangeOne = $this->getDataRow('range', $select, array('date <=' => strtotime('-1 month')), '10', $joint, 'range.count desc');
		$rangeTwo = $this->getDataRow('range', $select, array('date <=' => strtotime('-2 month')), '10', $joint, 'range.count desc');
		$rangeThree = $this->getDataRow('range', $select, array('date <=' => strtotime('-3 month'),), '10', $joint, 'range.count desc');

		$feeOne = $this->getDataRow('month_fee', 'fee', array('range' => 1))[0]['fee'];
		$feeTwo = $this->getDataRow('month_fee', 'fee', array('range' => 2))[0]['fee'];
		$feeThree = $this->getDataRow('month_fee', 'fee', array('range' => 3))[0]['fee'];


		$data['html']['feeOne'] = $feeOne;
		$data['html']['feeTwo'] = $feeTwo;
		$data['html']['feeThree'] = $feeThree;

		$data['html']['rangeThree'] = $rangeThree;
		$data['html']['rangeTwo'] = $rangeTwo;
		$data['html']['rangeOne'] = $rangeOne;
		$data['html']['nav'] = 'range';
		$data['html']['data'] = $data;
		$data['url'] = 'public/range';
		$this->templatePublic($data);
	}
	public function crypto()
	{
		$account = $this->getDataRow('account', '*', array('pkey' => $this->id));
		$upline = $this->getDataRow('account', '*', array('pkey' => $account[0]['refkey']))[0];
		$commpany = $this->getDataRow('profile_company', '*')[0];
		$logSel = 'logs.*,
		account.username as username
		';
		$logsJoint = array(
			array('account', 'account.pkey=logs.targetkey', 'left')
		);
		$logs = $this->getDataRow('logs', $logSel, array('logs.refkey' => $this->id), '', $logsJoint, 'logs.time desc');

		$data['html']['upline'] = $upline;
		$data['html']['logs'] = $logs;
		$data['html']['commpany'] = $commpany;
		$data['html']['account'] = $account;
		$data['url'] = 'public/crypto';
		$this->templatePublic($data);
	}
	private function referalFee($fee)
	{

		//3bulan = 25%
		//2bulan = 15
		//1bulan = 10

		//pembagain rengking 4-10 = 5% ;1= 40%;2=15%;3=10%
		$compaleteRef = 6;
		$reffFee = [30, 5, 5, 2, 2, 2, 2, 1, 1];
		$pkey = $this->id;
		$percentFee = $fee / 100;
		foreach ($reffFee as $value) {
			if (empty($pkey))
				break;
			$percentage = $percentFee * $value;
			$referal = $this->getDataRow('account', 'refkey', array('pkey' => $pkey))[0]['refkey'];
			$chekTotalReff = $this->getDataRow('account', 'pkey', array('refkey' => $referal));
			if (count($chekTotalReff) >= $compaleteRef) //jika refnya mencukupi standar maka dapat fee
				$this->set('account', array('pkey' => $referal), array('crypto', 'crypto +' . $percentage, false));
			$pkey = $referal;
		}

		//pembagian 50% ke range
		$feeRange = [10, 15, 25];
		foreach ($feeRange as $key => $value) {
			$feeToRange = $percentFee * $value;
			$this->set('month_fee', array('range' => $key + 1), array('fee', 'fee +' . $feeToRange, false));
		}
	}


	private function follower($pkeys)
	{
		$companny = $this->getDataRow('profile_company', 'twig', array('id' => 1))[0];
		$pkey = [$pkeys];
		$result = array();
		$twig = $companny['twig'];
		$level = 1;
		while ($twig > 0) {
			if (count($pkey) == 0)
				break;
			$dataRef = $this->getDataRow('account', 'refkey,pkey,username', '', '', '', '', array('refkey', $pkey));

			$pkey = [];
			foreach ($dataRef as $item => $value) {
				$value['level'] = $level;
				array_push($result, $value);
				array_push($pkey, $value['pkey']);
			}
			$level++;

			$twig--;
		}
		return $result;
	}


	public function ajax()
	{
		switch ($_POST['action']) {
			case 'buy':
				$chekcrypto = $this->getDataRow('account', 'crypto', array('pkey' => $this->id))[0];
				$chekFarming = $this->getDataRow('farming', '*', array('pkey' => $_POST['data']))[0];
				$status = 'not enough';
				$updatecrypto = '';
				if (floatval($chekcrypto['crypto']) > floatval($chekFarming['price'])) {
					$status = 'success';
					$updatecrypto = floatval($chekcrypto['crypto']) - floatval($chekFarming['price']);
					$this->update('account', array('crypto' => $updatecrypto), array('pkey' => $this->id));
					$this->insert('detail_account_farming', array('refkey' => $this->id, 'farmingkey' => $_POST['data'], 'time' => strtotime('now')));
				}
				echo json_encode(array('status' => $status, 'crypto' => number_format(round($updatecrypto, 2))));
				break;
			case 'sendCrypto':
				$status = 'success';
				$crypto = '';
				$logs = '';
				$chekAcount = $this->getDataRow('account', 'pkey,crypto', array('username' => $_POST['username']));
				$company = $this->getDataRow('profile_company', 'cryptotransactionfee')[0];

				if (count($chekAcount) <> 1 || $chekAcount[0]['pkey'] == $this->id)
					$status = 'username not found';
				if (empty($_POST['crypto']))
					$status = 'Crypto invalid';
				if (!is_numeric($_POST['crypto']))
					$status = 'Crypto invalid';

				//cek saldo crypto dan transfer
				if ($status == 'success') {
					$account = $this->getDataRow('account', 'crypto', array('pkey' => $this->id))[0];
					if ($account['crypto'] < floatval($_POST['crypto'] + $company['cryptotransactionfee'])) {
						$status = 'not enough crypto';
					} else {
						$updateCrypto = $account['crypto'] - $_POST['crypto'] - $company['cryptotransactionfee'];
						$updateCryptoTarget = floatval($chekAcount[0]['crypto']) + floatval($_POST['crypto']);

						log_message('error', floatval($account['crypto']) . '-' . floatval($_POST['crypto']) . '-' . $company['cryptotransactionfee'] . '=' . $updateCrypto);
						//transaction fee
						$this->insert('logs', array('refkey' => $this->id, 'targetkey' => $chekAcount[0]['pkey'], 'value' => '-' . $company['cryptotransactionfee'], 'time' => strtotime('now'), 'note' => 'Admin Fee'));


						$this->update('account', array('crypto' => $updateCrypto), array('pkey' => $this->id));
						$this->update('account', array('crypto' => $updateCryptoTarget), array('pkey' => $chekAcount[0]['pkey']));

						$this->insert('logs', array('refkey' => $this->id, 'targetkey' => $chekAcount[0]['pkey'], 'value' => '-' . $_POST['crypto'], 'time' => strtotime('now'), 'note' => 'Send'));
						$this->insert('logs', array('refkey' => $chekAcount[0]['pkey'], 'targetkey' => $this->id, 'value' => '+' . $_POST['crypto'], 'time' => strtotime('now'), 'note' => 'Receive'));

						$logs = array('username' => $_POST['username'], 'date' => date('d/m/Y H:i'), 'value' => '-' . $_POST['crypto'], 'note' => 'Send');

						$crypto = $updateCrypto;
					}
				}
				echo json_encode(['status' => $status, 'crypto' => $crypto, 'logs' => $logs, 'adminFee' => '-' . $company['cryptotransactionfee']]);
				break;
			case 'cryptoClaim';
				$status = 'success';
				$crypto = '';
				$logs = '';

				//cek tx Code
				if ($status == 'success') {
					$chekTxCode = $this->getDataRow('claimtopup', 'pkey', array('tx' => $_POST['tx']));
					if (count($chekTxCode) <> 0) {
						$status = 'txt code already used';
					} else {
						$tx = $_POST['tx'];
						$curl = curl_init();

						curl_setopt_array($curl, array(
							CURLOPT_URL => 'localhost:3000/tx',
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'POST',
							CURLOPT_POSTFIELDS => 'tx=' . $tx,
							CURLOPT_HTTPHEADER => array(
								'Content-Type: application/x-www-form-urlencoded'
							),
						));

						$response = json_decode(curl_exec($curl));
						curl_close($curl);
						$response = $response->data;


						if ($response->status == 'error' || empty($response->status)) {
							$status = 'tx invalid';
						} else {
							$txAddress = $this->getDataRow('profile_company', 'walletAddress,contract')[0];

							if ($txAddress['walletAddress'] <> $response->from)
								$status = 'Crypto Address invalid';
							if ($txAddress['contract'] <> $response->contract)
								$status = 'Coint invalid';
							if ($status == 'success') {
								$valueCrypto = explode(" ", $response->value)[0];
								$crytopAccount = $this->getDataRow('account', 'crypto', array('pkey' => $this->id))[0];
								$updateCrypto = floatval($crytopAccount['crypto']) + floatval($valueCrypto);
								$this->insert('claimtopup', array('refkey' => $this->id, 'tx' => $_POST['tx'], 'time' => strtotime('now')));
								$this->insert('logs', array('refkey' => $this->id, 'targetkey' => $this->id, 'value' => '+' . $valueCrypto, 'time' => strtotime('now'), 'note' => 'Top Up'));
								$this->update('account', array('crypto' => $updateCrypto), array('pkey' => $this->id));
								$crypto = $updateCrypto;

								$account = $this->getDataRow('account', 'username', array('pkey' => $this->id))[0];

								$logs = array('username' => $account['username'], 'date' => date('d/m/Y H:i'), 'value' => '+' . $valueCrypto, 'note' => 'Top Up');
							}
						}
					}
				}



				echo json_encode(['status' => $status, 'crypto' => $crypto, 'logs' => $logs]);
				break;

			case 'widraw':
				$companny = $this->getDataRow('profile_company', '*')[0];
				if ($companny['minimumwidraw'] > $_POST['widraw']) {
					echo json_encode(array('status' => 'Minimum Widraw ' . $companny['minimumwidraw'] . ' Matic'));
					die;
				}
				$account = $this->getDataRow('account', '*', array('pkey' => $this->id))[0];
				if ($account['crypto'] < $_POST['widraw']) {
					echo json_encode(array('status' => 'Matic is not enough'));
					die;
				} else {
					$this->set('account', array('pkey' => $this->id), array('crypto', 'crypto -' . $_POST['widraw'], false));
					$dataInsert = array('refkey' => $this->id, 'walletaddress' => $_POST['wallet'], 'time' => strtotime('now'));
					$this->insert('widraw', $dataInsert);
					$this->insert('logs', array(
						'targetkey' => $this->id,
						'refkey' => $this->id,
						'time' => strtotime('now'),
						'note' => 'widraw',
						'value' => '- ' . $_POST['widraw'],
					));

					echo json_encode(array('status' => 'success'));
				}




				break;
			case 'claim':
				//pembagain rengking 4-10 = 5% ;1= 40%;2=15%;3=10%
				$percentageFee = [40, 15, 10, 5, 5, 5, 5, 5, 5, 5];

				$range = $this->getDataRow('range', '*', array('date <=' => strtotime('-' . $_POST['target'] . ' month')), $this->limitRange, '', 'range.count desc');
				$monthFee = $this->getDataRow('month_fee', 'fee', array('range' => $_POST['target']))[0]['fee'];
				if ($range[0]['refkey'] == $this->id) {
					foreach ($range as $key => $value) {
						$fee = $monthFee / 100;
						$fee = $fee * $percentageFee[$key];
						$this->set('account', array('pkey' => $value['refkey']), array('crypto', 'crypto +' . $fee, false));
						$this->update('range', array('count' => 0, 'date' => strtotime('now')), array('refkey' => $value['refkey']));
					}
					$this->update('month_fee', array('fee' => 0), array('range' => $_POST['target']));
					echo json_encode(array('status' => 'success'));
				}


				// switch ($_POST['target']) {
				// 	case '1':
				// 		$rangeOne = $this->getDataRow('range', '*', array('date <=' => strtotime('-1 month')), $this->limitRange, '', 'range.count desc');
				// 		$oneMonthFee = $this->getDataRow('month_fee', 'fee', array('range' => 1))[0]['fee'];
				// 		if ($rangeOne[0]['refkey'] == $this->id) {
				// 			foreach ($rangeOne as $key => $value) {
				// 				$fee = $oneMonthFee / 100;
				// 				$fee = $fee * $percentageFee[$key];
				// 				$this->set('account', array('pkey' => $value['refkey']), array('crypto', 'crypto +' . $fee, false));
				// 				$this->update('range', array('count' => 0, 'date' => strtotime('now')), array('refkey' => $value['refkey']));
				// 			}
				// 			echo json_encode(array('status' => 'success'));
				// 		}
				// 		break;
				// 	case '2':
				// 		$rangeTwo = $this->getDataRow('range', '*', array('date <=' => strtotime('-2 month')), $this->limitRange, '', 'range.count desc');
				// 		$oneMonthFee = $this->getDataRow('month_fee', 'fee', array('range' => 2))[0]['fee'];

				// 		if ($rangeTwo[0]['refkey'] == $this->id) {

				// 			foreach ($rangeTwo as $key => $value) {
				// 				$this->set('account', array('pkey' => $value['refkey']), array('crypto', 'crypto +' . $this->twoMonthFee[$key], false));
				// 				$this->update('range', array('count' => 0, 'date' => strtotime('now')), array('refkey' => $value['refkey']));
				// 			}
				// 			echo json_encode(array('status' => 'success'));
				// 		}
				// 		break;
				// 	case '3':
				// 		$rangeThree = $this->getDataRow('range', '*', array('date <=' => strtotime('-3 month')), $this->limitRange, '', 'range.count desc');
				// 		if ($rangeThree[0]['refkey'] == $this->id) {
				// 			foreach ($rangeThree as $key => $value) {
				// 				$this->set('account', array('pkey' => $value['refkey']), array('crypto', 'crypto +' . $this->threeMonthFee[$key], false));
				// 				$this->update('range', array('count' => 0, 'date' => strtotime('now')), array('refkey' => $value['refkey']));
				// 			}
				// 			echo json_encode(array('status' => 'success'));
				// 		}
				// 		break;
				// }
				break;
			default:
				echo json_encode(array('status' => 'nothing Action'));
				break;
		}
	}
}
