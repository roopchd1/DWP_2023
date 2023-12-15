<?php

class Invoice
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getInvoiceDetails($invoiceNumber)
    {
        $invoiceDetails = [];

        $get_invoice_details = "SELECT * FROM `user_payments` WHERE invoice_number = '$invoiceNumber'";
        $result_invoice = mysqli_query($this->connection, $get_invoice_details);

        if ($result_invoice) {
            $invoiceDetails = mysqli_fetch_assoc($result_invoice);
        }

        return $invoiceDetails;
    }
}

?>
