<?php
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [330, 210]]);
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();
