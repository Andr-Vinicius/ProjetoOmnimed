import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class SolicitarExamesPacientes extends StatefulWidget {
  SolicitarExamesPacientes({Key? key}) : super(key: key);

  @override
  State<SolicitarExamesPacientes> createState() =>
      _SolicitarExamesPacientesState();
}

class _SolicitarExamesPacientesState extends State<SolicitarExamesPacientes> {
  final _formKey = GlobalKey<FormState>();
  String _dropdownValue = 'Selecione um médico';
  bool _encaminhamento = false;
  bool _retorno = false;
  DateTime? _dataConsulta;

  void dropdownCallback(String? selectedValue) {
    if (selectedValue is String) {
      setState(() {
        _dropdownValue = selectedValue;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "Solicitar Exame",
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
        child: Column(
          children: [
            Form(
              key: _formKey,
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Column(
                  children: [
                    const SizedBox(height: 80),
                    TextFormField(
                      decoration: const InputDecoration(
                        labelStyle: TextStyle(
                          color: Colors.black,
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Color(0xFF0f928c)),
                        ),
                        focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color: Color(0xFF0f928c),
                          ),
                        ),
                        label: Text("Exame"),
                      ),
                      cursorColor: const Color(0xFF0f928c),
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Campo Obrigatório';
                        }
                        return null;
                      },
                    ),
                    const SizedBox(height: 25),
                    DropdownButtonFormField(
                      decoration: const InputDecoration(
                        labelStyle: TextStyle(
                          color: Colors.black,
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Color(0xFF0f928c)),
                        ),
                        focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color: Color(0xFF0f928c),
                          ),
                        ),
                        label: Text("Médico"),
                      ),
                      items: const [
                        DropdownMenuItem(
                            value: "Dra. Elaine Lima - Oncologista",
                            child: Text('Dra. Elaine Lima - Oncologista')),
                        DropdownMenuItem(
                            value: "Dr. Marcos Rodrigues - Pediatra",
                            child: Text('Dr. Marcos Rodrigues - Pediatra')),
                        DropdownMenuItem(
                            value: "Dra. Laura Raquel - Otorrinolaringologista",
                            child: Text(
                                'Dra. Laura Raquel - Otorrinolaringologista')),
                        DropdownMenuItem(
                            value: "Dr. Jorge Figueiredo - Geriatrica",
                            child: Text('Dr. Jorge Figueiredo - Geriatrica')),
                        DropdownMenuItem(
                            value: "Dr. Marcelo Drumond - Urologia",
                            child: Text('Dr. Marcelo Drumond - Urologia')),
                      ],
                      onChanged: dropdownCallback,
                    ),
                    const SizedBox(height: 25),
                    TextFormField(
                      decoration: const InputDecoration(
                        labelStyle: TextStyle(
                          color: Colors.black,
                        ),
                        border: OutlineInputBorder(
                          borderSide: BorderSide(color: Color(0xFF0f928c)),
                        ),
                        focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                            color: Color(0xFF0f928c),
                          ),
                        ),
                        label: Text("Observações"),
                      ),
                      cursorColor: const Color(0xFF0f928c),
                    ),
                    const SizedBox(height: 25),
                    ElevatedButton(
                      style: ButtonStyle(
                          backgroundColor: MaterialStateProperty.all(
                        const Color(0xFF0f928c),
                      )),
                      onPressed: () => {},
                      child: const Text(
                        "Anexar Guia do Exame",
                        style: TextStyle(
                          color: Colors.white,
                        ),
                      ),
                    ),
                    const SizedBox(height: 25),
                    ElevatedButton(
                      style: ButtonStyle(
                          backgroundColor: MaterialStateProperty.all(
                        const Color(0xFF0f928c),
                      )),
                      onPressed: () => {Navigator.pop(context)},
                      child: const Text(
                        "Solicitar Exame",
                        style: TextStyle(
                          color: Colors.white,
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
