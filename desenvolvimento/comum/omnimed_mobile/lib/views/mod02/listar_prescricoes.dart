import 'package:flutter/material.dart';

class ListarPrescricoes extends StatelessWidget {
  const ListarPrescricoes({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Listagem de Prescrições",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
        centerTitle: true,
      ),
      body: ListView(
        children: [_createDataTable()],
      ),
    );
  }

  DataTable _createDataTable() {
    return DataTable(columns: _createColumns(), rows: _createRows());
  }

  List<DataColumn> _createColumns() {
    return const [
      DataColumn(
          label: Text(
        'Data',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      )),
      DataColumn(
          label: Text(
        'Médico',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      )),
      DataColumn(
          label: Text(
        'Paciente',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      ))
    ];
  }

  List<DataRow> _createRows() {
    return const [
      DataRow(cells: [
        DataCell(Text('10/10/2022')),
        DataCell(Text('Dr. Dráuzio Varela')),
        DataCell(Text('João da Silva'))
      ]),
      DataRow(cells: [
        DataCell(Text('20/02/2022')),
        DataCell(Text('Dra. Mariana do Val')),
        DataCell(Text('Maria de Paula'))
      ]),
      DataRow(cells: [
        DataCell(Text('12/12/2021')),
        DataCell(Text('Dra. Mariana do Val')),
        DataCell(Text('Mauro Bruno'))
      ])
    ];
  }
}
