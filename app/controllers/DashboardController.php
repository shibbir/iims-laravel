<?php

class DashboardController extends \BaseController {

	public function index()
	{
        $data = ['title' => 'Welcome to the dashboard'];
        return View::make('dashboard.index', $data);
	}

    public function getInventoryChart()
    {
        $data = $this->Model_Inventory->getInventoryChart();
        if($data)
        {
            $plotData = array();
            foreach ($data as $item)
            {
                if(!$item->Quantity)
                {
                    $plotData[$item->CategoryName] = 0;
                }
                else $plotData[$item->CategoryName] = intval($item->Quantity);
            }
            echo json_encode($plotData);
        }
        else echo json_encode($data);
    }
}