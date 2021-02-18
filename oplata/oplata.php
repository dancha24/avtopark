<?php
         $ORDER_AMOUNT = $_GET['oa'];
         $MERCHANT_ID   = 4778;                 // ID магазина
         $SECRET_WORD   = 'DqWLiwdmES6_2LVcyaybtLCUMcsVCGUI';   // Секретный ключ
         $PAYMENT_ID    = time();             // ID заказа (мы используем time(), чтобы был всегда уникальный ID)

         $sign = md5($MERCHANT_ID.':'.$ORDER_AMOUNT.':'.$SECRET_WORD.':'.$PAYMENT_ID);  //Генерация ключа
header('Location: https://enot.io/pay?m='.$MERCHANT_ID.'&oa='.$ORDER_AMOUNT.'&o='.$PAYMENT_ID.'&s='.$sign.'&cf='.$_GET['com'].'');
?>