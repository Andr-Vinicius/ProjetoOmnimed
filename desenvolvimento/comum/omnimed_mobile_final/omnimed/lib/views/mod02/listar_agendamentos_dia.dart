import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class ListarAgendamentosDia extends StatefulWidget {
  const ListarAgendamentosDia({Key? key}) : super(key: key);

  @override
  State<ListarAgendamentosDia> createState() => _ListarAgendamentosDiaState();
}

class _ListarAgendamentosDiaState extends State<ListarAgendamentosDia> {
  DateTime? _dataConsulta;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Consultas do Dia",
          style: TextStyle(
            color: Color(0xFF0f928c),
            fontWeight: FontWeight.bold,
          ),
        ),
        backgroundColor: Colors.white,
        foregroundColor: const Color(0xFF0f928c),
        centerTitle: true,
      ),
      body: Column(
        children: [
          const SizedBox(height: 25),
          Text(_dataConsulta == null
              ? "Selecione uma data para ver as consultas desse dia:"
              : DateFormat('dd/MM/yyyy').format(_dataConsulta!)),
          IconButton(
            onPressed: () {
              showDatePicker(
                      context: context,
                      initialDate: DateTime.now(),
                      firstDate: DateTime(DateTime.now().year,
                          DateTime.now().month, DateTime.now().day),
                      lastDate: DateTime(2099, 12, 31))
                  .then((date) {
                setState(() {
                  _dataConsulta = date;
                });
              });
            },
            icon: const Icon(
              Icons.date_range,
              color: Color(0xFF0f928c),
            ),
          ),
          const SizedBox(height: 25),
          ElevatedButton(
            style: ButtonStyle(
                backgroundColor: MaterialStateProperty.all(
              const Color(0xFF0f928c),
            )),
            onPressed: () => {},
            child: const Text(
              "Aplicar filtro",
              style: TextStyle(
                color: Colors.white,
              ),
            ),
          ),
          const SizedBox(height: 25),
          SingleChildScrollView(
              scrollDirection: Axis.horizontal, child: _createDataTable())
        ],
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
        'Nome Completo',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      )),
      DataColumn(
          label: Text(
        'Horário',
        style: TextStyle(
          color: Color(0xFF0f928c),
        ),
      )),
      DataColumn(
          label: Text(
        'Data',
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
        const DataCell(Text('Larissa Maria')),
        const DataCell(Text('13:00')),
        const DataCell(Text('08/07/2022')),
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
        const DataCell(Text('Filipe Codogno')),
        const DataCell(Text('14:00')),
        const DataCell(Text('08/07/2022')),
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
        const DataCell(Text('Gabriel Sofiatti')),
        const DataCell(Text('15:00')),
        const DataCell(Text('08/07/2022')),
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
        const DataCell(Text('Luís Felipe Colósimo')),
        const DataCell(Text('16:00')),
        const DataCell(Text('08/07/2022')),
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
        const DataCell(Text('Thiago Blasi')),
        const DataCell(Text('17:00')),
        const DataCell(Text('08/07/2022')),
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
        const DataCell(Text('Webster Wolak')),
        const DataCell(Text('18:00')),
        const DataCell(Text('08/07/2022')),
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
