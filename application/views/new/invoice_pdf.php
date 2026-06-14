<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
body{
    font-family: DejaVu Sans, sans-serif;
    font-size:13px;
    margin:20px;
    color:#000;
}

.main-box{
    border:2px solid #000;
    padding:10px;
}

table{
    width:100%;
    border-collapse:collapse;
}

td, th{
    border:1px solid #000;
    padding:8px;
    vertical-align:top;
}

.no-border td{
    border:none;
}

.header-logo{
    width:100%;
}

.invoice-title{
    text-align:center;
    font-size:18px;
    font-weight:bold;
    padding:10px;
}

.text-center{
    text-align:center;
}

.text-right{
    text-align:right;
}

.bold{
    font-weight:bold;
}

.footer{
    margin-top:20px;
    text-align:center;
    font-size:11px;
    color:#3b6d99;
    font-weight:bold;
}

.signature{
    height:120px;
    text-align:center;
}

.amount-words{
    font-weight:bold;
    padding:10px;
}
</style>
</head>

<body>

<div class="main-box">

    <!-- Header -->
    <table class="no-border">
        <tr>
            <td width="65%">
                <img src="<?= base_url('uploads/logo.png') ?>" style="height:80px;">
            </td>

            <td width="35%" style="font-size:14px;">
                <b>Patent No.</b> : 562618<br>
                <b>Copyright No</b> : L-61816/2015<br>
                <b>OEM Code</b> : OEM-1863/2022<br>
                <b>Trademark</b> : RLC/807805<br>
                <b>ISO ITMS</b> : ECI/2501/0907<br>
                <b>ISO</b> : QMS/019353/1120
            </td>
        </tr>
    </table>

    <!-- Invoice Heading -->
    <table>
        <tr>
            <td class="invoice-title">
                Invoice / Billing
            </td>
        </tr>
    </table>

    <!-- School + Invoice Info -->
    <table>
        <tr>
            <td width="53%">
                To<br><br>

                The Principal<br>
                <?= $school_name ?>
            </td>

            <td width="47%">
                Order Id : As per the Agreement<br>
                Invoice Number : <?= $invoice_number ?><br>
                Date : <?= date('F d, Y', strtotime($invoice_date)); ?>
            </td>
        </tr>
    </table>

    <!-- Billing Table -->
    <table>
        <tr>
            <th width="8%">S.No</th>
            <th width="50%">Description</th>
            <th width="10%">User</th>
            <th width="15%">Rate</th>
            <th width="17%">Total Amount</th>
        </tr>

        <tr>
            <td></td>
            <td colspan="4" style="height:35px;"></td>
        </tr>

        <tr>
            <td>1</td>
            <td>
                Security Services being provided to Students
                through SPACS System of
                <?= date('F Y', strtotime($billing_month)); ?>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td>1.A</td>
            <td style="padding-left:35px;">
                National Pack
            </td>

            <td class="text-center">
                <?= $national_users ?>
            </td>

            <td class="text-center">
                <?= number_format($national_rate,2) ?>
            </td>

            <td class="text-center">
                <?= number_format($national_amount,2) ?>
            </td>
        </tr>

        <?php if($international_users > 0){ ?>

        <tr>
            <td>1.B</td>

            <td style="padding-left:35px;">
                International Pack

                <?php if(!empty($roll_numbers)){ ?>
                    <br><br>
                    <b>Roll No:</b><br>
                    <?= $roll_numbers ?>
                <?php } ?>
            </td>

            <td class="text-center">
                <?= $international_users ?>
            </td>

            <td class="text-center">
                <?= number_format($international_rate,2) ?>
            </td>

            <td class="text-center">
                <?= number_format($international_amount,2) ?>
            </td>
        </tr>

        <?php } ?>

        <tr>
            <td colspan="5" style="height:35px;"></td>
        </tr>

        <tr>
            <td colspan="3"></td>
            <td class="bold">Total</td>
            <td class="bold text-center">
                <?= number_format($grand_total,2) ?>
            </td>
        </tr>
    </table>

    <!-- Amount In Words -->
    <table>
        <tr>
            <td class="amount-words">
                Rupees <?= ucwords($amount_in_words) ?> Only
            </td>
        </tr>
    </table>

    <!-- Bank Details -->
    <table>
        <tr>

            <td width="73%">
                Payment against this invoice should be made only through
                NEFT or RTGS Mode. Details are as follows:-<br><br>

                Central Tax Rate Number 12/2017 vide Serial Number 66<br>

                Account No- 50146414221<br>

                Account Name - SPACS TELECON<br>

                PAN No - ACLPG9086D<br>

                IFSC Code - IDIB000G025<br>

                MICR Code - 474019003<br>

                Bank Name - Indian Bank Allahabad Inderganj Branch
                Gwalior (M.P.)<br><br>

                <b>Please Note :</b><br>
                Due Date : 10 Days from receipt of the Invoice.
            </td>

            <td width="27%" class="signature">
                For,<br>
                <b>SPACS Telecon</b>

                <br><br><br>

                <?php if(!empty($signature)){ ?>
                    <img src="<?= $signature ?>" height="60">
                <?php } ?>

                <br><br>

                Auth. Signatory
            </td>

        </tr>
    </table>

    <!-- Footer -->
    <div class="footer">
        Corporate Office (For Any Correspondence) : Gupta's Building,
        Hospital Road, Lashkar, Gwalior (M.P.)<br>

        Software Office (Not for Correspondence) :
        A-9, 2nd Floor, Chittaranjan Park,
        New Delhi - 110019<br>

        Ph. 0751-4070100 Mob : 9826367010/97010
        Mail ID : chairman@ecpc.in,
        spacssolution@gmail.com
    </div>

</div>

</body>
</html>