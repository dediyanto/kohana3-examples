<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contact extends Controller_Base {

	public function action_index()
	{
		$this->template->title = 'Contact';
		$this->template->content = View::factory('page/contact');
		
		$recipient = array(
			'recipient@example.com' => 'Recipient Name'
		);

		$data = Validate::factory($_POST)
			->filter('name', 'trim')
			->rule('name', 'not_empty')
			->filter('email', 'trim')
			->rule('email', 'not_empty')
			->rule('email', 'email')
			->filter('message', 'trim')
			->filter('message', 'Security::xss_clean')
			->filter('message', 'strip_tags')
			->rule('message', 'not_empty');

		if ($data->check()){

			$transport = Swift_MailTransport::newInstance();

			$mailer = Swift_Mailer::newInstance($transport);
			
			$message = Swift_Message::newInstance("Feedback from {$data['name']}")
				->setFrom(array(
					$data['email'] => $data['name'],
				))
				->setTo($recipient)
				->addPart($data['message'], 'text/plain');

			if ($mailer->send($message)) {

				Session::instance()->set('message_sent', TRUE);

				Request::instance()->redirect(Request::instance()->uri);
			}

		} else {

			$_POST = $data->as_array();

			$this->template->content->message_sent = Session::instance()->get('message_sent', FALSE) AND Session::instance()->delete('message_sent');

			$this->template->content->errors = $data->errors('contact');
		}
	}
}
