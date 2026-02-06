import 'package:flutter/material.dart';

class GuiaMedicoEspecialidades extends StatelessWidget {
  const GuiaMedicoEspecialidades({Key? key}) : super(key: key);

  static const String _title = 'Especialidades Médicas';

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
    DataColumn(label: Text('ID'), tooltip: 'Identificador'),
    DataColumn(label: Text('Especialidade')),
    DataColumn(label: Text('')),
    DataColumn(label: Text('')),
    DataColumn(label: Text('')),
  ];
}

List<DataRow> _createRows() {
  return [
    DataRow(cells: [
      DataCell(Text('#001')),
      DataCell(
          Text('Cardiologia', style: TextStyle(fontWeight: FontWeight.bold))),
      DataCell(ElevatedButton.icon(
        onPressed: () {},
        icon: Icon(Icons.add, size: 18),
        label: Text("Detalhes"),
        style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
      )),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.edit),
          style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
        ),
      ),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.delete),
          style: ElevatedButton.styleFrom(primary: Colors.red),
        ),
      ),
    ]),
    DataRow(cells: [
      DataCell(Text('#002')),
      DataCell(
          Text('Pediatria', style: TextStyle(fontWeight: FontWeight.bold))),
      DataCell(ElevatedButton.icon(
        onPressed: () {},
        icon: Icon(Icons.add, size: 18),
        label: Text("Detalhes"),
        style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
      )),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.edit),
          style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
        ),
      ),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.delete),
          style: ElevatedButton.styleFrom(primary: Colors.red),
        ),
      ),
    ]),
    DataRow(cells: [
      DataCell(Text('#003')),
      DataCell(Text('Urologia', style: TextStyle(fontWeight: FontWeight.bold))),
      DataCell(
        ElevatedButton.icon(
          onPressed: () {},
          icon: Icon(Icons.add, size: 18),
          label: Text("Detalhes"),
          style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
        ),
      ),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.edit),
          style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
        ),
      ),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.delete),
          style: ElevatedButton.styleFrom(primary: Colors.red),
        ),
      ),
    ]),
    DataRow(cells: [
      DataCell(Text('#004')),
      DataCell(Text('Otorrino', style: TextStyle(fontWeight: FontWeight.bold))),
      DataCell(ElevatedButton.icon(
        onPressed: () {},
        icon: Icon(Icons.add, size: 18),
        label: Text("Detalhes"),
        style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
      )),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.edit),
          style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
        ),
      ),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.delete),
          style: ElevatedButton.styleFrom(primary: Colors.red),
        ),
      ),
    ]),
    DataRow(cells: [
      DataCell(Text('#005')),
      DataCell(
          Text('Ginecologia', style: TextStyle(fontWeight: FontWeight.bold))),
      DataCell(ElevatedButton.icon(
        onPressed: () {},
        icon: Icon(Icons.add, size: 18),
        label: Text("Detalhes"),
        style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
      )),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.edit),
          style: ElevatedButton.styleFrom(primary: Color(0xFF0f928c)),
        ),
      ),
      DataCell(
        ElevatedButton(
          onPressed: () {},
          child: const Icon(Icons.delete),
          style: ElevatedButton.styleFrom(primary: Colors.red),
        ),
      ),
    ])
  ];
}
