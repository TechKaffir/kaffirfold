<?php

/**
 * PDF class 
 */

defined('ROOTPATH') or exit('Access Denied!');
use Dompdf\Dompdf;

class PDF
{
	use Controller;

	public function index($id = null)
	{
		$payment = new Payment;

		// /*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$dompdf = new Dompdf();

		// /*** RENDER VIEW ***/
		$html = $this->renderView('admin/customers/payment-pdf');

		$dompdf->loadHtml($html);
		$dompdf->set_option('isRemoteEnabled', true);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$dompdf->stream('receipt.pdf', [
			'Attachment' => 0
		]);

		

		$data['page_title'] = 'Payment Receipt';
		$this->view('admin/customers/payment-pdf', $data);
	}

	// Helper function to 'payments' function
	private function renderView($viewName)
	{
		ob_start();
		$this->view($viewName);
		$content = ob_get_clean();
		return $content;
	}
}
