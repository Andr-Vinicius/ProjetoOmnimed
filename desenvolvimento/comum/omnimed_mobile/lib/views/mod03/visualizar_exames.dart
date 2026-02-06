import 'package:flutter/material.dart';

class VisualizarExamesPacientes extends StatelessWidget {
  const VisualizarExamesPacientes({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Visualizar Exames",
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
        child: DataTable(
          columns: _createColumns(),
          rows: _createRows(),
          dividerThickness: 5,
          dataRowHeight: 90,
          showBottomBorder: true,
          headingTextStyle: TextStyle(
            fontWeight: FontWeight.bold,
            color: Color(0xFF0f928c),
          ),
          headingRowColor:
              MaterialStateProperty.resolveWith((states) => Colors.white),
        ),
        scrollDirection: Axis.horizontal,
      ),
    );
  }
}

List<DataColumn> _createColumns() {
  return [
    DataColumn(label: Text('ID'), tooltip: 'Identificador de Exames'),
    DataColumn(label: Text('Nome do Exame')),
    DataColumn(label: Text('Aprovado?')),
    DataColumn(label: Text('Justificativa')),
    DataColumn(label: Text('Resultado'))
  ];
}

List<DataRow> _createRows() {
  return [
            DataRow(cells: [
                DataCell(Text('#001')),
                DataCell(Text('Exame de Sangue')),
                DataCell(Text('Sim', style: TextStyle(fontWeight: FontWeight.bold))),
                DataCell(Text('-')),
                DataCell(Icon(Icons.file_open_outlined))
              ]),
            DataRow(cells: [
              DataCell(Text('#002')),
              DataCell(Text('Exame de Urina')),
              DataCell(Text('Sim', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('-')),
              DataCell(Icon(Icons.file_open_outlined))
            ]),
            DataRow(cells: [
              DataCell(Text('#003')),
              DataCell(Text('Exame de Fezes')),
              DataCell(Text('Sim', style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('-')),
              DataCell(Icon(Icons.file_open_outlined))
            ]),
            DataRow(cells: [
              DataCell(Text('#004')),
              DataCell(Text('Ressonância Magnética')),
              DataCell(Text('Não',style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('O paciente preencheu de forma incorreta o médico responsável')),
              DataCell(Icon(Icons.file_open_outlined))
            ]),
            DataRow(cells: [
              DataCell(Text('#005')),
              DataCell(Text('Exame de Radiografia')),
              DataCell(Text('Não',style: TextStyle(fontWeight: FontWeight.bold))),
              DataCell(Text('O arquivo com a guia do exame foi carregado de forma ilegível')),
              DataCell(Icon(Icons.file_open_outlined))
            ])
  ];
}