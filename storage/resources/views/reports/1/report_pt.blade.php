<?php

use App\Labs;

$lab = Labs::find($exp);
?>
<header>
    <img style="position: absolute; left: 0; top: 0;" height="100" width="100" src="img/logos/r.png">
    <h2 style="text-align: center;" >RExLab UFSC</h2><Br>
    <h2 style="text-align: center;">Relatório de Prática Experimental</h2>
    <img style="position: absolute; right: 0; top: 0;" height="100" width="100" src="img/logos/r.png">

    @if (Auth::check())
    <div id="info">
        <p class="infnames">Nome: {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
        <p class="infnames">Experimento: {{ $lab->name_pt }} </p>
        <p class="infnames">Data do Acesso: <?php echo (date('d/m/Y')); ?> </p>
        <p class="infnames2">Instituição: {{ Auth::user()->organization }}</p>
        <p class="infnames2">E-mail: {{ Auth::user()->email }} </p> 
    </div>
    @endif
</header>
<div id = "snapshot">
    <p style = "margin-left: 10%; font-weight: bold">Experimento Remoto</p>
    <img src = "http://10.10.10.7:8888/motion/snapshot.jpg" width = "320" height = "240">
</div>

<div id = "picture">
    <p style = "margin-left: 28%;  font-weight: bold">Imagem Ilustrativa</p>
    <img src = "http://relle.ufsc.br/exp_data/1/img/diagrama.png" width = "320" height = "240">
</div>
    <table border="0.5" style="position:relative; width: 100%; top:70%;"> 
        <tr>
            <td>A1</td>
            <td>A2</td>
            <td>A3</td>
            <td>A4</td>
            <td>A5</td>
            <td>A6</td>
            <td>A7</td>
            <td>V1</td>
            <td>V2</td>
        </tr>
        <tr>
            <td><?php echo ($rpijson['amperemeter'][0]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['amperemeter'][1]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['amperemeter'][2]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['amperemeter'][3]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['amperemeter'][4]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['amperemeter'][5]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['amperemeter'][6]) / 1000 ?> mA</td>
            <td><?php echo ($rpijson['voltmeter'][0]) / 1000 ?> V</td>
            <td><?php echo ($rpijson['voltmeter'][1]) / 1000 ?> V</td>
        </tr>
    </table>
<p style = "color: red; position: fixed; bottom: 14%;">*Verifique as chaves ativas e os sensores.</p > 
<?php
include asset('footer_' . App::getLocale() . '.html');
