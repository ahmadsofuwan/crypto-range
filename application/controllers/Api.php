<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MY_Controller
{

	public function gpolCalim()
	{

		$company = $this->getDataRow('profile_company', 'dateclaim,gpolinterval', '', 1)[0];

		if ($company['dateclaim'] <= strtotime('now')) {

			$joint = array(
				array('global_fee', 'global_fee.pkey=global_list.globalkey')
			);
			$data = $this->getDataRow('global_list', 'global_list.*,global_fee.*', '', '', $joint);
			foreach ($data as $key => $value) {

				$bonus = $value['fee'] / $value['limit_count'];
				$this->set('account', array('pkey' => $value['refkey']), array('crypto', 'crypto +' . $bonus, false));
				$this->insert('logs', array('refkey' => $value['refkey'], 'targetkey' => $value['refkey'], 'time' => strtotime('now'), 'note' => 'gpool Bonus', 'value' => '+' . $bonus));
			}

			$this->update('profile_company', array('dateclaim' => strtotime('+' . $company['gpolinterval'] . 'days')), array('id !=' => 0));
			$this->update('global_fee', array('fee' => 0), array('pkey !=' => 0));
		}
	}
}
