<html>
    <body>
        <h1>Relatório Diario de Vendas ({{ date('d/m/Y') }})</h1><br />
        <br />
        <table border="1" cellpadding="2" cellspacing="0" width="600">
            <thead>
                <tr>
                    <th>Vendedor</th>
                    <th>Qtd Vendas</th>
                    <th>Total Comissão</th>
                    <th>Total Vendido</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_itens_vendido = $total_comissao = $total_valor_venda = 0?>
                @forelse($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->nome }}</td>
                        <td style="text-align: right;">{{ $vendedor->total_itens_vendidos }}</td>
                        <td style="text-align: right;">{{ number_format($vendedor->valor_total_comissao, 2, ',', '.') }}</td>
                        <td style="text-align: right;">{{ number_format($vendedor->valor_total_venda, 2, ',', '.') }}</td>
                    </tr>
                    <?php
                    $total_itens_vendido += $vendedor->total_itens_vendidos;
                    $total_comissao += $vendedor->valor_total_comissao;
                    $total_valor_venda += $vendedor->valor_total_venda;
                    ?>
                @empty
                    <tr><td style="text-align: center">Nenhuma venda registrada hoje.</td></tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td><b>Totais</b></td>
                    <td style="text-align: right;"><b>{{ $total_itens_vendido }}</b></td>
                    <td style="text-align: right;"><b>{{ number_format($total_comissao, 2, ',', '.') }}</b></td>
                    <td style="text-align: right;"><b>{{ number_format($total_valor_venda, 2, ',', '.') }}</b></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>