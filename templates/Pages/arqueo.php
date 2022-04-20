<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<h3><?= __('Arqueo') ?></h3>
<div class="row">
    <!--
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    -->
    <div class="column-responsive column-20">
        <table>
            <thead>
                <tr>
                    <th>Billete</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$500</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$200</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$100</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$50</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$20</td>
                    <td><input type='number' min='0'></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="column-responsive column-20">
        <table>
            <thead>
                <tr>
                    <th>Moneda</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$10</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$5</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$2</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <tr>
                    <td>$1</td>
                    <td><input type='number' min='0'></td>
                </tr>
                <!--
                <tr>
                    <td>$0.50</td>
                    <td><input type='number' min='0'></td>
                </tr>
                -->
            </tbody>
        </table>
    </div>
    <div class="column-responsive column-20">
        <table>
            <thead>
                <tr>
                    <th>Total</th>
                    <td><input type='number' disabled='true' class='total-arqueo'></td>
                </tr>
                <tr>
                    <th></th>
                    <th><input class='calc-arqueo' type='button' value='<?= __('Calculate') ?>'></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script>
    $(".calc-arqueo").on('click', function(){
        var Arqueo = 0;
        $("input[type='number']").each(function(){
            var labelText = $(this).parent().siblings().first().html();
            var labelMatch = labelText.match(/\d+/);
            if(labelMatch){
                labelInt = labelMatch[0];
                Arqueo += labelInt * $(this).val();
            }
        })
        $(".total-arqueo").val(Arqueo);

    })
</script>
