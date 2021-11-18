<?php

class Order
{
    protected $items;
    protected $outputDriver;

    public function __construct($items ,OrderOutputInterface $output)
    {
        $this->items = $items;
        $this->outputDriver = $output;
    }

    public function calculateTotalSum()
    {
        return array_sum($this->getItemsPrice());
    }

    public function getItemsPrice()
    {
        foreach($this->items as $item)
        {
            $prices[] = $item + ($item * ($this->getDetails()['tax']) / 100) - ($item * ($this->getDetails()['discount']) / 100); 
        }
        // get price from items
        return $prices;
    }

    public function getDetails()
    {
        return ['tax' => 9, 'discount' => 40];
    }

    public function output()
    {
        return $this->outputDriver->output([
            'price' => $this->calculateTotalSum()
        ]);
    }
}

interface OrderOutputInterface
{
    public function output($order);
}


class HtmlOutput implements OrderOutputInterface
{
    public function output($order)
    {
        return '<h2>Sum of prices : ' . $order->totalPrice . '</h2>';
    }
}

class JsonOutput implements OrderOutputInterface
{
    public function output($order)
    {
        return json_encode($order);
    }
}

class OrderRepository
{
    public function load($orderID)
    {
    }
    public function save($order)
    {
    }
    public function update($order)
    {
    }
    public function delete($order)
    {
    }
}
$order = new Order(['item1' => 100000 , 'item2' => 350000],new JsonOutput());

$orderRepo = new OrderRepository();
$orderRepo->save($order);

print_r($order->output());