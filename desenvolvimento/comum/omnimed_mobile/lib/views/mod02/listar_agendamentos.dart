import 'package:flutter/material.dart';

class ListarAgendamentos extends StatelessWidget {
  const ListarAgendamentos({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Agendamentos",
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
        'ID',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      )),
      DataColumn(
          label: Text(
        'Status',
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
      )),
      DataColumn(
          label: Text(
        'Detalhes',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      ))
    ];
  }

  List<DataRow> _createRows() {
    return [
      DataRow(cells: [
        const DataCell(Text('01')),
        const DataCell(Text('Aguardando Confirmação')),
        const DataCell(Text('Filipe Codogno')),
        DataCell(TextButton(
          onPressed: () => {},
          child: const Text(
            "Visualizar",
            style: TextStyle(
              color: Color(0xFF0f928c),
            ),
          ),
        ))
      ]),
      DataRow(cells: [
        const DataCell(Text('02')),
        const DataCell(Text('Aguardando Confirmação')),
        const DataCell(Text('Gabrial Sofiatti')),
        DataCell(TextButton(
          onPressed: () => {},
          child: const Text(
            "Visualizar",
            style: TextStyle(
              color: Color(0xFF0f928c),
            ),
          ),
        ))
      ]),
      DataRow(cells: [
        const DataCell(Text('03')),
        const DataCell(Text('Confirmado')),
        const DataCell(Text('Larissa Ribeiro')),
        DataCell(TextButton(
          onPressed: () => {},
          child: const Text(
            "Visualizar",
            style: TextStyle(
              color: Color(0xFF0f928c),
            ),
          ),
        ))
      ]),
      DataRow(cells: [
        const DataCell(Text('04')),
        const DataCell(Text('Confirmado')),
        const DataCell(Text('Luís Felipe Colósimo')),
        DataCell(TextButton(
          onPressed: () => {},
          child: const Text(
            "Visualizar",
            style: TextStyle(
              color: Color(0xFF0f928c),
            ),
          ),
        ))
      ]),
      DataRow(cells: [
        const DataCell(Text('05')),
        const DataCell(Text('Cancelado')),
        const DataCell(Text('Thiago Blasi')),
        DataCell(TextButton(
          onPressed: () => {},
          child: const Text(
            "Visualizar",
            style: TextStyle(
              color: Color(0xFF0f928c),
            ),
          ),
        ))
      ]),
      DataRow(cells: [
        const DataCell(Text('06')),
        const DataCell(Text('Cancelado')),
        const DataCell(Text('Webster Wolak')),
        DataCell(TextButton(
          onPressed: () => {},
          child: const Text(
            "Visualizar",
            style: TextStyle(
              color: Color(0xFF0f928c),
            ),
          ),
        ))
      ]),
    ];
  }
}
