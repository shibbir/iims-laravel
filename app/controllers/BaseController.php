<?php

class BaseController extends Controller {

    protected $successNotificationType = 'success';
    protected $failureNotificationType = 'danger';

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    protected $notificationType;

    public function setNotificationType($notificationType)
    {
        $this->notificationType = $notificationType;
        return $this;
    }

    public function getNotificationType()
    {
        return $this->notificationType;
    }

    public function getSuccessNotification($message = 'Operation Successful!')
    {
        return $this->setNotificationType($this->successNotificationType)->notification($message);
    }

    public function getErrorNotification($message = 'Operation Failed!')
    {
        return $this->setNotificationType($this->failureNotificationType)->notification($message);
    }

    public function notification($message)
    {
        $data = [
            'flash_type' => $this->getNotificationType(),
            'flash_message' => $message
        ];
        return $data;
    }
}