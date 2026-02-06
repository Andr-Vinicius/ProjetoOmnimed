import 'package:flutter/material.dart';

class GestaoPagamentos extends StatelessWidget {
  const GestaoPagamentos({ Key? key }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Gestão dos Pagamentos",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
        centerTitle: true,
      ),
      body: SingleChildScrollView(
        scrollDirection: Axis.horizontal,
        child: DataTable(
          columns: _createColumns(),
          rows: _createRows(),
          dividerThickness: 5,
          dataRowHeight: 90,
          showBottomBorder: true,
          headingTextStyle: const TextStyle(
            fontWeight: FontWeight.bold,
            color: Color(0xFF0f928c),
          ),
          headingRowColor:
              MaterialStateProperty.resolveWith((states) => Colors.white),
        ),
      ),
    );
  }
}

List<DataColumn> _createColumns() {
  return const [
    DataColumn(label: Text('ID'), tooltip: 'Identificador dos Pagamentos'),
    DataColumn(label: Text('Nome do Paciente')),
    DataColumn(label: Text('Quantidade de Dependentes')),
    DataColumn(label: Text('Preço do Plano')),
    DataColumn(label: Text('Tipo do Plano')),
    DataColumn(label: Text('Valor Total')),
    DataColumn(label: Text('Data do Último Pagamento')),
    DataColumn(label: Text('Vencimento')),
  ];
}

List<DataRow> _createRows() {
  return const [
            DataRow(cells: [
              DataCell(Text('#001')),
              DataCell(Text('Felipe José', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('2')),
              DataCell(Text('R\$ 400,00')),
              DataCell(Text('Bronze')),
              DataCell(Text('R\$ 500,00')),
              DataCell(Text('23/06/2022')),
              DataCell(Text('24/06/2022'))
              ]),
            DataRow(cells: [
              DataCell(Text('#002')),
              DataCell(Text('Roberto Júnior', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('0')),
              DataCell(Text('R\$ 200,00')),
              DataCell(Text('Bronze')),
              DataCell(Text('R\$ 200,00')),
              DataCell(Text('23/07/2022')),
              DataCell(Text('24/07/2022'))
            ]),
            DataRow(cells: [
              DataCell(Text('#003')),
              DataCell(Text('Matheus Neves', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('0')),
              DataCell(Text('R\$ 300,00')),
              DataCell(Text('Prata')),
              DataCell(Text('R\$ 350,00')),
              DataCell(Text('28/10/2022')),
              DataCell(Text('30/10/2022'))
            ]),
            DataRow(cells: [
              DataCell(Text('#004')),
              DataCell(Text('Nicholas Zilli', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('1')),
              DataCell(Text('R\$ 500,00')),
              DataCell(Text('Ouro')),
              DataCell(Text('R\$ 500,00')),
              DataCell(Text('01/10/2022')),
              DataCell(Text('02/10/2022'))
            ]),
            DataRow(cells: [
              DataCell(Text('#005')),
              DataCell(Text('Melissa Akatuka', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('4')),
              DataCell(Text('R\$ 700,00')),
              DataCell(Text('Prata')),
              DataCell(Text('R\$ 800,00')),
              DataCell(Text('10/07/2022')),
              DataCell(Text('11/07/2022'))
            ])
  ];
}