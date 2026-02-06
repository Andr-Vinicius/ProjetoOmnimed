import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

class AgendarConsulta extends StatefulWidget {
  AgendarConsulta({Key? key}) : super(key: key);

  @override
  State<AgendarConsulta> createState() => _AgendarConsultaState();
}

class _AgendarConsultaState extends State<AgendarConsulta> {
  final _formKey = GlobalKey<FormState>();
  String _dropdownValue = 'Selecione uma especialidade médica';
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
          "Agendar Consulta",
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
                        label: Text("Paciente"),
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
                        label: Text("Especialidade Médica"),
                      ),
                      items: const [
                        DropdownMenuItem(
                            value: "Oncologia", child: Text('Oncologia')),
                        DropdownMenuItem(
                            value: "Pediatria", child: Text('Pediatria')),
                        DropdownMenuItem(
                            value: "Otorrinolaringologia",
                            child: Text('Otorrinolaringologia')),
                        DropdownMenuItem(
                            value: "Geriatria", child: Text('Geriatria')),
                        DropdownMenuItem(
                            value: "Urologia", child: Text('Urologia')),
                      ],
                      onChanged: dropdownCallback,
                    ),
                    const SizedBox(height: 25),
                    SwitchListTile(
                        title: const Text('Encaminhamento'),
                        secondary: const Icon(
                          Icons.arrow_forward,
                          color: Color(0xFF0f928c),
                        ),
                        activeColor: const Color(0xFF0f928c),
                        value: _encaminhamento,
                        onChanged: (bool value) {
                          setState(() {
                            _encaminhamento = value;
                          });
                        }),
                    const SizedBox(height: 25),
                    SwitchListTile(
                        title: const Text('Retorno'),
                        secondary: const Icon(
                          Icons.replay,
                          color: Color(0xFF0f928c),
                        ),
                        activeColor: const Color(0xFF0f928c),
                        value: _retorno,
                        onChanged: (bool value) {
                          setState(() {
                            _retorno = value;
                          });
                        }),
                    const SizedBox(height: 25),
                    Text(_dataConsulta == null ? "Nenhuma data selecionada." : DateFormat('dd/MM/yyyy').format(_dataConsulta!)),
                    IconButton(
                      onPressed: () {
                        showDatePicker(
                          context: context,
                          initialDate: DateTime.now(),
                          firstDate: DateTime(DateTime.now().year,
                            DateTime.now().month, DateTime.now().day),
                          lastDate: DateTime(2022, 12, 31)
                        ).then((date) {
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
                        backgroundColor: MaterialStateProperty.all(const Color(0xFF0f928c),)
                      ),
                      onPressed: () => {
                        if(_formKey.currentState!.validate()){
                          ScaffoldMessenger.of(context).showSnackBar(
                            const SnackBar(
                              content: Text("Consulta agendada com sucesso!", style: TextStyle(color: Colors.white),),
                              backgroundColor: Color.fromARGB(255, 0, 255, 98),
                            )
                          ),
                          Navigator.pop(context)
                        }else{
                          ScaffoldMessenger.of(context).showSnackBar(
                            const SnackBar(
                              content: Text("Campos obrigatórios faltando...", style: TextStyle(color: Colors.white),),
                              backgroundColor: Colors.redAccent,
                            )
                          )
                        }
                      },
                      child: const Text(
                        "Agendar",
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
